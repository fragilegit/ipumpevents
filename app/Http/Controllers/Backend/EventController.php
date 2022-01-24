<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests;
use Illuminate\Support\Facades\Storage;
use Validator;
use App\Event;
use Calendar;
use Intervention\Image\Facades\Image;

class EventController extends BackendController
{
   
    protected $imagePath;

    public function __construct(){
        parent::__construct();
        $this->imagePath = public_path(config('cms.image.directory'));
    }

    public function index(Request $request){
        $user = Auth::user();
        $onlyTrashed = FALSE;

        
        if($user->hasRole('admin')){
            if(($status = $request->get('status')) && $status == 'trash'){
               
                $events = Event::onlyTrashed()->with('category', 'user')->latest()->paginate($this->limit);
                $eventCount = Event::onlyTrashed()->count();
                $onlyTrashed = TRUE;
                // dd($events);
            }elseif($status == 'published'){
    
                $events = Event::published()->with('category', 'user')->latest()->paginate($this->limit);
                $eventCount = Event::published()->count();
                
            }elseif($status == 'scheduled'){
    
                $events = Event::scheduled()->with('category', 'user')->latest()->paginate($this->limit);
                $eventCount = Event::scheduled()->count();
                
            }elseif($status == 'draft'){
                $events = Event::draft()->with('category', 'user')->latest()->paginate($this->limit);
                $eventCount = Event::draft()->count();
            }elseif($status == 'own'){
    
                $events = $request->user()->events()->published()->with('category', 'user')->latest()->paginate($this->limit);
                $eventCount = $request->user()->events()->count();
                
            }else{
                $events = Event::with('category', 'user')->latest()->paginate($this->limit);
                $eventCount = Event::count();
                // dd($calendar_details->Calendar()->EventCollection->item);
            }
            // $eventsCal = Event::get();
            $event_list = [];

            foreach($events as $key => $event){
                $event_list[] = Calendar::event(
                    $event->event_name, 
                    true, 
                    new \DateTime($event->published_at),
                    new \DateTime($event->published_at.' +1 day') 
                );
            }

            $calendar_details = Calendar::addEvents($event_list);
            $statusList = $this->statusListAdmin($request);
        
        }// end if user is admin
        else{
             
            if(($status = $request->get('status')) && $status == 'trash'){
               
                $events = $user->events()->onlyTrashed()->with('category', 'user')->latest()->paginate($this->limit);
                $eventCount = $user->events()->onlyTrashed()->count();
                $onlyTrashed = TRUE;
                // dd($events);
            }elseif($status == 'published'){
    
                $events = $user->events()->published()->with('category', 'user')->latest()->paginate($this->limit);
                $eventCount = $user->events()->published()->count();
                
            }elseif($status == 'scheduled'){
    
                $events = Event::scheduled()->with('category', 'user')->latest()->paginate($this->limit);
                $eventCount = Event::scheduled()->count();
                
            }elseif($status == 'draft'){
                
                $events = $user->events()->draft()->with('category', 'user')->latest()->paginate($this->limit);
                $eventCount = $user->events()->draft()->count();
                
            }elseif($status == 'own'){
    
                $events = $request->user()->events()->with('category', 'user')->latest()->paginate($this->limit);
                $eventCount = $request->user()->events()->count();
                
            }else{

                $events = $user->events()->with('category', 'user')->latest()->paginate($this->limit);
                $eventCount = $user->events()->count();
                
                $event_list = [];
                foreach($events as $key => $event){
                    $event_list[] = Calendar::event(
                        $event->event_name, 
                        true, 
                        new \DateTime($event->published_at),
                        new \DateTime($event->published_at.' +1 day')
                    );
                }
                $calendar_details = Calendar::addEvents($event_list);
            }
            $statusList = $this->statusList($request);
        }
         return view('backend.event.index', compact('events', 'eventCount', 'calendar_details','onlyTrashed','statusList', 'status'));
        //  ->render();
    }

    public function statusList($request){
        return [
            'all' => $request->user()->events()->count(),
            'published' => $request->user()->events()->published()->count(),
            'scheduled' => $request->user()->events()->scheduled()->count(),
            'draft' => $request->user()->events()->draft()->count(),
            'trash' => $request->user()->events()->onlyTrashed()->count(),
        ];
    }

    public function statusListAdmin($request){
        return [
            'own' => $request->user()->events()->published()->count(),
            'all' => Event::count(),
            'published' => Event::published()->count(),
            'scheduled' => Event::scheduled()->count(),
            'draft' => Event::draft()->count(),
            'trash' => Event::onlyTrashed()->count(),
        ];
    }

    public function create(Event $event)
    {
        return view('backend.event.create', compact('event'));
    }

    public function store(Requests\EventRequest $request)
    {
        $data = $this->handleRequest($request);
        
        $event = $request->user()->events()->create($data);
        $event->start_date = $data['published_at'];
        
        return Redirect::to('dashboard/event/create')->with('success', 'Your event was created successfully');
        // ->render();
    }

    private function handleRequest($request){
        // $eventOption  = $request->event_option;
        $data = $request->all();

        // if($eventOption == 'draft'){
        //     $data = $request->except(['published_at']);
        // }elseif($eventOption == 'publish'){
        //     $data = $request->all();
        // }
        
        if($request->hasFile('event_image')){
        
            $image = $request->file('event_image');
            $fileName = $image->getClientOriginalName();
            $fileName = pathinfo($fileName, PATHINFO_FILENAME);
            $extension = $image->getClientOriginalExtension();
            $fileName = $fileName.'_'.time().'.'.$extension; 
            $destination = $this->imagePath;
            if(env('APP_ENV') !== 'local') {
                Storage::disk('s3')->put('images/'.$fileName, fopen($request->file('event_image'), 'r+'), 'public');
            }

            $successUpload = $image->move($destination, $fileName);

            if($successUpload){

                $width = config('cms.image.thumbnail.width');
                $height = config('cms.image.thumbnail.height');
                //thumbnail
                $extension = $image->getClientOriginalExtension();
                $thumbnail = str_replace(".{$extension}", "_thumb.{$extension}", $fileName);
                Image::make($destination.'/'. $fileName)
                ->resize($width,$height)
                ->save($destination.'/'.$thumbnail);
                if(env('APP_ENV') !== 'local') {
                    // Storage::disk('s3')->put('images/'.$thumbnail, fopen($request->file('event_image'), 'r+'), 'public'); 
                }
            }

            $data['event_image'] = $fileName;
        }
        return $data;
    }

    public function show(Event $event)
    {
        //
        return view('home');
    } 

    public function edit($id)
    {
        $event = Event::findOrFail($id);
        return view('backend.event.edit', compact('event'));
    }

    public function update(Requests\EventRequest $request, $id)
    {
        $event     = Event::findOrFail($id);
        $oldImage = $event->Event_image;
        $data     = $this->handleRequest($request);

        $event->update($data);
        $addOtherData = Event::find($event->id);
        $addOtherData->start_date = $data['published_at'];
        $addOtherData->save();
        

        if ($oldImage !== $event->event_image) {
            $this->removeImage($oldImage);
        }
        
        return Redirect::to('dashboard/event')->with('success', 'Your event was updateded successfully');
        
        
        // $event->createTags($data['post_tags']);
        // $validator = Validator::make($request->all(), [
        //     'event_name' => 'required',
        //     'slug' => 'required:unique:events',
        //     'excerpt' => 'required',
        //     'description' => 'required',
        //     'published_at' => 'nullable',
        //     'category_id' => 'required',
        //     'event_image' => 'mimes:jpg,jpeg,bmp,png'
        //     ]);

            // if($validator->fails()){
            //     \Session::flash('warnning','Please enter the valid details');
            //     return Redirect::to('dashboard\event\create')->withInput()->withErrors($validator);
            // }

            // if($request->hasFile('event_image')){
            //     $image = $request->file('event_image');
            //     $fileName = $image->getClientOriginalName();
            //     $destination = $this->imagePath;

            //     $successUpload = $image->move($destination, $fileName);

            //     if($successUpload){

            //         $width = config('cms.image.thumbnail.width');
            //         $height = config('cms.image.thumbnail.height');
            //         //thumbnail
            //         $extension = $image->getClientOriginalExtension();
            //         $thumbnail = str_replace(".{$extension}", "_thumb.{$extension}", $fileName);
            //         Image::make($this->imagePath.'/'. $fileName)
            //         ->resize($width,$height)
            //         ->save($this->imagePath.'/'.$thumbnail);   
            //     }
            // }else{
            //     $fileName = 'noimage.jpg';
            // }
        // $event = Event::findOrFail($id);
        // $oldimage = $event->event_image;
        // $event->event_name = $request['event_name'];
        // $event->slug = $request['slug'];
        // $event->published_at = $request['published_at'];
        // $event->excerpt = $request['excerpt'];
        // $event->description = $request['description'];
        // $event->event_image = $fileName;
        // $event->category_id = $request['category_id'];
        // $event->save();
        
        // if($oldimage !== $event->event_image){
        //     $this->removeImage($oldimage);
        // }
        // \Session::flash('success', 'Your event was updateded successfully');
       
    }
    
    public function destroy($id)
    {
        // dd('test');
        Event::findOrFail($id)->delete();
        \Session::flash('trash-message', ['Your post moved to trash!', $id]);
        return redirect::to('dashboard/event');
        // >with('trash-message', ['Your post moved to trash!', $id])
    }

    public function forceDestroy($id){

        $event = Event::withTrashed()->findOrFail($id);
        $event->forceDelete();
        if(isset($event->event_image)){
            $this->removeImage($event->event_image);
        }
        

        \Session::flash('success', 'Your event has been deleted successfully');
        return redirect::to('/dashboard/event?status=trash');
    }

    public function restored($id){

        $event = Event::withTrashed()->findOrFail($id)->restore();

        // return redirect('/dashboard/event')->with('message', 'Your event has been restored!');
        return redirect()->back()->with('success', 'Your event has been restored!');
    }

    public function removeImage($image){
        if(! empty($image)){
            $imagePath = $this->imagePath . '/' . $image;
            $ext = substr(strchr($image, '.'), 1);
            $thumbnail = str_replace(".{$ext}" , "_thumb.{$ext}", $image);
            $thumbnailPath = $this->imagePath . '/' . $thumbnail;

            if(file_exists($imagePath)) unlink($imagePath);
            if(file_exists($thumbnailPath)) unlink($thumbnailPath);
            Storage::disk('s3')->delete($image);
            Storage::disk('s3')->delete($thumbnail);
        }
    }

    public function admin(){
        return view('backend.admin');
    }
}

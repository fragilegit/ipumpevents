<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Redirect;
Use App\Http\Controllers\Controller;
use Auth;
use Validator;
use App\Event;
use App\Category;
use App\User;
use App\Tag;


use Calendar;

class EventController extends Controller
{
    protected $limit;
   
    public function __construct(){
        $this->middleware('auth', ['except' => ['index', 'show', 'category', 'author', 'tag']]);
        $this->limit = 15;
    }

    public function index()
    {
        
        // $id = Auth::id(); 
        // \DB::enableQueryLog();
        $events = Event::with('user', 'tags', 'category')
            ->latest()
            ->published()
            ->filter(request()->only(['term','month','year']))
            ->paginate($this->limit);

        return view('events.index', compact('events'));
        //  ->render(); 
        // dd(\DB::getQueryLog());
    }

    public function category(Category $category)
    {   
        $categoryName = $category->title;
        $events = $category->events()
            ->with('user','tags')
            ->latest() 
            ->published()
            ->paginate($this->limit);
        return view('events.index', compact('events', 'categoryName')); 
    }

    public function author(User $user){

        $authorName = $user->name;

        $events = $user->events()
            ->with('category', 'tags')
            ->latest()
            ->published()
            ->paginate($this->limit);
        return view('events.index', compact('events', 'categoryName', 'authorName')); 
    }

    public function show($slug)
    {
        $event = Event::published()->where('slug', $slug)->first(); 

        $viewCount = $event->view_count + 1;
        $event->update(['view_count' => $viewCount]);

        // $event->increment('view_count');//without fillale varible
        return view('events.show', compact('event'));

    }

    public function tag(Tag $tag)
    {   
        $tagName = $tag->name;

        $events = $tag->events()
            ->with('user', 'category')
            ->latest() 
            ->published()
            ->paginate($this->limit);
        return view('events.index', compact('events', 'tagName')); 
    }
     
    public function addToCalendar(){
        $events = Event::get();
        $event_list = [];

        foreach($events as $key => $event){
            $event_list[] = Calendar::event(
                $event->event_name,
                true,
                new \DateTime($event->start_date),
                new \DateTime($event->end_date.' +1 day') 
            );
        }
        $calendar_details = Calendar::addEvents($event_list);

        return view('pages.dashboard', compact('calendar_details'));
    }
     // $categories = Category::with(['events' => function($query){
        //     $query->published();
        //     // $query->where('published_at', '<=', Carbon::now());
        // }])->orderBy('title', 'asc')->get();
}

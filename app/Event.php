<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Carbon\Carbon;
use GrahamCampbell\Markdown\Facades\Markdown;


class Event extends Model
{
    //
    use SoftDeletes;
    protected $dates = ['published_at'];
    protected $fillable = ['event_name', 'end_date', 'view_count', 'slug', 'description', 'event_image', 'lat', 'lng', 'excerpt', 'published_at', 'category_id'];

    public function user(){
        
        return $this->belongsTo('App\User');

    }
    
    public function category(){

        return $this->belongsTo('App\Category');
    }

    public function tags(){
        
        return $this->belongsToMany('App\Tag');
    }

    public function createtags($tagString){
        $tags = explode(',', $tagString);
        $tagIds = [];

        foreach($tags as $tag){

            $newTag = new Tag();
            $newTag->name = ucwords(trim($tag));
            $newTag->slug = str_slug($tag);
            $newTag->save();

            $tagIds[] = $newTag->id;
        }

        $this->tags()->attach($tagIds);
    }

    public function dateFormatted($showTimes = false ){
        $format = "d/m/Y";
        if($showTimes) $format = $format ."H:i:s";
        return $this->created_at->format($format);
    }
    
    public function startDateFormatted($showTimes = false ){
        $format = "d/m/Y";
        if($showTimes) $format = $format ." H:i:s";
        if($this->published_at != null)
        return $this->published_at->format($format);
    }

    public function publicationLabel(){
        if(! $this->published_at){
            return '<span class="label label-warning">Draft</span>';
        } 
        elseif($this->published_at && $this->published_at->isFuture()){
            return '<span class="label label-info">Schedule</span>';
        }
        else{
            return '<span class="label label-success">Published</span>';
            
        }
    }

    public static function archives(){
        // monthname function wont be found in postgres change to month
        if(env("DB_CONNECTION") === 'pgsql'){
            return static::selectRaw('count(id) as event_count, extract(year from published_at) as year, extract(month from published_at) as month')
                        ->published()
                        ->groupBy('year','month','published_at')
                        ->orderBy('published_at','desc')
                        ->get();    
        }else{
            return static::selectRaw('count(id) as event_count, year(published_at) year, month(published_at) month')
                        ->published()
                        ->groupBy('year','month')
                        ->orderBy('published_at','desc')
                        ->get();
        }
        
       
    }

    public function setPublishedAtatrribute($value){
        $this->attributes['published_at'] = $value ?: NULL;
    }

    public function getImageUrlAttribute($value){

        $imageUrl = "";

        
        if( ! is_null($this->event_image)){

            $directory = config('cms.image.directory');
            $imagePath = public_path() . "/{$directory}/" . $this->event_image;

            if(env('APP_ENV') === 'local') {
                
                if(file_exists($imagePath)) $imageUrl  = asset("{$directory}/" . $this->event_image);
            }

            $s3Directory = config('cms.s3-image.directory');
            $imageUrl = $s3Directory.$this->event_image;

            
        }
 
        return $imageUrl;
    }

    public function getImageThumbUrlAttribute($value){

        $imageUrl = ""; 

        if( ! is_null($this->event_image)){

            $directory = config('cms.image.directory');
           
            $ext = substr(strchr($this->event_image, '.'), 1); 
            $thumbnail = str_replace(".{$ext}", "_thumb.{$ext}", $this->event_image);

            if(env('APP_ENV') === 'local') {
                
                $imagePath = public_path() . "/{$directory}/" . $thumbnail;
                if(file_exists($imagePath)) $imageUrl  = asset("{$directory}/" . $thumbnail);
            }

            $s3Directory = config('cms.s3-image.directory');
            $imageUrl = $s3Directory.$thumbnail;
            
        }

        return $imageUrl;

    }

    public function getDateAttribute($value){

       return is_null($this->published_at) ? '' : $this->published_at->diffForHumans();
    }

    public function getBodyHtmlAttribute($value){

        return $this->description ? Markdown::convertToHtml($this->description) : NULL;
    }

    public function getExcerptHtmlAttribute($value){

        return $this->excerpt ? Markdown::convertToHtml($this->excerpt) : NULL;
    }

    public function getTagsHtmlAttribute(){
        $anchors = [];
        foreach($this->tags as $tag){
            $anchors[] = '<a href="'. route('tag', $tag->slug) .'">'. $tag->name .'</a>';
        }

        return implode(",", $anchors);
    }

    public function scopeLatestFirst($query){

        return $query->orderBy('published_at', 'desc');
    }

    public function scopePopular($query){

        return $query->orderBy('view_count', 'desc');
    }

    public function scopePublished($query){
    
        return $query->where("published_at", "<=", Carbon::now());
    }

    public function scopeScheduled($query){
    
        return $query->where("published_at", ">", Carbon::now());
    }

    public function scopeDraft($query){
    
        return $query->whereNull("published_at");
    }

    public function scopeFilter($query, $filter){

        if(isset($filter['month']) && $month = $filter['month']){
            if(env('DB_CONNECTION') === 'pgsql'){
                $query->whereRaw('extract(month from published_at) = ?', [$month]);
                // $query->whereMonth('published_at', Carbon::parse($month)->month);
            }else{
                $query->whereRaw('month(published_at) = ?', [$month]);
            }
           
        }

        if(isset($filter['year']) && $year = $filter['year']){
            if(env('DB_CONNECTION') === 'pgsql'){
                $query->whereRaw('extract(year from published_at) = ?', [$year]);
            // $query->whereYear('published_at', $year);
            }else{
                $query->whereRaw('month(published_at) = ?', [$year]);
            
            }
            
        }

        if(isset($filter['term']) && $term = strtolower($filter['term'])){
            $query->where(function($q) use ($term){
                    $q->whereHas('user', function($qr) use ($term){
                    $qr->Where('name', 'LIKE', "%{$term}%");
                });
                    $q->orWhereHas('category', function($qr) use ($term){
                    $qr->Where('title', 'LIKE', "%{$term}%");
                });
                 $q->orWhere('event_name', 'LIKE', "%{$term}%");
                 $q->orWhere('excerpt', 'LIKE', "%{$term}%");
            });
         }
    }
}

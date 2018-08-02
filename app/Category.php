<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{

    protected $fillable = ['title', 'slug'];
    
    public function events(){
        
        return $this->hasMany('App\Event');
    }

    public function getRouteKeyName(){
        
        return 'slug';
    }
    
}

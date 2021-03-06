<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    public function events(){
        return $this->belongsToMany('App\Event');
    }

    public function getRouteKeyName(){
        return 'slug';
    }
}

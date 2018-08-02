<?php

namespace App;

use App\Notifications\VerifyEmail;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use GrahamCampbell\Markdown\Facades\Markdown;
use Laratrust\Traits\LaratrustUserTrait;

class User extends Authenticatable
{
    use Notifiable;
    use LaratrustUserTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'token', 'slug', 'bio'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function events(){
        return $this->hasMany('App\Event');
    }

    public function verified(){
        return $this->token ===  null;
    }

    public function gravatar(){
        $email = $this->email;
        $default = "http://bigbang.lefigaro.fr/wp-content/uploads/sites/18/2016/05/avatar.png";
        $size = 40;

        return "https://www.gravatar.com/avatar/" . md5( strtolower( trim( $email ) ) ) . "?d=" . urlencode( $default ) . "&s=" . $size;
        
    }

    public function sendVerificationEmail(){
        $this->notify(new verifyEmail($this));
    }
    //overided method to return slug instead of id
    public function getRouteKeyName(){
        
        return 'slug';
    }

    public function getBioHtmlAttribute($value){

        return $this->bio ? Markdown::convertToHtml($this->bio) : NULL;
    }
}

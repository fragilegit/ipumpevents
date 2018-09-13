<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Event;

class HomeController extends Controller
{

    protected $limit;
    
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index']]);
        $this->limit = 3;
    }

    public function index()
    {
        $events = Event::published()->orderBy('created_at','desc')->paginate($this->limit);
        return view('home')->with('events', $events);
    }

    public function zoey(){
        
        return view('pages.zoey');
    }
}

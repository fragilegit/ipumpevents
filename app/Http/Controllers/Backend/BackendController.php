<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Event;

class BackendController extends Controller
{
   
    protected $limit = 7;

    public function __construct()
    {
        // $this->middleware('auth:admin');
        $this->middleware('auth');
        $this->middleware('check-permissions');
    }

    public function index(Request $request)
    {   
        $user = Auth::user();
        $user = $user->get();
        $event = Event::get();
        $publishedCount = Event::published()->count();
        $scheduledCount = Event::scheduled()->count();
        $trashedCount = Event::onlyTrashed()->count();
        $draftCount = Event::draft()->count();

      return view('backend.admin', compact('user','event','publishedCount','scheduledCount','trashedCount','draftCount'));  
    }
}

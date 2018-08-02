<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;

use App\Event;
use App\Http\Requests;

class MainController extends BackendController
{

    public function __construct()
    {
        parent::__construct();
        // $this->middleware('auth');
        // $this->middleware('check-permissions');
    }

    public function index(Request $request){
        return view('backend.home.index');
    }

    public function edit(Request $request){
        // dd('edit account bruh');
        $user = $request->user();
        return view('backend.home.edit', compact('user'));
    }

    public function update(Requests\AccountUpdateRequest $request){
        $user = $request->user();
        $user->update(!isset($request->password) ? $request->except(['password']) : $request->all()); 

        return redirect()->back()->with("success", "Your account has been successfully updated");
    }
}

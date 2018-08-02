<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use Auth;

class BackendLoginController extends Controller
{
    
    public function __contruct(){
        // $this->middleware('guest:admin');
    }

    public function showLoginForm(){

        return view('auth.backend-login');
    
    }

    public function login(Request $request){
        //Validate form
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required|min:6'
        ]);

        //Attempt to login user
        if( Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password])){
            //if successful redirect
            return redirect()->intended(route('admin.dashboard'));
        }
       
        //if unsuccessful redirect login
        return Redirect::back()->withInput($request->only('email'));

    }
}

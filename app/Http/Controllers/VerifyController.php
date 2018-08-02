<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class VerifyController extends Controller
{
    //
    public function verify($token){

       User::where('token', $token)->firstorfail()
            ->update(['token' => null]);

       return Redirect::to('dashboard')->with('success', 'Account Verified.');            

    }
}



<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    Public function login ()
    {
        return view('auths.login');
    }
    Public function postlogin (Request $request)
    {
        if(Auth::attempt($request->only('email','password'))){
            return redirect('/dashboard');
        }
        return redirect('/login');
    }

    Public function logout ()
    {
        Auth::logout();
        return redirect('/login');
    }
}

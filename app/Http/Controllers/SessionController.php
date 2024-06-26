<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SessionController extends Controller
{
    function login(Request $request){
        $infologin = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ], [
            'email.required'=>'Email is required',
            'password.required'=>'Password is required',
        ]);

        if(Auth::attempt($infologin)) {
            notify()->success('Login Success!');
            return redirect('/');
        } else {
            notify()->error('Email or Password invalid!');
            return redirect('/');
        }
    }

    function logout(){
        Auth::logout();
        notify()->success('Logout Success!');
        return redirect('/');
    }
}

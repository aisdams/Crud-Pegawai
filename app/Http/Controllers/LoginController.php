<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login(){
        return view('login');
    }

    public function loginproses(Request $request){
        if(Auth::attempt($request->only('username','password'))){
            return redirect('/');
        }

        return \redirect('login');
    }

    public function logout(){
        Auth::logout();
        return redirect('/login');
    }
}
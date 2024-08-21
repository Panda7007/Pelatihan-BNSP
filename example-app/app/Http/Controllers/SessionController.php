<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

class SessionController extends Controller
{
    //
    public function sesi(){
        return view('/login');
    }

    public function login(Request $request){
        $infologin =[
            'email' => $request->input('email'),
            'password' => $request->input('password')
        ];

        if(Auth::attempt($infologin)){
            return 'sukes';
        } else {
            return redirect ('/login')->withErrors('user name dan password yang anda masukkan salah');
        }
    }
}

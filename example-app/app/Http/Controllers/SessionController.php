<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;

class SessionController extends Controller
{
    //
    public function login(){
        return view('login');
    }

    function masuk(Request $request){
        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ],[
            'email.required' => 'email wajid diisi',
            'password.required' => 'password wajid diisi'
        ]);

        $infologin =[
            'email' => $request->email,
            'password' => $request->password
        ];

    if(Auth::attempt($infologin)){
        return 'sukes';
    }
}

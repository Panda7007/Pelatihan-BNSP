<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;

class LoginController extends Controller
{
    public function login()
    {
        if (Auth::check()) 
        {
            return redirect('/pegawai');
        }
        else
        {
            return view('login');
        }
    }

    public function loginaksi(Request $request)
    {
        $data = [
            'email' => $request->input('email'),
            'password' => $request->input('password'),
        ];

        if (Auth::Attempt($data)) 
        {
            return redirect('/pegawai');
        }
        else
        {
            Session::flash('error', 'Email atau Password Salah');
            return redirect('/');
        }
    }

    public function logoutaksi()
    {
        Auth::logout();
        return redirect('/');
    }
}
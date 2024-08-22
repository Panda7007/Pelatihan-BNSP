<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //
    public function index()
    {// mengambil data dari table pegawai
        // mengambil data dari table pegawai
    	$buku = DB::table('buku')->get();
        $peminjam =  DB::table('peminjam')->get();
 
    	// mengirim data pegawai ke view index
    	return view('home',['buku' => $buku,'peminjam'=>$peminjam]);
    }

    public function login()
    {
        if (Auth::check()) 
        {
            return redirect('/user');
        }
        else
        {
            // mengambil data dari table pegawai
            $buku = DB::table('buku')->get();
            $peminjam =  DB::table('peminjam')->get();
    
            // mengirim data pegawai ke view index
            return view('home',['buku' => $buku,'peminjam'=>$peminjam]);
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

            return redirect('/user');
        }
        else
        {
            Session::flash('error', 'Email atau Password Salah');
            return redirect('/rumah');
        }
    }

    public function logoutaksi()
    {
        Auth::logout();
        return redirect('/home');
    }
}

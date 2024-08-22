<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class BukuController extends Controller
{
    //
    public function index()
    {
    	// mengambil data dari table pegawai
    	$buku = DB::table('buku')->get();
        $peminjam =  DB::table('peminjam')->get();
 
    	// mengirim data pegawai ke view index
    	return view('home',['buku' => $buku,'peminjam'=>$peminjam]);
 
    }
}

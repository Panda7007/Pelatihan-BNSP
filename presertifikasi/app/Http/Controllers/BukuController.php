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

    function pinjam(Request $request)
    {
        // Check if a peminjam with the same nama and email already exists
        $existingPeminjam = DB::table('peminjam')
            ->where('judul_buku', $request->buku)
            ->where('email', $request->email)
            ->first();

        if ($existingPeminjam) {
            // If a matching peminjam is found, return an error message
            return back()->with('error', 'Buku sudah diajukan dan dalam antrian');
        } else {
            // If no matching peminjam is found, insert the new data
            DB::table('peminjam')->insert([
                'nama' => $request->nama,
                'email' => $request->email,
                'judul_buku' => $request->buku,
                'tanggal' => $request->tanggal,
                'status' => 'Pengajuan'
            ]);
            // alihkan halaman ke halaman buku
            return redirect('buku');
        }
    }

    public function edit($id)
    {
        // mengambil data buku berdasarkan id yang dipilih
        $buku = DB::table('buku')->where('id_buku', $id)->first();
        // passing data buku yang didapat ke view edit.blade.php
        return view('buku.edit', ['buku' => $buku]);
    }
}

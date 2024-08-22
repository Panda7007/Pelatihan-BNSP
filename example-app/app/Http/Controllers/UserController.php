<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //
    public function index()
    {
    	// mengambil data dari table pegawai
    	$user = DB::table('users')->get();
        $password  = DB::table('users')->get();
 
    	// mengirim data pegawai ke view index
    	return view('user.tampil',['user' => $user]);
 
    }

    // method untuk menampilkan view form tambah pegawai
    public function tambah()
    {
    
        // memanggil view tambah
        return view('tambah');
    
    }

    // method untuk insert data ke table pegawai
    public function store(Request $request)
    {
        // insert data ke table user
        DB::table('users')->insert([
            'name' => $request->nama,
            'email' => $request->email,
            'password' => hash::make($request->password)
            ]);
        // alihkan halaman ke halaman pegawai
        return redirect('/user');
    
    }

    // update data pegawai
    public function update(Request $request)
    {
        // update data pegawai
        DB::table('pegawai')->where('pegawai_id',$request->id)->update([
            'pegawai_nama' => $request->nama,
            'pegawai_jabatan' => $request->jabatan,
            'pegawai_umur' => $request->umur,
            'pegawai_alamat' => $request->alamat
        ]);
        // alihkan halaman ke halaman pegawai
        return redirect('/pegawai');
    }

    // method untuk hapus data pegawai
    public function hapus($id)
    {
        // menghapus data pegawai berdasarkan id yang dipilih
        DB::table('pegawai')->where('pegawai_id',$id)->delete();
            
        // alihkan halaman ke halaman pegawai
        return redirect('/pegawai');
    }
}

<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PegawaiController;

Route::get('/', function () {
    return view('welcome');
});

//route CRUD
Route::get('/pegawai',[PegawaiController::class,'index']); // Untuk menampilkan
Route::get('/pegawai/tambah',[PegawaiController::class,'tambah']); //tampilan tamba h
Route::post('/pegawai/store',[PegawaiController::class,'store']); //proses store data
Route::post('/pegawai/update',[PegawaiController::class,'update']); //tampilan update

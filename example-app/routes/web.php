<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\SessionController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', function () {
    return view('login');
});

//route CRUD
Route::get('/pegawai',[PegawaiController::class,'index']); // Untuk menampilkan
Route::get('/pegawai/tambah',[PegawaiController::class,'tambah']); //tampilan tamba h
Route::post('/pegawai/store',[PegawaiController::class,'store']); //proses store data
Route::get('/pegawai/edit/{id}',[PegawaiController::class,'edit']); //menampilkan 
Route::post('/pegawai/update',[PegawaiController::class,'update']); //proses update

Route::get('/login',[SessionController::class,'login']); // Untuk menampilkan
Route::post('/login/masuk',[SessionController::class,'masuk']); 
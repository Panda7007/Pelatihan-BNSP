<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\HomeController;




//route CRUD
Route::get('/pegawai',[PegawaiController::class,'index'])->middleware('auth'); // Untuk menampilkan
Route::get('/pegawai/tambah',[PegawaiController::class,'tambah']); //tampilan tamba h
Route::post('/pegawai/store',[PegawaiController::class,'store']); //proses store data
Route::get('/pegawai/edit/{id}',[PegawaiController::class,'edit']); //menampilkan 
Route::post('/pegawai/update',[PegawaiController::class,'update']); //proses update
Route::get('/pegawai/hapus/{id}',[PegawaiController::class,'hapus']); //untuk menghapus program

//user
Route::get('/user',[UserController::class,'index']); // Untuk menampilkan


Route::get('/sesi',[SessionController::class,'sesi']); // Untuk menampilkan
Route::post('/sesi/masuk',[SessionController::class,'login']); //login

Route::get('/', [LoginController::class,'login'])->name('login');
Route::post('/loginaksi', [LoginController::class,'loginaksi'])->name('loginaksi');

Route::get('/home', [HomeController::class,'index'])->middleware('auth');
Route::get('/logoutaksi', [LoginController::class,'logoutaksi'])->name('logoutaksi')->middleware('auth');
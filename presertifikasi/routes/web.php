<?php

use App\Http\Controllers\BukuController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;



Route::get('/rumah', function () {
    return view('home');
});

Route::get('/buku',[BukuController::class,'index']);
Route::post('/buku/pinjam',[BukuController::class,'pinjam']);
Route::get('/buku/edit/{id}',[BukuController::class,'edit']);


//User
Route::get('/',[UserController::class,'login'])->name('login');
Route::get('/user',[UserController::class,'index']);
Route::post('/masuk',[UserController::class,'loginaksi'])->name('loginaksi');
Route::get('/logoutaksi', [UserController::class,'logoutaksi'])->name('logoutaksi')->middleware('auth');
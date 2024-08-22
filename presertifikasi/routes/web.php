<?php

use App\Http\Controllers\BukuController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/rumah', function () {
    return view('home');
});

Route::get('/buku',[BukuController::class,'index']);
<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {return view('layouts.home');})->name('home');
Route::get('/pengajuan', function () {return view('layouts.pengajuan');})->name('pengajuan');
Route::get('/login', function () {return view('auth.login');})->name('login');
Route::get('/register', function () {return view('auth.register');})->name('register');
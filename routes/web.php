<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {return view('layouts.home');});
Route::get('/pengajuan', function () {return view('pengajuan');});
<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('dashboard');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
Route::get('/kartu-gantung', function () {
    return view('kartu-gantung.list');
})->name('kartu-gantung.index');

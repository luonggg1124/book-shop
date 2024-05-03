<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('custom.components.home');
})->name('app.home');

Route::get('/popular',[\App\Http\Controllers\BookController::class,'popular'])->name('book.popular');

Route::get('/login', function () {
    return view('custom.auth.login');
})->name('app.login');



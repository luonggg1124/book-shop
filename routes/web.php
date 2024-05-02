<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('custom.home');
})->name('app.home');

Route::get('/login', function () {
    return view('custom.auth.login');
})->name('app.login');



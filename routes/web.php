<?php


use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('custom.components.home');
})->name('app.home');

Route::get('popular',[\App\Http\Controllers\BookController::class,'popular'])->name('book.popular');

Route::get('new',[\App\Http\Controllers\BookController::class,'new'])->name('book.new');

Route::get('low-to-high-price',[\App\Http\Controllers\BookController::class,'low_to_high_price'])->name('book.low-to-high-price');

Route::get('high-to-low-price',[\App\Http\Controllers\BookController::class,'high_to_low_price'])->name('book.high-to-low-price');

Route::get('login',[\App\Http\Controllers\Auth\AuthController::class,'login_view'] )->name('app.login');

Route::post('login', [\App\Http\Controllers\Auth\AuthController::class,'login'])->name('login.post');

Route::get('profile/{account_name}',[\App\Http\Controllers\Profile\ProfileController::class,'profile'])->name('user.profile');


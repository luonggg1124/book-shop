<?php


use Illuminate\Support\Facades\Route;

Route::get('/', [\App\Http\Controllers\GuestController::class,'index'])->name('app.home');

Route::get('search',[\App\Http\Controllers\GuestController::class,'search'])->name('book.search');

Route::get('popular',[\App\Http\Controllers\GuestController::class,'popular'])->name('book.popular');

Route::get('new',[\App\Http\Controllers\GuestController::class,'new'])->name('book.new');

Route::get('low-to-high-price',[\App\Http\Controllers\GuestController::class,'low_to_high_price'])->name('book.low-to-high-price');

Route::get('high-to-low-price',[\App\Http\Controllers\GuestController::class,'high_to_low_price'])->name('book.high-to-low-price');

Route::get('login',[\App\Http\Controllers\Auth\AuthController::class,'login_view'] )->name('app.login');

Route::post('login', [\App\Http\Controllers\Auth\AuthController::class,'login'])->name('login.post');

Route::get('logout',[\App\Http\Controllers\Auth\AuthController::class,'logout'])->name('app.logout');

Route::get('profile/{account_name}',[\App\Http\Controllers\User\ProfileController::class,'profile'])->name('user.profile');

Route::get('/category/{name}',[\App\Http\Controllers\GuestController::class,'books_by_section'])->name('book.category');

Route::get('{name}/{id}',[\App\Http\Controllers\GuestController::class,'details'])->name('book.details');

Route::post('comment/{id}',[\App\Http\Controllers\User\CommentController::class,'store'])->name('user.comment');

Route::get('comment/delete/{id}',[\App\Http\Controllers\User\CommentController::class,'remove'])->name('comment.remove');


<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\HomeController;

// Route::get('/', function () {
//     return view('frontend.pages.home');
//     // return view('test');
// });

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/purchase', [HomeController::class, 'purchase'])->name('purchase');
Route::get('/order', [HomeController::class, 'order'])->name('order');
Route::get('/profile', [HomeController::class, 'profile'])->name('profile');
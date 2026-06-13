<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\OrderController;
use App\Http\Controllers\Auth\OtpVerificationController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Frontend Routes
|--------------------------------------------------------------------------
*/

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/order/{id}', [OrderController::class, 'getOrder'])
    ->whereNumber('id')
    ->name('order.show');

Route::post('/place-order', [OrderController::class, 'placeOrder'])->name('order.place');

Route::get('/service-details/{id}', [OrderController::class, 'serviceDetails'])
    ->whereNumber('id')
    ->name('service.details');

Route::post('/order/store', [OrderController::class, 'store'])->name('order.store');

Route::get('/order/track/{id}', [OrderController::class, 'orderTrack'])
    ->whereNumber('id')
    ->name('order.track');

/*
|--------------------------------------------------------------------------
| User Routes
|--------------------------------------------------------------------------
*/

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware('auth')->prefix('user')->name('user.')->group(function () {
    Route::get('/my-profile', [HomeController::class, 'userProfile'])->name('profile');
    Route::get('/my-orders', [HomeController::class, 'userOrders'])->name('orders');
});

/*
|--------------------------------------------------------------------------
| OTP Routes
|--------------------------------------------------------------------------
*/

Route::get('verify-otp', [OtpVerificationController::class, 'show'])->name('otp.verify');
Route::post('verify-otp', [OtpVerificationController::class, 'verify']);
Route::post('resend-otp', [OtpVerificationController::class, 'resend'])->name('otp.resend');

/*
|--------------------------------------------------------------------------
| Include Other Route Files
|--------------------------------------------------------------------------
*/

require __DIR__.'/auth.php';
require __DIR__.'/admin.php';

/*
|--------------------------------------------------------------------------
| Fallback Route
|--------------------------------------------------------------------------
*/

Route::fallback(function () {
    return response()->view('errors.404', [], 404);
});
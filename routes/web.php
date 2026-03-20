<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Frontend\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\Settings\RoleController;
use App\Http\Controllers\Backend\Settings\UserController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\Pages\ProductController;
use App\Http\Controllers\Auth\OtpVerificationController;
use App\Http\Controllers\Backend\Pages\NotificationController;
use App\Http\Controllers\Backend\Pages\CareServiceController;


Route::fallback(function () {
    return response()->view('errors.404', [], 404);
});


 Route::get('/', [HomeController::class, 'index'])->name('home');
 Route::get('/service', [HomeController::class, 'service'])->name('service');
 Route::get('/order', [HomeController::class, 'order'])->name('order');
 Route::get('/profile', [HomeController::class, 'profile'])->name('profile');

 
 Route::get('//service-details/{id}', [HomeController::class, 'serviceDetails'])->name('service.details');
 Route::get('/place-order/{id}', [HomeController::class, 'placeOrder'])->name('place.order');
Route::post('/order/store', [HomeController::class, 'store'])->name('order.store');
Route::get('/order/track/{id}', [HomeController::class, 'orderTrack'])->name('order.track');



 

Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');


// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');






Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


require __DIR__.'/auth.php';


Route::middleware(['auth'])->group(function () {
    Route::get('verify-otp', [OtpVerificationController::class, 'show'])->name('otp.verify');
    Route::post('verify-otp', [OtpVerificationController::class, 'verify'])->name('otp.verify');
    Route::post('resend-otp', [OtpVerificationController::class, 'resend'])->name('otp.resend');
});


// Route::middleware(['auth', 'verified','route_permission'])->group(function () {
Route::middleware(['auth', 'verified','route_permission'])->prefix('admin')->group(function () {
    
    Route::resource('roles', RoleController::class);
    Route::resource('users', UserController::class);
    Route::resource('products', ProductController::class);
    Route::resource('care-services', CareServiceController::class);


    Route::get('notifications', [NotificationController::class, 'index'])->name('notifications.index');
    Route::post('notifications/{id}/mark-as-read', [NotificationController::class, 'markAsRead'])->name('notifications.markAsRead');
});






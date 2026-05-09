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
use App\Http\Controllers\Frontend\OrderController;
use App\Http\Controllers\Backend\Settings\PermissionController;
use App\Http\Controllers\Backend\Pages\OrderConteroller as BackendOrderController;
use App\Http\Controllers\Backend\Pages\PackageController;

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
| Admin Dashboard
|--------------------------------------------------------------------------
*/


/*
|--------------------------------------------------------------------------
| User Authenticated Profile Routes
|--------------------------------------------------------------------------
*/

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});



require __DIR__.'/auth.php';

/*
|--------------------------------------------------------------------------
| OTP Verification Routes
|--------------------------------------------------------------------------
*/

Route::get('verify-otp', [OtpVerificationController::class, 'show'])->name('otp.verify');
Route::post('verify-otp', [OtpVerificationController::class, 'verify'])->name('otp.verify');
Route::post('resend-otp', [OtpVerificationController::class, 'resend'])->name('otp.resend');



/*
|--------------------------------------------------------------------------
| Customer Routes
|--------------------------------------------------------------------------
| Use verified.user if using custom OTP verification
|--------------------------------------------------------------------------
*/
Route::middleware('auth')->prefix('user')->name('user.')->group(function () {
    Route::get('/my-profile', [HomeController::class, 'userProfile'])->name('profile');
    Route::get('/my-orders', [HomeController::class, 'userOrders'])->name('orders');
});


/*
|--------------------------------------------------------------------------
| Admin Protected Routes
|--------------------------------------------------------------------------
*/
// Dashboard
Route::middleware(['auth', 'verified'])
    ->prefix('admin')
    ->group(function () {
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
    });

// Other admin routes
Route::middleware(['auth', 'verified', 'route_permission'])
    ->prefix('admin')
    ->group(function () {
        Route::resource('roles', RoleController::class);
        Route::resource('permissions', PermissionController::class);
        Route::resource('users', UserController::class);
        Route::resource('products', ProductController::class);
        Route::resource('care-services', CareServiceController::class);
        
        Route::resource('package', PackageController::class);
        Route::get('orders', [BackendOrderController::class, 'index'])
                ->name('orders.index')
                ->middleware('permission:orders-list');
       
        Route::get('users/orders', [BackendOrderController::class, 'orderUsers'])
                ->name('users.manage.index')
                ->middleware(['auth', 'permission:users-manage']);




        Route::get('notifications', [NotificationController::class, 'index'])->name('notifications.index');
        Route::post('notifications/{id}/mark-as-read', [NotificationController::class, 'markAsRead'])->name('notifications.markAsRead');
    });
    
    
/*
|--------------------------------------------------------------------------
| Fallback Route
|--------------------------------------------------------------------------
*/

Route::fallback(function () {
    return response()->view('errors.404', [], 404);
});
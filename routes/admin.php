<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\Settings\RoleController;
use App\Http\Controllers\Backend\Settings\UserController;
use App\Http\Controllers\Backend\Settings\PermissionController;
use App\Http\Controllers\Backend\Pages\ProductController;
use App\Http\Controllers\Backend\Pages\CareServiceController;
use App\Http\Controllers\Backend\Pages\OrderConteroller as BackendOrderController;
use App\Http\Controllers\Backend\Pages\NotificationController;
use App\Http\Controllers\Backend\Pages\PackagesController;
use App\Http\Controllers\Backend\Pages\OrderProcessController;

Route::middleware(['auth', 'verified'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {

        Route::get('/dashboard', [DashboardController::class, 'index'])
            ->name('dashboard');

        Route::middleware('route_permission')->group(function () {
//
            Route::resource('roles', RoleController::class);
            Route::resource('permissions', PermissionController::class);
            Route::resource('users', UserController::class);
            Route::resource('products', ProductController::class);
            Route::resource('care-services', CareServiceController::class);
            Route::resource('packages', PackagesController::class);
            Route::resource('process', OrderProcessController::class);


            Route::get('orders', [BackendOrderController::class, 'index'])
                ->name('orders.index')
                ->middleware('permission:orders-list');

            Route::get('users/orders', [BackendOrderController::class, 'orderUsers'])
                ->name('users.manage.index')
                ->middleware('permission:users-manage');

            Route::get('notifications', [NotificationController::class, 'index'])
                ->name('notifications.index');

            Route::post('notifications/{id}/mark-as-read', [NotificationController::class, 'markAsRead'])
                ->name('notifications.markAsRead');
        });
    });
<?php

use App\Models\ProductProps;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\TagController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\CategorySizeController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\ProductColorController;
use App\Http\Controllers\Admin\ProductImageController;
use App\Http\Controllers\Admin\ProductPropsController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\AdminAuth\AuthenticatedSessionController;

Route::middleware('isAdmin')->group(function () {

    Route::resource('admins', AdminController::class);
    Route::resource('categories', CategoryController::class);
    Route::resource('tags', TagController::class);
    Route::resource('products', ProductController::class);
    Route::resource('orders', OrderController::class);
    Route::resource('productImage', ProductImageController::class);
    Route::resource('/sliders', SliderController::class);
    Route::view('/dashboard', 'index', ['ordersCount' => \App\Models\Order::count()])->name('admin.dashboard');

    Route::controller(ProductPropsController::class)->group(function () {
        Route::delete('productProps/delete/{id}', 'delete')->name('productProps.delete');
        Route::post('/productProps/update/{productProps}', 'update')->name('productProps.update');
    });
    Route::controller(CategorySizeController::class)->group(function () {
        Route::get('/catizes/{category}', 'show')->name('cat.sizes');
        Route::post('/catsizes/store/{id}', 'store')->name('cat.sizes.store');
        Route::delete('cat.sizes.destroy/{size}', 'destroy')->name('cat.sizes.destroy');
    });
    Route::controller(OrderController::class)->group(function () {
        Route::get('/order/show/{order}', 'show')->name('order.show');
        Route::put('/status/update/{order}', 'statusUpdate')->name('status.update');
    });

    Route::controller(ProductColorController::class)->group(function () {
        Route::delete('productColors/delete/{productColor}', 'delete')->name('productColors.delete');
        Route::post('/productColors/update/{productColor}', 'update')->name('productColors.update');
    });

    Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])
        ->name('admin.logout');
});

// Route::get('/ordersPage', [OrderController::class, 'index'])->name('orders.index');

require __DIR__ . '/admin-auth.php';

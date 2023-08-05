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

Route::resource('admins', AdminController::class);
Route::resource('categories', CategoryController::class);
Route::resource('tags', TagController::class);
Route::resource('products', ProductController::class);
Route::resource('orders', OrderController::class);
Route::delete('productProps/delete/{id}', [ProductPropsController::class, 'delete'])->name('productProps.delete');
Route::post('/productProps/update/{productProps}', [ProductPropsController::class, 'update'])->name('productProps.update');
Route::resource('productImage', ProductImageController::class);
Route::resource('/sliders', SliderController::class);
Route::get('/catizes/{category}', [CategorySizeController::class, 'show'])->name('cat.sizes');
Route::post('/catsizes/store/{id}', [CategorySizeController::class, 'store'])->name('cat.sizes.store');
Route::delete('cat.sizes.destroy/{size}', [CategorySizeController::class, 'destroy'])->name('cat.sizes.destroy');
Route::delete('productColors/delete/{productColor}', [ProductColorController::class, 'delete'])->name('productColors.delete');
Route::post('/productColors/update/{productColor}', [ProductColorController::class, 'update'])->name('productColors.update');
// Route::get('/ordersPage', [OrderController::class, 'index'])->name('orders.index');
Route::get('/order/show/{order}', [OrderController::class, 'show'])->name('order.show');
Route::put('/status/update/{order}', [OrderController::class, 'statusUpdate'])->name('status.update');

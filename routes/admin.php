<?php

use App\Models\ProductProps;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\TagController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductImageController;
use App\Http\Controllers\Admin\ProductPropsController;

Route::resource('admins', AdminController::class);
Route::resource('categories', CategoryController::class);
Route::resource('tags', TagController::class);
Route::resource('products', ProductController::class);
Route::delete('productProps/delete/{id}', [ProductPropsController::class, 'delete'])->name('productProps.delete');
Route::post('/productProps/update/{productProps}',[ProductPropsController::class,'update'])->name('productProps.update');
Route::resource('productImage',ProductImageController::class);
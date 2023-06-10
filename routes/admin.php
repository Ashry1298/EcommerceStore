<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\TagController;
use Illuminate\Support\Facades\Route;

Route::resource('admins', AdminController::class);
Route::resource('categories', CategoryController::class);
Route::resource('tags', TagController::class);
Route::resource('products',ProductController::class);
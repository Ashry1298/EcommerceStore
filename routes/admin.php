<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CategoryController;
use Illuminate\Support\Facades\Route;

Route::resource('admins', AdminController::class);
Route::resource('categories', CategoryController::class);

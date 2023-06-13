<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LangController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::middleware('Lang')->group(function(){
    Route::view('/test', 'index')->name('test');
    Route::get('/', [HomeController::class, 'index'])->name('front');
});
Route::get('changeLocale/{lang}', [LangController::class, 'changeLang'])->name('changeLang');

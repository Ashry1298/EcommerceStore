<?php

use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Front\CartController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LangController;
use App\Http\Controllers\Front\HomeController;
use App\Http\Controllers\Front\CategoryController;
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
Route::middleware('Lang')->group(function () {
    Route::view('/test', 'index')->name('test');
    Route::get('/', [HomeController::class, 'index'])->name('front');
    Route::get('category/{category}', [CategoryController::class, 'show'])->name('category.show');
    Route::post('/cart/add/{product_id}', [CartController::class, 'store'])->name('Frontcart.store');
    Route::get('/cartview',[CartController::class,'index']);
    Route::get('/cartItem/delete/{id}',[CartController::class,'destroy'])->name('cartItem.delete');
    Route::get('viewCartItems/{id}',[CartController::class,'cartItemsView'])->name('viewCartItems');
    Route::post('/cartItems/Update/{id}',[CartController::class,'update'])->name('cartItems.update');
});
Route::get('changeLocale/{lang}', [LangController::class, 'changeLang'])->name('changeLang');

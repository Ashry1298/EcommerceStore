<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LangController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Front\CartController;
use App\Http\Controllers\Front\HomeController;
use App\Http\Controllers\Front\OrderController;
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


Route::get('/welcome', function () {
    return view('welcome');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
Route::middleware('Lang')->group(function () {
    Route::get('/', [HomeController::class, 'index'])->name('front');
    Route::view('/test', 'index', ['ordersCount' => \App\Models\Order::count()])->name('test');
    Route::view('/cartview', 'Front.layout.cart');
    Route::get('category/{category}', [CategoryController::class, 'show'])->name('category.show');
    Route::post('/cart/add/{product}', [CartController::class, 'store'])->name('Frontcart.store');
    Route::get('/cartItem/destroy/{cartItem}', [CartController::class, 'destroy'])->name('cartItem.destroy');
    Route::get('viewCartItems/{id}', [CartController::class, 'cartItemsView'])->name('viewCartItems');
    Route::post('/cartItems/Update/{id}', [CartController::class, 'update'])->name('cartItems.update');
    Route::post('/checkout', [OrderController::class, 'store'])->name('checkout.store');
});
Route::get('changeLocale/{lang}', [LangController::class, 'changeLang'])->name('changeLang');

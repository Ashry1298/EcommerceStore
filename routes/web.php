<?php

use  App\Cart\Cart;
use App\Models\Admin;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LangController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Front\AuthController;
use App\Http\Controllers\Front\CartController;
use App\Http\Controllers\Front\HomeController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Front\OrderController;
use App\Http\Controllers\Front\CategoryController;
use App\Models\OrderItems;

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
    Route::get('/', [HomeController::class, 'index'])->name('front');
    Route::view('/test', 'index', ['ordersCount' => \App\Models\Order::count()])->name('test');
    Route::view('/cartview', 'Front.layout.cart');
    Route::get('category/{category}', [CategoryController::class, 'show'])->name('category.show');
    Route::post('/cart/add/{product}', [CartController::class, 'store'])->name('Frontcart.store');
    Route::get('/cartItem/destroy/{id}', [CartController::class, 'destroy'])->name('cartItem.destroy');
    Route::post('/cartItems/Update/', [CartController::class, 'update'])->name('cartItems.update');
});
Route::get('changeLocale/{lang}', [LangController::class, 'changeLang'])->name('changeLang');

Route::middleware('IsAuth')->group(function () {
    Route::get('/logout', [AuthController::class, 'logout'])->name('auth.logout');
});
Route::view('/register', 'auth.register');
Route::view('/login', 'auth.login');
Route::post('/register', [AuthController::class, 'handleRegister'])->name('auth.register');
Route::post('/login', [AuthController::class, 'handleLogin'])->name('auth.login');

Route::middleware('HasSessionId')->group(function () {
});
Route::get('viewCartItems/', [CartController::class, 'cartItemsView'])->name('viewCartItems');


Route::get('/myorders', [OrderController::class, 'index'])->name('myOrders');

Route::get('/orders/show/{id}', [OrderController::class, 'show'])->name('MyOrders.show');
Route::post('/checkout', [OrderController::class, 'store'])->name('checkout.store');
Route::view('/FindoMyOrder','Front.orders.findMyOrders')->name('findMyOrder');
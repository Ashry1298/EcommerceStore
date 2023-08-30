<?php

use  App\Cart\Cart;
use App\Models\Admin;
use App\Models\Order;
use App\Models\OrderItems;
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
use App\Http\Controllers\Auth\AuthenticatedSessionController;

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
    Route::view('/cartview', 'Front.layout.cart');
    Route::get('category/{category}', [CategoryController::class, 'show'])->name('category.show');

    Route::controller(CartController::class)->group(function () {
        Route::post('/cart/add/{product}', 'store')->name('Frontcart.store');
        Route::get('/cartItem/destroy/{id}', 'destroy')->name('cartItem.destroy');
        Route::post('/cartItems/Update/', 'update')->name('cartItems.update');
    });
});
Route::get('changeLocale/{lang}', [LangController::class, 'changeLang'])->name('changeLang');

Route::middleware('IsAuth')->group(function () {
    Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])
        ->name('logout');
});


Route::middleware('HasSessionId')->group(function () {
});
Route::get('viewCartItems/', [CartController::class, 'cartItemsView'])->name('viewCartItems');

Route::controller(OrderController::class)->group(function () {
    Route::get('/myorders', 'index')->name('myOrders');
    Route::get('/orders/show/{id}', 'show')->name('MyOrders.show');
    Route::post('/checkout', 'store')->name('checkout.store');
    // Route::view('/FindoMyOrder','Front.orders.findMyOrders')->name('findMyOrders');
    Route::post('/findMyOrders', 'findMyOrder')->name('findMyOrder');
    Route::get('/findMyOrders', 'showFindMyOrderPage')->name('findMyOrders');
    Route::delete('/order/cancel/{order}', 'destroy')->name('order.delete');
});


require __DIR__ . '/auth.php';

<?php

namespace App\Http\Controllers\Front;

use App\Models\Slider;
use App\Models\Product;
use App\Models\Category;
use App\Models\CartItems;
use GuzzleHttp\Psr7\Query;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index()
    {
        $products = Product::when(request()->has('category_id'), function ($q) {
            $q->where('category_id', request('category_id'));
        })->when(request()->has('size_id'), function ($q) {
            $q->whereHas('sizes', function ($q) {
                $q->where('category_size_id', request()->size_id);
            });
        })->get();
        $cats = Category::get();
        $cartItems = session('cart');
        // session()->flush();
        return view('Front/home/index', compact('products', 'cats'));
    }
}

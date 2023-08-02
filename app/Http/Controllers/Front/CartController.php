<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\CartItems;
use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{

    public function index()
    {
        return view('Front.layout.viewCart');
    }
    public function cartItemsView($id)
    {
        $cartItems =  CartItems::where('mac', 1)->get();
        return view('Front.layout.viewCart', compact('cartItems'));
    }
    public function store(int $product_id, Request $request)
    {
        $product = Product::findorfail($product_id);
        $totPrice = ($product->price) * ($request->quantity);
        CartItems::create([
            'mac' => 1,
            'product_id' => $product_id,
            'quantity' => $request->quantity,
            'totPrice' => $totPrice
        ]);
        return back();
    }
    public function destroy($id)
    {
        CartItems::findorfail($id)->delete();
        return back();
    }
}

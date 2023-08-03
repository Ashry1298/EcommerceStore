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

        return view('Front.layout.cart');
    }
    public function cartItemsView($id)
    {
        $cartItems =  CartItems::where('mac', 1)->get();
        return view('Front.layout.viewCart', compact('cartItems'));
    }
    public function store(int $product_id, Request $request)
    {
        $data = $request->except('_token');
        $data['mac'] = 1;
        $data['product_id'] = $product_id;
        $product = Product::findorfail($product_id);
        $data['totPrice'] = ($product->price) * ($request->quantity);
        CartItems::create($data);
        return back();
    }
    public function update($id, Request $request)
    {
        $ids =  array_keys($request->quantity);
        foreach ($ids as $id) {
            $quantity = request()->quantity[$id];
            $cartItem = CartItems::findorfail($id);
            $product = Product::findorfail($cartItem->product_id);
            $totPrice = ($product->price) * ($quantity);
            CartItems::findorfail($id)->update([
                'quantity' => $quantity,
                'totPrice' => $totPrice,
            ]);
        }
        return back();
    }
    public function destroy($id)
    {
        CartItems::findorfail($id)->delete();
        return back();
    }
}

<?php

namespace App\Http\Controllers\Front;

use App\Models\Product;
use App\Models\CartItems;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\CartItems\Store;
use App\Http\Requests\CartItems\Update;

class CartController extends Controller
{
  
    public function cartItemsView($id)
    {
        $cartItems =  CartItems::where('mac', 1)->get();
        return view('Front.layout.viewCart', compact('cartItems'));
    }
    public function store(Product $product, Store $request)
    {
        $data = $request->validated();
        $data['mac'] = 1;
        $data['product_id'] = $product->id;
        $data['product_price'] = $product->price;
        $data['totPrice'] = $this->getTotalPrice($request->quantity, $product->price);
        CartItems::create($data);
        return back();
    }
    public function update($id, Update $request)
    {
        $ids =  array_keys($request->quantity);
        foreach ($ids as $id) {
            $cartItem = CartItems::findorfail($id);
            $product = Product::findorfail($cartItem->product_id);
            CartItems::findorfail($id)->update([
                'quantity' => request()->quantity[$id],
                'totPrice' => $this->getTotalPrice(request()->quantity[$id], $product->price),
            ]);
        }
        return back();
    }
    public function destroy(CartItems $cartItem)
    {
        $cartItem->delete();
        return redirect()->back();
    }

    public function getTotalPrice(int $quantity, float $price)
    {
        $total = $quantity * $price;
        return $total;
    }
}

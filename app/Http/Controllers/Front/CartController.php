<?php

namespace App\Http\Controllers\Front;

use App\Models\Product;
use App\Models\CartItems;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Requests\CartItems\Store;
use App\Http\Requests\CartItems\Update;

class CartController extends Controller
{

    public function cartItemsView($id)
    {
        if (auth()->check()) {
            $cartItems =  CartItems::where('user_id', auth()->user()->id)->get();
        }
        $cartItems =  CartItems::where('mac', 1)->get();
        return view('Front.layout.viewCart', compact('cartItems'));
    }
    public function store(Product $product, Store $request)
    {
        $data = $request->validated();
        $data['product_id'] = $product->id;
        $data['product_price'] = $product->price;
        if (auth()->check()) {
            $data['mac'] = 1; //after became nullable will not cause a problem 
            $data['user_id'] = auth()->user()->id;
            $cartItems = $this->getCartItems('user_id', auth()->user()->id, $product);
            if ($cartItems->count()!= 0) {
                $this->updateItemQuantity($cartItems, $data, $request->quantity);
                return back();
            }
            $this->addToCartNonExistsItem($request->quantity, $product->price, $data);
            return back();
        } else {
            $data['mac'] = session()->getId();
            $cartItems = $this->getCartItems('mac', session()->getId(), $product);
            if ($cartItems->count()!= 0) {
                $this->updateItemQuantity($cartItems, $data, $request->quantity);
                return back();
            }
            $this->addToCartNonExistsItem($request->quantity, $product->price, $data);
            return back();
        }
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

    public function updateItemQuantity($cartItems, array $data, int $newQuantity)
    {
        foreach ($cartItems as $item) {
            if ($item->product_id == $data['product_id']) {
                $quantity = $item->quantity;
                $quantity += $newQuantity;
                $item->update([
                    'quantity' => $quantity,
                    'totPrice' => $this->getTotalPrice($quantity, $data['product_price'])
                ]);
            }
        }
    }

    public function getCartItems(string $check, $id, $product)
    {
        $cartItems = CartItems::where($check, $id)->where('product_id', $product->id)->get();
        return $cartItems;
    }

    public function addToCartNonExistsItem(int $quantity, float $price, array $data)
    {
        $data['totPrice'] = $this->getTotalPrice($quantity, $price);
        $cartItem =  CartItems::create($data);
    }
}

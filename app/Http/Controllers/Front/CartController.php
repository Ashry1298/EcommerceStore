<?php

namespace App\Http\Controllers\Front;

use App\Models\Product;
use App\Models\CartItems;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Requests\CartItems\Store;
use App\Http\Requests\CartItems\Update;
use Illuminate\Support\Facades\Session;
use PhpParser\Node\Stmt\Return_;

class CartController extends Controller
{

    public function cartItemsView($id)
    {
        if (auth()->check()) {
            $cartItems =  CartItems::where('user_id', auth()->user()->id)->get();
        }
        $cartItems = CartItems::where('mac', 1)->get();
        return view('Front.layout.viewCart', compact('cartItems'));
    }
    public function store(Product $product, Store $request)
    {
        $data = $request->validated();
        $data['product_id'] = $product->id;
        $data['product_price'] = $product->price;
        $data['price'] = ($product->price * $data['quantity']);
        if (!session()->has('UniqueId') || session('cart') == null) {
            session()->push('cart', $data);
            session()->put('UniqueId', session()->getId());
            return back();
        } else {
            $carts = session('cart');
            $key = null;
            $firstKey = array_key_first($carts);
            for ($i = $firstKey; $i <= count($carts); $i++) {
                if ($carts[$i]['product_id'] == $data['product_id']) {
                    $key = $i;
                }
            }
            if ($key == null) {
                session()->push('cart', $data);
                return back();
            } else {
                if ($carts[$key]['product_color_id'] == $data['product_color_id'] && !array_key_exists('category_size_id', $carts[$key])) {
                    $this->updateQuantity($key, $carts, $data);
                    return back();
                } elseif ($carts[$key]['product_color_id'] == $data['product_color_id'] && $carts[$key]['category_size_id'] == $data['category_size_id']) {
                    $this->updateQuantity($key, $carts, $data);
                    return back();
                } elseif ($carts[$key]['product_color_id'] != $data['product_color_id'] || $carts[$key]['category_size_id'] != $data['category_size_id']) {
                    session()->push('cart', $data);
                    return back();
                }
                session(['cart' => $carts]);
                return back();
            }
        }
        
    }

    public function update(Request $request)
    {
        $quantities = ($request->input('quantity'));
        $cart = session('cart');
        foreach ($cart as &$item) {
            foreach ($quantities as $key => $value) {
                if ($item['product_id'] == $key) {
                    $item['quantity'] = $value;
                    $item['price'] = ($item['quantity'] * $item['product_price']);
                }
            }
        }
        session(['cart' => $cart]);
        return back();
    }
    public function destroy($id)
    {
        $cart = session('cart');
        unset($cart[$id]);
        session(['cart' => $cart]);
        return redirect()->back();
    }

    public function updateQuantity($key, $carts, $data)
    {
        $carts[$key]['quantity'] += $data['quantity'];
        $carts[$key]['price'] = $this->getTotalPrice($carts[$key]['quantity'], $carts[$key]['product_price']);
        session(['cart' => $carts]);
        return session('cart');
    }

    public function getTotalPrice(int $quantity, float $price)
    {
        return $quantity * $price;
    }
}

<?php

namespace App\Http\Controllers\Front;

use App\Cart\Cart;
use App\Cart\CartItem;
use App\Models\Product;
use App\Models\CartItems;
use Termwind\Components\Dd;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\Return_;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Requests\CartItems\Store;
use App\Http\Requests\CartItems\Update;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{

    public function cartItemsView()
    {
        $cartItems =  CartItems::where('identifier', session('identifier'))->first();
        if ($cartItems != null) {
            $Items = session('cart');
            return view('Front.layout.viewCart', compact('cartItems'));
        }
        return back();
    }
    public function store(Product $product, Store $request)
    {
        $data = $this->mergeDate($request->validated(), $product);
        $cartItems = CartItems::where('sessionId', session()->getId())->first();
        if ($cartItems === null) {
            session()->push('cart', $data);
            $identifier = uniqid('Sess-');
            $request->session()->put('identifier', $identifier);
            CartItems::create([
                'sessionId' => session()->getId(),
                'identifier' => $identifier
            ]);
            return back();
        } else {
            $carts = session('cart');
            $Product_id = $data['product_id'];
            $itemIDs = collect($carts)->pluck('product_id')->all();
            $key = null;
            foreach ($itemIDs as $index => $value) {
                if ($value == $Product_id) {
                    $key = $index;
                }
            }
            $this->casesCheckForCart($carts, $key, $data);
            return back();
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
        return redirect()->route('Front');
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


    public function mergeDate(array $data, Product $product)
    {
        $data['product_id'] = $product->id;
        $data['product_price'] = $product->price;
        $data['price'] = ($product->price * $data['quantity']);
        return $data;
    }


    public function casesCheckForCart($carts, $key, $data)
    {
        if ($key === null) {
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

<?php

namespace App\Http\Controllers\Front;

use App\Models\User;
use App\Models\Order;
use App\Models\Product;
use App\Models\CartItems;
use App\Models\OrderItems;
use Termwind\Components\Dd;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Front\Order\Store;
use Illuminate\Contracts\Session\Session;

class OrderController extends Controller
{

    public function index()
    {
        if (auth()->check()) {
            $orders = User::findorfail(auth()->user()->id)->orders()->paginate();
            return view('Front/orders/index', compact('orders'));
        }
        return back();
    }
    public function store(Store $request)
    {
        auth()->check() == true ?  $data['user_id'] = auth()->user()->id : null;
        $data = ($this->getFullAddress($request->validated(), 5));
        $order = Order::create($data);
        $order_id = $order->id;
        foreach (session('cart') as $item) {
            $product_name = Product::where('id', $item['product_id'])->pluck('name_en')->first();
            $orderItems =  OrderItems::create(
                [
                    'order_id' => $order->id,
                    'product_id' => $item['product_id'],
                    'product_name' => $product_name,
                    'product_price' => $item['product_price'],
                    'quantity' => $item['quantity'],
                    'sub_total' => $order->sub_total,
                    'chosen_color' => $item['product_color_id'] ?? null,
                    'chosen_size ' => $item['category_size_id'] ?? null,
                ]
            );
        }
        session()->forget('cart');
        return redirect()->route('front');
    }

    public function show($id)
    {
        $orderItems = Order::findorfail($id)->orderItems()->paginate();
        return  view('Front.orders.show', compact('orderItems', 'id'));
    }

    protected function getFullAddress(array $data, int $length)
    {
        $full_address = array_splice($data, 5);
        $data['full_address'] = implode(',', $full_address);
        return $data;
    }
}

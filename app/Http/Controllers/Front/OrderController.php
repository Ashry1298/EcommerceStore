<?php

namespace App\Http\Controllers\Front;

use App\Models\User;
use App\Models\Order;
use App\Models\Product;
use App\Models\CartItems;
use App\Models\OrderItems;
use Illuminate\Support\Str;
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
        $data = ($this->getFullAddress($request->validated(), 5));
        if (auth()->check() == true) {
            $data['user_id'] = auth()->user()->id;
        } else {
            $data['order_code'] = 'code-' . Str::random('8');
        }
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
        $order = Order::findorfail($id)->with('orderItems')->paginate();
        return  view('Front.orders.show', compact('orderItems', 'id'));
    }
    public function showFindMyOrderPage()
    {
        return view('Front.orders.findMyOrders');
    }


    public function findMyOrder(Request $request)
    {
        $request->validate(['order_code' => 'required|string|max:13']);
        $order = Order::where('order_code', $request->order_code)->with('orderItems')->first();
        if ($order != null) {
            return view('Front.orders.show', compact('order'));
        }
        return redirect()->back()->with('orderErrorMessage', "Sorry We couldn't find your order");
    }


    protected function getFullAddress(array $data, int $length)
    {
        $full_address = array_splice($data, 5);
        $data['full_address'] = implode(',', $full_address);
        return $data;
    }

    public function destroy(Order $order)
    {
        $order->delete();
        return redirect()->back()->with('deleteMessage', 'Ordered Canceled Successfully');
    }
}

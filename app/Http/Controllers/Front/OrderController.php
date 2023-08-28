<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Http\Requests\Front\Order\Store;
use App\Models\CartItems;
use App\Models\Order;
use App\Models\OrderItems;
use App\Models\Product;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Termwind\Components\Dd;

class OrderController extends Controller
{
    public function store(Store $request)
    {
        $data = ($this->getFullAddress($request->validated(), 5));
        $data['user_id'] = auth()->user()->id;
        $order = Order::create($data);
        foreach (session('cart') as $item) {
            $item['order_id'] = $order->id;
            $item['sub_total'] = $order->sub_total;
            $product_name = Product::where('id', $item['product_id'])->pluck('name_en')->first();
            $item['product_name'] = $product_name;
            $orderItems =  OrderItems::create($item);
        }
        dd('stoip_order');
    }

    protected function getFullAddress(array $data, int $length)
    {
        $full_address = array_splice($data, 5);
        $data['full_address'] = implode(',', $full_address);
        return $data;
    }
}

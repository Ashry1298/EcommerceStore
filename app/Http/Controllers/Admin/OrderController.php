<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderItems;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::orderBy('id', 'DESC')->get();
        return view('admin/orders/index', compact('orders'));
    }

    public function show(Order $order)
    {
        $orderItems = OrderItems::where('order_id', $order->id)->get();
        return view('admin.orders.show', compact('order', 'orderItems'));
    }

    public function statusUpdate(Order $order, Request $request)
    {
        $order->update([
            'status' => $request->status,
        ]);
        return redirect()->back()->with('success', 'Status Updated Successfully');
    }
}

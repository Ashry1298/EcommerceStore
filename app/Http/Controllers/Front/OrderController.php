<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Http\Requests\Front\Order\Store;
use App\Models\CartItems;
use App\Models\Order;
use App\Models\OrderItems;
use App\Models\Product;
use Illuminate\Http\Request;
use Termwind\Components\Dd;

class OrderController extends Controller
{
    public function store(Store $request)
    {
        
        $data = ($this->getFullAddress($request->validated(), 5));
        dd('good');
        // $data['user_id'] = auth()->user()->id;
        // $data['full_name']=auth()->user()->name;
        // $order = Order::create($data);
        // foreach (CartItems::where('mac', 1)->get() as $item) {
        //     $item->product_name = implode('_', Product::where('id', $item->product_id)->select('name_en', 'name_ar')->first()->toarray());
        //     $Newdata = $item->toarray();
        //     $Newdata['order_id'] = $order->id;
        //     $Newdata['product_price'] = $item->product_price;
        //     $Newdata['sub_total'] = $item->totPrice;
        //     OrderItems::create($Newdata);
        //     $item->delete();
        // }
        // return redirect()->back();
    }

    protected function getFullAddress(array $data, int $length)
    {
        $full_address = array_splice($data, 5);
        $data['full_address'] = implode(',', $full_address);
        return $data;
    }
}

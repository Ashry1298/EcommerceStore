<?php

namespace App\Http\Controllers\Admin;

use App\Models\ProductColor;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProductColors\Update;

class ProductColorController extends Controller
{

   
    public function update(Update $request,ProductColor $productColor)
    {
        $productColor->update($request->validated()+[
            'product_id'=>$productColor->product_id
        ]);
        return redirect()->back();
    }
     public function delete(ProductColor $productColor)
    {
        $productColor->delete();
        return redirect()->back();
    }
}

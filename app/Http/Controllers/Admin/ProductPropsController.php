<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Product\Update as ProductUpdate;
use App\Http\Requests\ProductProps\Update;
use App\Models\ProductProps;
use Illuminate\Http\Request;


class ProductPropsController extends Controller
{
    public function delete($id)
    {
        ProductProps::findorfail($id)->delete();
        return redirect()->back();
    }
    public function update(Update $request, ProductProps $productProps)
    {
        $productProps->update($request->validated());
        return redirect()->back();
    }
}

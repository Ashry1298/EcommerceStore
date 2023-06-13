<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $products=Product::get();
        $cats=Category::get();
        return view('Ui/Home/index',compact('products','cats'));
    }
}

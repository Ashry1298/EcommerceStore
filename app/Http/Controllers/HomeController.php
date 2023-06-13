<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Slider;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $products=Product::get();
        $cats=Category::get();
        $sliders=Slider::get();
        return view('Ui/Home/index',compact('products','cats','sliders'));
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Slider;
use GuzzleHttp\Psr7\Query;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        if (request()->category_id == null) {
            $products=Product::get();
        } else {
            $products = Product::when(request()->has('category_id'), function ($q) {
                $q->where('category_id', request('category_id'));
            })->get()->filter(function ($item) {
                if (request()->size_id) {
                    return $item->sizes->contains(request('size_id'));
                }
            });
        }

        $cats = Category::get();
        $sliders = Slider::get();

        // $products = $products->get();
        return view('Ui/Home/index', compact('products', 'cats', 'sliders'));
    }
}

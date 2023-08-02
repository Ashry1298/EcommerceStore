<?php

namespace App\Http\Controllers\Front;

use App\Models\Slider;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    public function show(Category $category)
    {
        return view ('Front.category.index',compact('category'));
    }
}

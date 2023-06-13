<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\CategorySize;

use function Symfony\Component\String\b;

class CategorySizeController extends Controller
{
    public function show(Category $category)
    {
        return view('admin.categories.sizes', compact('category'));
    }

    public function store(string $id, Request $request)
    {
        $request->validate(['sizeName' => 'required|string']);

        CategorySize::create(
            [
                'sizeName' => $request->sizeName,
                'category_id' => $id,
            ]
        );
        return back();
    }

    public function destroy(CategorySize $size)
    {
        $size->delete();
        return back();
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Models\Tag;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Product\Store;
use App\Http\Requests\Product\Update;
use App\Models\ProductProps;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::get();
        return view('admin/products/index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $tags = Tag::get();
        $categories = Category::get();
        return view('admin.products.create', compact('categories', 'tags'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Store $request)
    {
        $data = $request->validated();
        if ($request->hasFile('main_image')) {
            $logo = uniqid('img-') . '.' . $request->main_image->getClientOriginalExtension();
            $request->file('main_image')->storeAs(
                'products',
                $logo,
                'uploads'
            );
            $data['main_image'] = $logo;
        }
        $product = Product::create($data);
        $product->tags()->sync($request->tags);
        return redirect()->route('products.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        return view(
            'admin.products.edit',
            [
                'product' => $product,
                'selectedTags' => $product->tags()->get()->pluck('id')->toArray(),
                'categories' =>  Category::get(),
                'tags' => Tag::get(),
            ]
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Update $request, Product $product)
    {
        $data = $request->validated();
        if ($request->hasFile('main_image')) {
            Storage::disk('uploads')->delete('products/' . $product->main_image);
            $logo = uniqid('img-') . '.' . $request->main_image->getClientOriginalExtension();
            $request->file('main_image')->storeAs(
                'products',
                $logo,
                'uploads'
            );
            $data['main_image'] = $logo;
        }
        $product->update($data);
        if ($request->has(['key_en', 'key_ar', 'value_en', 'value_ar']) and $request->get('key_en') and $request->get('key_ar') and $request->get('value_en') and $request->get('value_ar')) { {
                ProductProps::create([
                    'key_en' => $data['key_en'],
                    'key_ar' => $data['key_ar'],
                    'value_en' => $data['value_en'],
                    'value_ar' => $data['value_ar'],
                    'product_id' =>$product->id,
                ]);
            }
        }
        return redirect()->route('products.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

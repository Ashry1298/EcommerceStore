<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\Category\Store;
use App\Http\Requests\Category\Update;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */  public function index()
    {
        $categories = Category::get();
        return view('admin.categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Store $request)
    {
        $data = $request->validated();
        if ($request->hasFile('logo')) {
            $logo = uniqid('logo-') . '.' . $request->logo->getClientOriginalExtension();
            $request->file('logo')->storeAs(
                'cats',
                $logo,
                'uploads'
            );
            $data['logo'] = $logo;
        }
        Category::create($data);
        return redirect()->route('categories.index');
    }

    /**
     * Display the specified resource.
     */

    public function show(string $id)
    {
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        return view('admin.categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Update $request, Category $category)
    {
        $data = $request->validated();
        if ($request->hasFile('logo')) {
            Storage::disk('uploads')->delete('cats/' . $category->logo);
            $logo = uniqid('logo-') . '.' . $request->logo->getClientOriginalExtension();
            $request->file('logo')->storeAs(
                'cats',
                $logo,
                'uploads'
            );
            $data['logo'] = $logo;
        }
        $category->update($data);
        return redirect()->route('categories.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->route('categories.index');
    }
}

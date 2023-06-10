@extends('admin.layouts.app')
@section('title')
    Edit Product
@endsection
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card card-primary">
                <div class="col-sm-12">
                    <h2>Product</h2>
                    <a class="btn btn-primary" href="{{ route('products.index') }}" role="button">All Products </a>
                </div>
                <br>
                <div class="card-header">
                    <h3 class="card-title">Edit Product </h3>
                </div>
                <form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')
                    <div class="card-body">
                        <div class="row">
                            <div class="form-group col-6">
                                <label for="exampleInputName">name_en </label>
                                <input type="text" class="form-control @error('name_en') is-invalid @enderror"
                                    id="exampleInputName" placeholder="Enter Product Name" name="name_en" autocomplete="off"
                                    value="{{ $product->name_en ? $product->name_en : old('name_en') }}">
                                @error('name_en')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group col-6">
                                <label for="exampleInputName">name_ar </label>
                                <input type="text" class="form-control @error('name_ar') is-invalid @enderror"
                                    id="exampleInputName" placeholder="ادخل اسم المنتج باللغه العربيه" name="name_ar"
                                    autocomplete="off" value="{{ $product->name_ar ? $product->name_ar : old('name_ar') }}">
                                @error('name_ar')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Category</label>
                            <select class="form-control @error('category_id') is-invalid @enderror"
                                id="exampleFormControlSelect1" name="category_id">
                                <option value="{{ $product->category->id }}" selected>
                                    {{ $product->category->title_en }}-{{ $product->category->title_ar }}</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->title_en }} -
                                        {{ $category->title_ar }} </option>
                                @endforeach
                            </select>
                            @error('category_id')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Tags</label>
                            <select class="form-control @error('tags') is-invalid @enderror" multiple
                                id="exampleFormControlSelect1" name="tags[]">
                                @foreach ($tags as $tag)
                                    <option value="{{ $tag->id }}"
                                        {{ in_array($tag->id, $selectedTags) ? 'selected' : '' }}>{{ $tag->title_en }}
                                        {{ $tag->title_ar }} </option>
                                @endforeach
                            </select>
                            @error('tags')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="exampleFormControlTextarea1"> Desc_en</label>
                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="desc_en"
                                placeholder="Enter Description"> {{ $product->desc_en }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">Desc_ar</label>
                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="desc_ar"
                                placeholder="ادخل وصف المنتج"> {{ $product->desc_ar }} </textarea>
                        </div>
                        <div class="row">
                            <div class="form-group col-6">
                                <label for="exampleInputName">Price </label>
                                <input type="text" class="form-control @error('price') is-invalid @enderror"
                                    id="exampleInputName" placeholder="Enter price" name="price" autocomplete="off"
                                    value="{{ $product->price ? $product->price : old('price') }}">
                                @error('price')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group col-6">
                                <label for="exampleInputName">Quantity </label>
                                <input type="text" class="form-control @error('quantity') is-invalid @enderror"
                                    id="exampleInputName" placeholder="Enter quantity" name="quantity" autocomplete="off"
                                    value="{{ $product->quantity ? $product->quantity : old('quantity') }}">
                                @error('quantity')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-lg-12">
                                <div class="btn-group w-100">
                                    <span class="btn btn-success col fileinput-button dz-clickable">
                                        <i class="fas fa-plus"></i>
                                        <span>The Main Image</span>
                                        <input type="file" class="form-control-file" name="main_image">
                                    </span>
                                </div>
                            </div>
                        </div>
                        <img src="{{ asset('uploads/products/' . $product->main_image) }}" alt="Product Image"
                            width="200" height="100">
                    </div>
                    <div class="row">
                        <div class="form-group col-6">
                            <label for="exampleInputName">New Property </label>
                            <input type="text" class="form-control @error('key_en') is-invalid @enderror"
                                id="exampleInputName" placeholder="Enter Property Name" name="key_en"
                                autocomplete="off" value="{{ $product->key_en ? $product->key_en : old('key_en') }}">
                            @error('key_en')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group col-6">
                            <label for="exampleInputName">Property Value </label>
                            <input type="text" class="form-control @error('value_en') is-invalid @enderror"
                                id="exampleInputName" placeholder="Enter Property Value " name="value_en"
                                autocomplete="off"
                                value="{{ $product->value_en ? $product->value_en : old('value_en') }}">
                            @error('value_en')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-6">
                            <label for="exampleInputName">خاصيه جديده </label>
                            <input type="text" class="form-control @error('key_ar') is-invalid @enderror"
                                id="exampleInputName" placeholder=" ادخل اسم الخاصيه" name="key_ar" autocomplete="off"
                                value="{{ $product->key_ar ? $product->key_ar : old('key_ar') }}">
                            @error('key_ar')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group col-6">
                            <label for="exampleInputName">قيمه الخاصيه الجديده </label>
                            <input type="text" class="form-control @error('value_ar') is-invalid @enderror"
                                id="exampleInputName" placeholder="ادخل قيمه الخاصيه " name="value_ar"
                                autocomplete="off"
                                value="{{ $product->value_ar ? $product->value_ar : old('value_ar') }}">
                            @error('value_ar')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
            </form>
        </div>

    </div>
    </div>
@endsection

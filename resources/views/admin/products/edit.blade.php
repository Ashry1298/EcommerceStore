@extends('admin.layouts.app')
@section('title')
    Edit Product
@endsection
@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="card card-primary">
                <div class="col-sm-12">
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
                                    placeholder="Enter Product Name" name="name_en"
                                    value="{{ $product->name_en ? $product->name_en : old('name_en') }}">
                                @error('name_en')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group col-6">
                                <label for="exampleInputName">name_ar </label>
                                <input type="text" class="form-control @error('name_ar') is-invalid @enderror"
                                    placeholder="ادخل اسم المنتج باللغه العربيه" name="name_ar" autocomplete="off"
                                    value="{{ $product->name_ar ? $product->name_ar : old('name_ar') }}">
                                @error('name_ar')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-4">
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
                            <div class="form-group col-4">
                                <label for="exampleFormControlSelect1">Sizes</label>
                                <select multiple class="form-control @error('category_id') is-invalid @enderror"
                                    id="exampleFormControlSelect1" name="sizes[]">
                                    @foreach ($categorySizes as $size)
                                        <option value="{{ $size->id }}"
                                            {{ $product->sizes->contains($size) ? 'selected' : '' }}>
                                            {{ $size->sizeName }} </option>
                                        {{-- option value="{{ $size->id }}"
                                        {{ in_array($size->id, $selectedSizes) ? 'selected' : '' }}>{{ $size->sizeName }} --}}
                                        {{-- </option> --}}
                                    @endforeach
                                </select>
                                @error('category_id')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group col-4">
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
                        </div>
                        <div class="row">
                            <div class="form-group col-6">
                                <label for="exampleFormControlTextarea1"> Desc_en</label>
                                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="desc_en"
                                    placeholder="Enter Description"> {{ $product->desc_en }}</textarea>
                            </div>
                            <div class="form-group col-6">
                                <label for="exampleFormControlTextarea1">Desc_ar</label>
                                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="desc_ar"
                                    placeholder="ادخل وصف المنتج"> {{ $product->desc_ar }} </textarea>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-6">
                                <label for="exampleInputName">Price </label>
                                <input type="text" class="form-control @error('price') is-invalid @enderror"
                                    placeholder="Enter price" name="price" autocomplete="off"
                                    value="{{ $product->price ? $product->price : old('price') }}">
                                @error('price')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group col-6">
                                <label for="exampleInputName">Quantity </label>
                                <input type="text" class="form-control @error('quantity') is-invalid @enderror"
                                    placeholder="Enter quantity" name="quantity" autocomplete="off"
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
                        <h3>((Main Image))</h3>
                        <img src="{{ asset('uploads/products/' . $product->main_image) }}" alt="Product Image"
                            width="200" height="100">
                    </div>
                    <div class="row">
                        <div class="form-group col-2">
                            <label for="exampleInputName">New Property </label>
                            <input type="text" class="form-control @error('key_en') is-invalid @enderror"
                                placeholder="Enter Property Name" name="key_en" autocomplete="off"
                                value="{{ $product->key_en ? $product->key_en : old('key_en') }}">
                            @error('key_en')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group col-2">
                            <label for="exampleInputName">Property Value </label>
                            <input type="text" class="form-control @error('value_en') is-invalid @enderror"
                                placeholder="Enter Property Value " name="value_en" autocomplete="off"
                                value="{{ $product->value_en ? $product->value_en : old('value_en') }}">
                            @error('value_en')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group col-2">
                            <label for="exampleInputName">خاصيه جديده </label>
                            <input type="text" class="form-control @error('key_ar') is-invalid @enderror"
                                placeholder=" ادخل اسم الخاصيه" name="key_ar" autocomplete="off"
                                value="{{ $product->key_ar ? $product->key_ar : old('key_ar') }}">
                            @error('key_ar')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group col-2">
                            <label for="exampleInputName">قيمه الخاصيه الجديده </label>
                            <input type="text" class="form-control @error('value_ar') is-invalid @enderror"
                                placeholder="ادخل قيمه الخاصيه " name="value_ar" autocomplete="off"
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
            @if (count($productProps) != 0)
                <div class="col-12">
                    <h3>Product Props-خصائص المنتج</h3>
                </div>
                @foreach ($productProps as $item)
                    <form action="{{ route('productProps.update', $item->id) }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="form-group col-2">
                                <label for="exampleInputName"> Property Key </label>
                                <input type="text" class="form-control @error('key_en') is-invalid @enderror"
                                    placeholder="Enter Property Name" name="key_en" autocomplete="off"
                                    value="{{ $item->key_en }}">
                                @error('key_en')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group col-2">
                                <label for="exampleInputName">Property Value </label>
                                <input type="text" class="form-control @error('value_en') is-invalid @enderror"
                                    placeholder="Enter Property Value " name="value_en" autocomplete="off"
                                    value="{{ $item->value_en }}">
                                @error('value_en')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group col-2">
                                <label for="exampleInputName">خاصيه </label>
                                <input type="text" class="form-control @error('key_ar') is-invalid @enderror"
                                    placeholder=" ادخل اسم الخاصيه" name="key_ar" autocomplete="off"
                                    value="{{ $item->key_ar }}">
                                @error('key_ar')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group col-2">
                                <label for="exampleInputName">قيمه الخاصيه </label>
                                <input type="text" class="form-control @error('value_ar') is-invalid @enderror"
                                    placeholder="ادخل قيمه الخاصيه " name="value_ar" autocomplete="off"
                                    value="{{ $item->value_ar }}">
                                @error('value_ar')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group col-2">
                                <button type="submit" class="btn btn-outline-info">Update</button>
                            </div>

                    </form>
                    <div class="col-2">
                        <form action="{{ route('productProps.delete', $item->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-outline-danger">Delete</button>
                        </form>
                    </div>
                @endforeach
            @else
                No Properties for this product- لا يوجد خصائص لهذا المنتج
            @endif
            <div class="row">
                <div class="col-12">
                    <h3>Other Product Images-صور اخرى للمنتج </h3>
                </div>
                @if (!empty($product->images))
                    <div class="col-6">
                        @foreach ($product->images as $image)
                            <img src="{{ asset('uploads/products/' . $product->id . '/' . $image->path) }}"
                                alt="image" width="100" height="100">
                            <form action="{{ route('productImage.destroy', $image->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-outline-danger">Delete</button>
                            </form>
                    </div>
                @endforeach
            @else
                <h4>لا يوجد صور</h4>
                @endif
                <form action="{{ route('productImage.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="exampleFormControlFile1"> اضافه صوره </label>
                        <input type="file" class="form-control-file @error('subImg') is-invalid @enderror"
                            id="exampleFormControlFile1" name="subImg">
                        @error('subImg')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <input type="text" class="form-control-file" id="exampleFormControlFile1" name="productId"
                        value="{{ $product->id }}" hidden>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>


            </div>
        </div>
    </div>
    </div>

    </div>

    </div>
    </div>
@endsection

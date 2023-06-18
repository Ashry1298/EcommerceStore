@extends('admin.layouts.app')
@section('title')
    Add New Product
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card card-primary">
                <div class="col-sm-12">
                    <h2>Products</h2>
                    <a class="btn btn-primary" href="{{ route('products.index') }}" role="button">All Products </a>
                </div>
                <br>
                <div class="card-header">
                    <h3 class="card-title">Add New Product </h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="row">
                            <div class="form-group col-6">
                                <label for="exampleInputName">name_en </label>
                                <input type="text" class="form-control @error('name_en') is-invalid @enderror"
                                    id="exampleInputName" placeholder="Enter Product Name" name="name_en" autocomplete="off"
                                    value="{{ old('name_en') }}">
                                @error('name_en')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group col-6">
                                <label for="exampleInputName">name_ar </label>
                                <input type="text" class="form-control @error('name_ar') is-invalid @enderror"
                                    id="exampleInputName" placeholder="ادخل اسم المنتج باللغه العربيه" name="name_ar"
                                    autocomplete="off" value="{{ old('name_ar') }}">
                                @error('name_ar')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Category</label>
                            <select class="form-control @error('category_id') is-invalid @enderror" id="exampleFormControlSelect1" name="category_id">
                                <option selected>Choose Category</option>
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
                            <select class="form-control @error('tags') is-invalid @enderror" multiple id="exampleFormControlSelect1" name="tags[]">
                                <option selected>Choose Tag</option>
                                @foreach ($tags as $tag)
                                    <option value="{{ $tag->id }}">{{ $tag->title_en }} -
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
                                placeholder="Enter Description"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">Desc_ar</label>
                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="desc_ar"
                                placeholder="ادخل وصف المنتج">  </textarea>
                        </div>
                        <div class="row">
                            <div class="form-group col-6">
                                <label for="exampleInputName">Price </label>
                                <input type="text" class="form-control @error('price') is-invalid @enderror"
                                    id="exampleInputName" placeholder="Enter price" name="price" autocomplete="off"
                                    value="{{ old('price') }}">
                                @error('price')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- <div class="form-group col-6">
                                <label for="exampleInputName">Quantity </label>
                                <input type="text" class="form-control @error('quantity') is-invalid @enderror"
                                    id="exampleInputName" placeholder="Enter quantity" name="quantity" autocomplete="off"
                                    value="{{ old('quantity') }}">
                                @error('quantity')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div> --}}
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
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
@endsection

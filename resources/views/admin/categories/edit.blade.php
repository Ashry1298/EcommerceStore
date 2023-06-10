@extends('admin.layouts.app')
@section('title')
    Edit Category
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card card-primary">
                <div class="col-sm-12">
                    <h2>Category</h2>
                    <a class="btn btn-primary" href="{{ route('categories.index') }}" role="button">All Categories </a>
                </div>
                <br>
                <div class="card-header">
                    <h3 class="card-title">Edit Category </h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form action="{{ route('categories.update', $category->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')
                    <div class="card-body">
                        <div class="form-group">
                            <label for="exampleInputName">Title_en </label>
                            <input type="text" class="form-control @error('title_en') is-invalid @enderror"
                                id="exampleInputName" placeholder="Enter title_en" name="title_en" autocomplete="off"
                                value="{{ $category->title_en ? $category->title_en : old('title_en') }}">
                            @error('title_en')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputName">Title_ar </label>
                            <input type="text" class="form-control @error('title_ar') is-invalid @enderror"
                                id="exampleInputName" placeholder="Enter title_ar" name="title_ar" autocomplete="off"
                                value="{{ $category->title_ar ? $category->title_ar : old('ar') }}">
                            @error('title_ar')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <div class="col-lg-12">
                                <div class="btn-group w-100">
                                    <span class="btn btn-success col fileinput-button dz-clickable">
                                        <i class="fas fa-plus"></i>
                                        <span>Add files</span>
                                        <input type="file" class="form-control-file  @error('logo') is-invalid @enderror" name="logo">
                                    </span>
                                    @error('logo')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <img src="{{asset('uploads/cats/'. $category->logo)}}" width="100" >
                    </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
            </form>
        </div>

    </div>
    </div>
@endsection

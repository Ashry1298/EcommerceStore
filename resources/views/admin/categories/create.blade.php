@extends('admin.layouts.app')
@section('title')
    Add New Category
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card card-primary">
                <div class="col-sm-12">
                    <h2>Categories</h2>
                    <a class="btn btn-primary" href="{{ route('categories.index') }}" role="button">All Categories </a>
                </div>
                <br>
                <div class="card-header">
                    <h3 class="card-title">Add New Category </h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form action="{{ route('categories.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="exampleInputName">Title_en </label>
                            <input type="text" class="form-control @error('title_en') is-invalid @enderror"
                                id="exampleInputName" placeholder="Enter title_en" name="title_en" autocomplete="off"
                                value="{{ old('title_en') }}">
                            @error('title_en')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputName">Title_ar </label>
                            <input type="text" class="form-control @error('title_ar') is-invalid @enderror"
                                id="exampleInputName" placeholder="Enter title_ar" name="title_ar" autocomplete="off"
                                value="{{ old('title_ar') }}">
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
                                        <input type="file" class="form-control-file" name="logo">
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

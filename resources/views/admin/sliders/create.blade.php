@extends('admin.layouts.app')
@section('title')
    Add New Slider
@endsection


image     
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card card-primary">
                <div class="col-sm-12">
                    <h2>Sliders</h2>
                    <a class="btn btn-primary" href="{{ route('sliders.index') }}" role="button">All Sliders </a>
                </div>
                <br>
                <div class="card-header">
                    <h3 class="card-title">Add New Slider </h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form action="{{ route('sliders.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="exampleInputName"> Small Title_ar </label>
                            <input type="text" class="form-control @error('title_en') is-invalid @enderror"
                                id="exampleInputName" placeholder="Enter title_ar" name="small_title_ar" autocomplete="off"
                                value="{{ old('title_en') }}">
                            @error('title_en')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputName"> Small Title_en </label>
                            <input type="text" class="form-control @error('title_en') is-invalid @enderror"
                                id="exampleInputName" placeholder="Enter title_en" name="small_title_en" autocomplete="off"
                                value="{{ old('title_en') }}">
                            @error('title_en')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputName">Big Title_ar </label>
                            <input type="text" class="form-control @error('title_ar') is-invalid @enderror"
                                id="exampleInputName" placeholder="Enter title_ar" name="big_title_ar" autocomplete="off"
                                value="{{ old('title_ar') }}">
                            @error('title_ar')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputName">Big Title_en </label>
                            <input type="text" class="form-control @error('title_ar') is-invalid @enderror"
                                id="exampleInputName" placeholder="Enter title_en" name="big_title_en" autocomplete="off"
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
                                        <input type="file" class="form-control-file" name="image">
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

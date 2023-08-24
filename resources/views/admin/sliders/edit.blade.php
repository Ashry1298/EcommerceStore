@extends('admin.layouts.app')
@section('title')
    Edit Slider
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card card-primary">
                <div class="col-sm-12">
                    <h2>Slider</h2>
                    <a class="btn btn-primary" href="{{ route('sliders.index') }}" role="button">All Sliders </a>
                </div>
                <br>
                <div class="card-header">
                    <h3 class="card-title">Edit Slider </h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form action="{{route('sliders.update',$slider->id)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')
                    <div class="card-body">
                        <div class="form-group">
                            <label for="exampleInputName"> Small Title_ar </label>
                            <input type="text" class="form-control @error('small_title_ar') is-invalid @enderror"
                                id="exampleInputName" placeholder="Enter title_ar" name="small_title_ar" autocomplete="off"
                                value="{{$slider->small_title_ar ? $slider->small_title_ar : old('small_title_ar') }}">
                            @error('small_title_ar')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputName"> Small Title_en </label>
                            <input type="text" class="form-control @error('small_title_en') is-invalid @enderror"
                                id="exampleInputName" placeholder="Enter title_en" name="small_title_en" autocomplete="off"
                                value="{{$slider->small_title_en ? $slider->small_title_en : old('small_title_en') }}">
                            @error('small_title_en')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputName">Big Title_ar </label>
                            <input type="text" class="form-control @error('big_title_ar') is-invalid @enderror"
                                id="exampleInputName" placeholder="Enter big_title_ar" name="big_title_ar" autocomplete="off"
                                value="{{$slider->big_title_ar ? $slider->big_title_ar : old('big_title_ar') }}">
                            @error('big_title_ar')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputName">Big Title_en </label>
                            <input type="text" class="form-control @error('Big Title_en') is-invalid @enderror"
                                id="exampleInputName" placeholder="Enter title_en" name="big_title_en" autocomplete="off"
                                value="{{$slider->big_title_en ? $slider->big_title_en : old('big_title_en') }}">
                            @error('Big Title_en')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <div class="col-lg-12">
                                <div class="btn-group w-100">
                                    <span class="btn btn-success col fileinput-button dz-clickable">
                                        <i class="fas fa-plus"></i>
                                        <span>Add files</span>
                                        <input type="file" class="form-control-file  @error('image') is-invalid @enderror" name="image">
                                    </span>
                                    @error('image')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <img src="{{asset('uploads/sliders/'.$slider->image)}}" width="100" height="200" >
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

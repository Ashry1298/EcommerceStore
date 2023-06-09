@extends('admin.layouts.app')
@section('title')
    Edit Tag
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card card-primary">
                <div class="col-sm-12">
                    <h2>Tag</h2>
                    <a class="btn btn-primary" href="{{ route('tags.index') }}" role="button">All Tags </a>
                </div>
                <br>
                <div class="card-header">
                    <h3 class="card-title">Edit Tag </h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form action="{{ route('tags.update', $tag->id) }}" method="POST" >
                    @csrf
                    @method('PATCH')
                    <div class="card-body">
                        <div class="form-group">
                            <label for="exampleInputName">Title_en </label>
                            <input type="text" class="form-control @error('title_en') is-invalid @enderror"
                                id="exampleInputName" placeholder="Enter title_en" name="title_en" autocomplete="off"
                                value="{{ $tag->title_en ? $tag->title_en : old('title_en') }}">
                            @error('title_en')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputName">Title_ar </label>
                            <input type="text" class="form-control @error('title_ar') is-invalid @enderror"
                                id="exampleInputName" placeholder="Enter title_ar" name="title_ar" autocomplete="off"
                                value="{{ $tag->title_ar ? $tag->title_ar : old('title_ar') }}">
                            @error('title_ar')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                      
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

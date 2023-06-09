@extends('admin.layouts.app')
@section('title')
    Add New Admin
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card card-primary">
                <div class="col-sm-12">
                    <h2>Admins</h2>
                    <a class="btn btn-primary" href="{{route('admins.index')}}" role="button">All Admins </a>
                </div>
                <br>
                <div class="card-header">
                    <h3 class="card-title">Add New Admin </h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form action="{{ route('admins.store') }}" method="POST">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="exampleInputName">Name </label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="exampleInputName" placeholder="Enter Name"
                                name="name" autocomplete="off" value="{{old('name')}}">
                            @error('name')
                                <div class="alert alert-danger" >{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputCode">Code </label>
                            <input type="text" class="form-control  @error('code') is-invalid @enderror" id="exampleInputCode" placeholder="Enter Code"
                                name="code" autocomplete="off" value="{{old('code')}}">
                            @error('code')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror


                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Password</label>
                            <input type="password" class="form-control @error('password') is-invalid @enderror" id="exampleInputPassword1" placeholder="Password"
                                name="password" autocomplete="off" value="{{old('password')}}">
                            @error('password')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
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

@extends('Front.layout.master')
@section('title')
    Order Items
@endsection
@section('content')
        <div class="container p-3">
            <div class="row">
                <div class="col-sm-12">
                    <div class="col-sm-12">
                        <h1 class="text-center"> Order Number : </h1>
                    </div>
                    <br>
                    @if (session()->has('orderErrorMessage'))
                    <div class="al"></div>
                        
                    @endif
                    <form action="{{ route('findMyOrder') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="order_code">Order Code</label>
                            <input type="text" class="form-control" id="order_code" aria-describedby="order_code"
                                placeholder="Enter Order Code" name="order_code">
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
@endsection

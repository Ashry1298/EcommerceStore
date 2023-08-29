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
                <h2>Enter Order Code </h2>
                <form action="" method="POST">
                    <input type="text" name="order_code" id="order_code" placeholder="Enter Order Code" required>
                </form>
            </div>
        </div>
    </div>
@endsection

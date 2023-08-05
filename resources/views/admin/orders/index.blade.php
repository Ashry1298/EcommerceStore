@extends('admin.layouts.app')
@section('title')
    Orders
@endsection

@section('content')
    <div class="row">

        <div class="col-sm-12">
            <div class="col-sm-12">
                <h2> All Orders</h2>
            </div>
            <br>
            <table id="example2" class="table table-bordered table-hover dataTable dtr-inline collapsed"
                aria-describedby="example2_info">
                <thead>
                    <tr>
                        <th class="sorting sorting_asc" tabindex="0" aria-controls="example2" rowspan="1" colspan="1"
                            aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">#</th>
                        <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1"
                            aria-label="Browser: activate to sort column ascending">Full Name</th>
                        <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1"
                            aria-label="Browser: activate to sort column ascending">Full Address</th>
                        <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1"
                            aria-label="Browser: activate to sort column ascending">Phone Number</th>
                        <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1"
                            aria-label="Browser: activate to sort column ascending">Email</th>
                        <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1"
                            aria-label="Browser: activate to sort column ascending">Subtotal Order Payment</th>
                        <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1"
                            aria-label="Browser: activate to sort column ascending">Total Order Payment</th>
                        <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1"
                            aria-label="Browser: activate to sort column ascending">Order Status</th>
                        <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1"
                            aria-label="Browser: activate to sort column ascending">Order status_notes</th>
                        <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1"
                            aria-label="Browser: activate to sort column ascending">User_id</th>
                        <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1"
                            aria-label="Engine version: activate to sort column ascending">Processing </th>
                        <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1"
                            aria-label="CSS grade: activate to sort column ascending" style="display: none;">CSS grade</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($orders as $x=> $order)
                        <tr>
                            <th class="htr-control sorting_1" tabinhex="0">{{ $x + 1 }}</th>
                            <th>{{ $order->full_name }}</th>
                            <th>{{ $order->full_address }}</th>
                            <th>{{ $order->phone }}</th>
                            <th>{{ $order->email }}</th>
                            <th>{{ $order->sub_total }} </th>
                            <th>{{ $order->total }}</th>
                            <th>{{ $order->status }}</th>
                            <th>{{ $order->status_notes }}</th>
                            <th>{{ $order->user_id }}</th>
                            <th><a href="{{route('order.show',$order->id)}}" class="btn btn-info">Show</a></th>
                        </tr>
                    @empty
                        <tr>
                            <th class="dtr-control sorting_1" tabindex="0"> Sorry No Data Available</td>
                            </th>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection

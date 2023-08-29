@extends('Front.layout.master')
@section('title')
    My Orders Page
@endsection
@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="col-sm-12">
                <h2>Categories</h2>
                <a class="btn btn-primary" href="#" role="button">Add Category </a>
            </div>
            <br>
            <table id="example2" class="table table-bordered table-hover dataTable dtr-inline collapsed"
                aria-describedby="example2_info">
                <thead>
                    <tr>
                        <th class="sorting sorting_asc" tabindex="0" aria-controls="example2" rowspan="1" colspan="1"
                            aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">id</th>
                        <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1"
                            aria-label="Browser: activate to sort column ascending">رقم الطلب</th>
                        <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1"
                            aria-label="Platform(s): activate to sort column ascending">قيمه الطلب</th>
                        <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1"
                            aria-label="Engine version: activate to sort column ascending">عدد العناصر </th>
                        <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1"
                            aria-label="Engine version: activate to sort column ascending"> تاريخ الطلب </th>
                        <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1"
                            aria-label="Engine version: activate to sort column ascending"> وقت الطلب </th>
                        <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1"
                            aria-label="Engine version: activate to sort column ascending"> حاله الطلب </th>
                        <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1"
                            aria-label="Engine version: activate to sort column ascending">Processing </th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($orders as $x=>$order)
                        <tr>
                            <th class="htr-control sorting_1" tabinhex="0"></th>
                            <th>{{ $order->id }}</th>
                            <th>{{ $order->total }}</th>
                            <th>{{ $order->orderItems->count() }}</th>
                            <th>{{ $order->created_at->format('d M Y ') }}
                            </th>
                            <th>{{ $order->created_at->format(' H:i:s') }}</th>
                            <th>{{ $order->status }}</th>
                            <th><a class="btn btn-info" href="{{route('MyOrders.show',$order->id)}}">Show</a></th>
                        </tr>
                    @empty
                        <tr>
                            <th class="dtr-control sorting_1" tabindex="0" colspan="5"> Sorry No Data Available</td>
                            </th>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection

@extends('Front.layout.master')
@section('title')
    Order Items
@endsection
@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="col-sm-12">
                <h1 class="text-center"> Order Number : {{ $order->id }}</h1>
            </div>
            <br>
            <h2>Order Details</h2>
            <table id="example2" class="table table-bordered table-hover dataTable dtr-inline collapsed"
                aria-describedby="example2_info">
                <thead>
                    <tr>
                        <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1"
                            aria-label="Browser: activate to sort column ascending">Full_name</th>
                        <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1"
                            aria-label="Browser: activate to sort column ascending">Full_address </th>
                        <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1"
                            aria-label="Browser: activate to sort column ascending">Contact Data</th>
                        <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1"
                            aria-label="Browser: activate to sort column ascending">Total </th>
                        <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1"
                            aria-label="Browser: activate to sort column ascending">Order Status</th>
                        <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1"
                            aria-label="CSS grade: activate to sort column ascending" style="display: none;">CSS grade</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>{{ $order->full_name }}</td>
                        <td>{{ $order->full_address }}</td>
                        <td>{{ $order->phone }} -- {{ $order->email }}</td>
                        <td>{{ $order->total }} </td>
                        <td>
                            @php
                                $status = ['pending', 'shipping', 'rejected', 'delivered', 'closed'];
                            @endphp
                            <form action="{{ route('order.delete', $order->id) }}" method="POST">
                                @method('Delete')
                                @csrf
                                <button type="submit" class="btn btn-danger btn-sm">Cancel</button>
                            </form>
                        </td>
                    </tr>
                </tbody>
            </table>
            <h2>Order Items </h2>
            <table id="example2" class="table table-bordered table-hover dataTable dtr-inline collapsed"
                aria-describedby="example2_info">
                <thead>
                    <tr>
                        <th class="sorting sorting_asc" tabindex="0" aria-controls="example2" rowspan="1"
                            colspan="1" aria-sort="ascending"
                            aria-label="Rendering engine: activate to sort column descending">#</th>
                        <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1"
                            aria-label="Browser: activate to sort column ascending">order_id</th>
                        <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1"
                            aria-label="Browser: activate to sort column ascending">product_id </th>
                        <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1"
                            aria-label="Browser: activate to sort column ascending">product_name</th>
                        <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1"
                            aria-label="Browser: activate to sort column ascending">product_price</th>
                        <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1"
                            aria-label="Browser: activate to sort column ascending">Subtotal </th>
                        <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1"
                            aria-label="Browser: activate to sort column ascending">quantity</th>
                        <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1"
                            aria-label="Browser: activate to sort column ascending">chosen_color</th>
                        <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1"
                            aria-label="Browser: activate to sort column ascending">chosen_size</th>

                        <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1"
                            aria-label="CSS grade: activate to sort column ascending" style="display: none;">CSS grade
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($order->orderItems as $x=> $item)
                        <tr>
                            <td class="dtr-control sorting_1" tabindex="0">{{ $x + 1 }}</td>
                            <td>{{ $item->order_id }}</td>
                            <td>{{ $item->product_id }}</td>
                            <td>{{ $item->product_name }}</td>
                            <td>{{ $item->product_price }}</td>
                            <td>{{ $item->sub_total }} </td>
                            <td>{{ $item->quantity }}</td>
                            <td>{{ $item->chosen_color }}</td>
                            <td>{{ $item->chosen_size }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td class="dtr-control sorting_1" tabindex="0"> Sorry No Data Available</td>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection

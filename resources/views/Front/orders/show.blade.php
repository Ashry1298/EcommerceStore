@extends('Front.layout.master')
@section('title')
    Order Items
@endsection
@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="col-sm-12">
                <h1 class="text-center"> Order Number :{{$id}} </h1>
            </div>
            <br>

            <h2>Order Items </h2>
            <table id="example2" class="table table-bordered table-hover dataTable dtr-inline collapsed"
                aria-describedby="example2_info">
                <thead>
                    <tr>
                        <th class="sorting sorting_asc" tabindex="0" aria-controls="example2" rowspan="1" colspan="1"
                            aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">#</th>
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
                            aria-label="Engine version: activate to sort column ascending">Processing </th>
                        <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1"
                            aria-label="CSS grade: activate to sort column ascending" style="display: none;">CSS grade
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($orderItems as $item)
                        <tr>
                            <td class="dtr-control sorting_1" tabindex="0"></td>
                            <td>{{ $item->order_id }}</td>
                            <td>{{ $item->product_id }}</td>
                            <td>{{ $item->product_name }}</td>
                            <td>{{ $item->product_price }}</td>
                            <td>{{ $item->sub_total }} </td>
                            <td>{{ $item->quantity }}</td>
                            <td>{{ App\Models\ProductColor::findorfail($item->chosen_color)->pluck('color_en')->first() }}</td>
                            <td>{{ $item->chosen_size }}</td>
                            <td><button class="btn btn-danger">Delete</button></td>
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

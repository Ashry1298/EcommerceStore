@extends('admin.layouts.app')
@section('title')
    Products
@endsection

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="col-sm-12">
                <h2>Products</h2>
                <a class="btn btn-primary" href="{{ route('products.create') }}" role="button">Add Product </a>
            </div>
            <br>
            <table id="example2" class="table table-bordered table-hover dataTable dtr-inline collapsed"
                aria-describedby="example2_info">
                <thead>
                    <tr>
                        <th class="sorting sorting_asc">id</th>
                        <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1"
                            aria-label="Browser: activate to sort column ascending">Name_en</th>
                        <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1"
                            aria-label="Platform(s): activate to sort column ascending">Name_ar</th>
                        <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1"
                            aria-label="Engine version: activate to sort column ascending">Category </th>
                        <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1"
                            aria-label="Engine version: activate to sort column ascending">Price </th>
                        <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1"
                            aria-label="Engine version: activate to sort column ascending">Image </th>
                        <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1"
                            aria-label="Engine version: activate to sort column ascending">Desc </th>
                        <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1"
                            aria-label="Engine version: activate to sort column ascending">الوصف </th>
                        <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1"
                            aria-label="Engine version: activate to sort column ascending">Quantity </th>
                        <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1"
                            aria-label="Engine version: activate to sort column ascending">Processing </th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($products as $x=> $product)
                        <tr>
                            <td class="htr-control sorting_1" tabinhex="0">{{ $x + 1 }}</td>
                            <td>{{ $product->name_en }}</td>
                            <td>{{ $product->name_ar }}</td>
                            <td>{{ $product->category->title_en }} -{{ $product->category->title_ar }}</td>
                            <td>{{ $product->price }}</td>
                            <td> <img src="{{ asset('uploads/products/' . $product->main_image) }}" alt="image" width="100" height="100"></td>
                            <td>{{ $product->desc_en }}</td>
                            <td>{{ $product->desc_ar }}</td>
                            <td>{{ $product->quantity }}</td>
                            <td>
                                <a class="btn btn-outline-info" href="{{ route('products.edit', $product->id) }}"
                                    role="button">edit </a>
                                <form action="{{ route('products.destroy', $product->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-outline-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td class="dtr-control sorting_1" tabindex="0"> Sorry No Data Available</td>

                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection

@extends('admin.layouts.app')
@section('title')
    Category Sizes
@endsection

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="col-sm-12">
                <h2>{{$category->title}} sizes</h2>
      
            </div>
            <br>
            <table id="example2" class="table table-bordered table-hover dataTable dtr-inline collapsed"
                aria-describedby="example2_info">
                <thead>
                    <tr>
                        <th class="sorting sorting_asc" tabindex="0" aria-controls="example2" rowspan="1" colspan="1"
                            aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">id</th>
                        <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1"
                            aria-label="Browser: activate to sort column ascending">sizeName</th>
                        <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1"
                            aria-label="Engine version: activate to sort column ascending">Processing </th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $x = 0;
                    @endphp
                    @forelse ($category->sizes as  $size)
                        <tr>
                            <th class="htr-control sorting_1" tabinhex="0">{{ $x+=1 }}</th>
                            <th>{{$size->sizeName}}</th>
                            <th>
                            
                                <form action="{{route('cat.sizes.destroy',$size->id)}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-outline-danger">Delete</button>
                                </form>
                            </th>

                        </tr>
                    @empty
                        <tr>
                            <th class="dtr-control sorting_1" tabindex="0" colspan="5"> Sorry No Data Available</td>
                            </th>
                        </tr>
                    @endforelse
                    <tr>
                        <th colspan="3">
                            <form action="{{route('cat.sizes.store',$category->id)}}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Add Size" name="sizeName">
                                </div>
                                <button type="submit" class="btn btn-outline-info">Add Size</button>
                            </form>
                        </th>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection

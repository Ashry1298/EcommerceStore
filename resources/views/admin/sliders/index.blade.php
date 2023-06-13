@extends('admin.layouts.app')
@section('title')
    Sliders
@endsection

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="col-sm-12">
                <h2>Sliders</h2>
                <a class="btn btn-primary" href="{{ route('sliders.create') }}" role="button">Add Slider </a>
            </div>
            <br>
            <table id="example2" class="table table-bordered table-hover dataTable dtr-inline collapsed"
                aria-describedby="example2_info">
                <thead>
                    <tr>
                        <th class="sorting sorting_asc" tabindex="0" aria-controls="example2" rowspan="1" colspan="1"
                            aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">id</th>
                        <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1"
                            aria-label="Browser: activate to sort column ascending">Small Title_ar</th>
                        <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1"
                            aria-label="Platform(s): activate to sort column ascending"> Small Title_en</th>
                        <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1"
                            aria-label="Browser: activate to sort column ascending">Big Title_ar</th>
                        <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1"
                            aria-label="Platform(s): activate to sort column ascending">Big Title_en</th>
                        <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1"
                            aria-label="Engine version: activate to sort column ascending">Logo </th>
                        <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1"
                            aria-label="Engine version: activate to sort column ascending">Processing </th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($sliders as $x=> $slider)
                        <tr>
                            <th class="htr-control sorting_1" tabinhex="0">{{ $x + 1 }}</th>
                            <th>{{ $slider->small_title_ar }}</th>
                            <th>{{ $slider->small_title_en }}</th>
                            <th>{{ $slider->big_title_ar }}</th>
                            <th>{{ $slider->big_title_en }}</th>
                            <th><img src="" width="100"></th>
                            <th>
                                <a class="btn btn-outline-info" href="{{route('sliders.edit',$slider->id)}}" role="button">edit </a>
                                <form action="{{route('sliders.destroy',$slider->id)}}" method="POST">
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
                </tbody>
            </table>
        </div>
    </div>
@endsection

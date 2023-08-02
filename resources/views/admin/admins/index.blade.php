@extends('admin.layouts.app')
@section('title')
    Admins
@endsection

@section('content')
<div class="row">

        <div class="col-sm-12">
            <div class="col-sm-12">
                <h2>Admins</h2>
                <a class="btn btn-primary" href="{{route('admins.create')}}" role="button">Add Admin </a>
            </div>
            <br>
            <table id="example2" class="table table-bordered table-hover dataTable dtr-inline collapsed"
                aria-describedby="example2_info">
                <thead>
                    <tr>
                        <th class="sorting sorting_asc" tabindex="0" aria-controls="example2" rowspan="1" colspan="1"
                            aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">id</th>
                        <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1"
                            aria-label="Browser: activate to sort column ascending">Name</th>
                        <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1"
                            aria-label="Platform(s): activate to sort column ascending">Code</th>
                        <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1"
                            aria-label="Engine version: activate to sort column ascending">Processing </th>
                        <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1"
                            aria-label="CSS grade: activate to sort column ascending" style="display: none;">CSS grade</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($admins as $x=> $admin)
                    <tr>
                        <th class="htr-control sorting_1" tabinhex="0">{{$x+1}}</th>
                        <th>{{$admin->name}}</th>
                        <th>{{$admin->code}}</th>
                        <th>
                            <a class="btn btn-outline-info" href="{{route('admins.edit',$admin->id)}}" role="button">edit  </a>
                            <form action="{{route('admins.destroy',$admin->id)}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-outline-danger" >Delete</button>
                            </form>
                        </th>
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

@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
@if (session()->has('message'))
<div class="alert alert-danger text-center">
    <ul>
        {{ session()->get('message') }}
    </ul>
</div>
@endif
@if (session()->has('error'))
<div class="alert alert-danger text-center">
    <ul>
        {{ session()->get('error') }}
    </ul>
</div>
@endif

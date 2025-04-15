@extends("layouts.app")

@section("content")
    <div class="container">
        <img src="{{asset($data->path)}}" />
    </div>

@endsection

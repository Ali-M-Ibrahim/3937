@extends("layouts.app")

@section("content")

    <div class="container">
        <h1>Item information:</h1>
        <p>The name is : {{$data->name}}</p>
        <p>The description is : {{$data->description}}</p>
        <p>The price is : {{$data->price}}</p>
        <a href="{{route("myitem.index")}}" class="btn btn-success">Back</a>
    </div>

@endsection

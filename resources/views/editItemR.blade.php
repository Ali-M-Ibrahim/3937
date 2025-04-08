@extends("layouts.app")

@section("content")
    <div class="container">
        <h1>Edit Item</h1>

        <form action="{{route("myitem.update",["myitem"=>$obj->id])}}" method="post">
            @csrf
            @method("put")
            <div class="form-group">
                <label for="name">Name</label>
                <input value="{{$obj->name}}" name="name" type="text" required class="form-control" id="name" />
            </div>

            <div class="form-group">
                <label for="description">Description</label>
                <textarea name="description" required class="form-control" id="description" > {{$obj->description}} </textarea>
            </div>

            <div class="form-group">
                <label for="price">Price</label>
                <input value="{{$obj->price}}" name="price" required type="number" class="form-control" id="price" />
            </div>

            <div class="form-actions">
                <input type="submit" class="btn btn-success" />
                <a href="{{route("myitem.index")}}" class="btn btn-info"> Cancel </a>
            </div>


        </form>
    </div>
@endsection


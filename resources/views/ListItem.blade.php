@extends("layouts.app")


@section("content")

    <h1>List Items <a href="{{route("create")}}"> + Item</a> </h1>

    <div class="container">
        <table class="table table-bordered table-hover">
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Description</th>
                <th>Price</th>
                <th>Actions</th>
            </tr>

            @foreach($data as $obj)
                <tr>
                    <td>{{$obj->id}}</td>
                    <td>{{$obj->name}}</td>
                    <td>{{$obj->description}}</td>
                    <td>{{$obj->price}}</td>
                    <td>

  <a href="{{route("show",["id"=>$obj->id])}}">show</a>
 <a href="{{route("delete",["id"=>$obj->id])}}">Delete</a>
                   <form method="post" action="{{route("delete2",["id"=>$obj->id])}}">
                       @csrf
                       @method("delete")
                       <input type="submit" value="delete" class="btn btn-danger">
                   </form>

<a href="{{route("edit",["id"=>$obj->id])}}">Edit</a>

                    </td>
                </tr>

            @endforeach


        </table>
    </div>

@endsection

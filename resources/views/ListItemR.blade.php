@extends("layouts.app")


@section("content")

    <h1>List Items <a href="{{route("myitem.create")}}"> + Item</a> </h1>

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
<a href="{{route("myitem.show",["myitem"=>$obj->id])}}">show</a>
<form method="post" action="{{route("myitem.destroy",["myitem"=>$obj->id])}}">
    @csrf
    @method("delete")
    <input type="submit" class="btn btn-danger" value="delete">
</form>
<a href="{{route("myitem.edit",["myitem"=>$obj->id])}}">edit</a>


                    </td>
                </tr>

            @endforeach


        </table>
    </div>

@endsection

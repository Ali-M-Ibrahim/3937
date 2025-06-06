@extends("layouts.app")

@section("content")
<div class="container">
    <h1>Create new Item</h1>

    <form action="{{route("myitem.store")}}" method="post">
        @csrf
        <div class="form-group">
            <label for="name">Name</label>
            <input name="name" type="text" required class="form-control" id="name" />
        </div>

        <div class="form-group">
            <label for="description">Description</label>
            <textarea name="description" required class="form-control" id="description" > </textarea>
        </div>

        <div class="form-group">
            <label for="price">Price</label>
            <input name="price" required type="number" class="form-control" id="price" />
        </div>

        <div class="form-actions">
            <input type="submit" class="btn btn-success" />
            <a href="{{route("myitem.index")}}" class="btn btn-info"> Cancel </a>
        </div>


    </form>
</div>
@endsection


@extends("layouts.app")

@section("content")
    <div class="container">
        <h1>Create newmage</h1>

        <form enctype="multipart/form-data" action="{{route("store-image")}}" method="post">
            @csrf
            <div class="form-group">
                <label for="image">Image</label>
                <input  name="image"  type="file" class="form-control" id="image" />
            </div>

            <div class="form-actions">
                <input type="submit" class="btn btn-success" />
            </div>

        </form>

    </div>
@endsection

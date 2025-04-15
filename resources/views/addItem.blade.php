

    <form action="{{route("save")}}"@extends("layouts.app")

    @section("content")
        <div class="container">
            <h1>Create new Item</h1> method="post">
        @csrf
        <div class="form-group">
            <label for="name">Name</label>
            <input value="{{old("item_name")}}" name="item_name" type="text"  class="form-control" id="name" />
            @error("item_name")
            <div>{{$message}}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="description">Description</label>
            <textarea name="item_description"  class="form-control" id="description" > {{old("item_description")}}</textarea>
            @error("item_description")
            <div>{{$message}}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="price">Price</label>
            <input value="{{old("item_price")}}" name="item_price"  type="number" class="form-control  @error("item_price") is-invalid @enderror" id="price" />
            @error("item_price")
            <div>{{$message}}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="price">Price Confirmation</label>
            <input value="{{old("item_price_confirmation")}}" name="item_price_confirmation"  type="number" class="form-control" id="price" />
            @error("item_price_confirmation")
            <div>{{$message}}</div>
            @enderror
        </div>

        <div class="form-actions">
            <input type="submit" class="btn btn-success" />
            <a href="{{route("list")}}" class="btn btn-info"> Cancel </a>
        </div>


    </form>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

</div>
@endsection


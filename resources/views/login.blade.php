@extends("layouts.app")

@section("content")
    <div class="container">
        <h1>Create newmage</h1>

        <form action="{{route("dologin")}}" method="post">
            @csrf
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" name="email" id="email" />
                @error("email")
                <div> {{$message}} </div>
                @enderror
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" name="password" id="password" />
            </div>

            <div class="form-action">
                <input type="submit" class="btn btn-success" />
            </div>


        </form>
    </div>
@endsection

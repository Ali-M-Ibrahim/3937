<h1>Custom page</h1>

@if(Auth::check())
<p>The user is connected and the name is: {{Auth::user()->name}}</p>
<p>The user is connected and the email is: {{Auth::user()->email}}</p>
<p>The user is connected and the address is: {{Auth::user()->address}}</p>
<a href="{{route("logout")}}" class="btn btn-danger">Logout</a>
@else

    <p>the user is not connected</p>
    <a href="{{route("login")}}" class="btn btn-danger">Login</a>

@endif

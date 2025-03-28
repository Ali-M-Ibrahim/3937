<!DOCTYPE html>
<html>
<head>
    <style>
        body {background-color: powderblue;}
        h1   {color: blue;}
        p    {color: red;}
    </style>
</head>
<body>

<h1>This is a heading</h1>
<p>This is a paragraph.</p>



<ul>
    @for($i=0;$i<10;$i++)
        @if($i==2)
            @break
            <li> first element  </li>
        @else
            <li> {{$i}}  </li>
        @endif

    @endfor
</ul>

@include("Nav")

<p>  {{$msg1}}    </p>
<p>  {{$msg2}}    </p>

@isset($data)
<p>{{$data}}</p>
@endisset
</body>
</html>


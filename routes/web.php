<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});





Route::get("/hello",function(){
   return "Hello Class, I am your first end point";
});

Route::get("/second",function(){
   return 1234;
});

Route::get('/json',function (){
   return response()->json(["first_name"=>"Ali","last_name"=>"ibrahim"]);
});

Route::get("/array",function(){
    return [];
});

Route::get('/json-with-headers',function (){
    return response()->json(["message"=>"Check headers"])
        ->header("secret-value",12345678)
        ->header("ali","ibrahim");
});


Route::get('/json-with-headers-2',function (){
    return response()->json(["message"=>"Check headers"])
        ->withHeaders([
            "header1"=>"12343",
            "header2"=>"56789"
        ]);
});















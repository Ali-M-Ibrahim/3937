<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FirstController;
use App\Http\Controllers\ResourceController;
use App\Http\Controllers\ApiController;
use App\Http\Controllers\InvokableController;

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


Route::get('endpoint-5',function(){
    return "Hello i am end point 5";
});

Route::get('endpoint-6',function(){
   return response()->json(["firstname"=>"Joe","lastname"=>"Doe"])
   ->header("header1","this is my header value");
});

Route::get('endpoint-7/{id}',function($id){
    return "Hello, the parameter value is: " .$id;
});

Route::get('endpoint-8/{id}/{name}',function($id, $name){
    return "The value of id is:" . $id . " and the value of the name is:" . $name;
});

Route::Get('endpoint-9/{id?}',function($id=0){
    return "Hello i am endpoint9 and the id is: " .$id;
});

Route::get('endpoint-10/{name}/{id?}',function($name,$id=0){
    return "The value of id is:" . $id . " and the value of the name is:" . $name;
});


Route::get('endpoint-11/{id}/{fname?}/{lname?}',function($id,$fname="Joe",$lname="Doe"){
    return "The value of id is:" . $id . " and the value of the name is:" . $fname . " and the lastname is: ". $lname;
});

Route::get("route-12",function(){
    return "i am a route";
})->name("my-route");

//To create a new controller
// php artisan make:controller Controller_name
// dont forget to include the controller using:
// use App\Http\Controllers\FirstController;
Route::get('f1',[FirstController::class,'f1'])->name('function 1');
Route::get('f2',[FirstController::class,'f2']);
Route::get('f3/{id}',[FirstController::class,'f3']);
Route::get('f5/{id?}',[FirstController::class,'f5']);
Route::get('f4/{fname}/{lname}',[FirstController::class,'f4']);


Route::get('ff1',"App\Http\Controllers\FirstController@f1")
    ->name('my-route2');
Route::get('ff2',"App\Http\Controllers\FirstController@f2")
    ->name('my-route2');

Route::get('fff1',[
    'uses'=> 'App\Http\Controllers\FirstController@f1',
    'as'=> "my-route3"
]);

Route::post('my-post',[FirstController::class,'post']);


//to create a resource controller use:
// php artisan make:controller CONTROLLER_NAME --resource
Route::resource('student',ResourceController::class);
Route::resource('student2',ResourceController::class)
->only(['index','create'])
;

Route::resource('student3',ResourceController::class)
    ->except(['index'])
;

Route::apiResource('my-api',ApiController::class);

Route::get('invoke',InvokableController::class);

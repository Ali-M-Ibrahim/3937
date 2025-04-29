<?php

use App\Http\Controllers\DIController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\WebsiteController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FirstController;
use App\Http\Controllers\ResourceController;
use App\Http\Controllers\ApiController;
use App\Http\Controllers\InvokableController;
use App\Http\Controllers\DataController;
use App\Http\Controllers\CrudController;
use App\Http\Controllers\ViewController;

use App\Http\Controllers\ItemController;
use App\Http\Controllers\ItemResourceController;
use App\Http\Controllers\AuthenticationController;








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


Route::get('create1',[DataController::class,'create1']);
Route::get('getCustomer/{id}',[DataController::class,'getCustomerById']);
Route::get('getCredentialsById/{id}',[DataController::class,'getCredentialsById']);
Route::get('getAddressById/{id}',[DataController::class,'getAddressById']);
Route::get('getServiceById/{id}',[DataController::class,'getServiceById']);

Route::get('getAllCustomers',[DataController::class,'getAllCustomers']);
Route::get('getCustomerByFirstName/{fname}',[DataController::class,'getCustomerByFirstName']);
Route::get('getCustomerByFirstName1/{fname}',[DataController::class,'getCustomerByFirstName1']);
Route::get('getCustomerByFnameAndLname',[DataController::class,'getCustomerByFnameAndLname']);
Route::get('getCustomersAfter2024',[DataController::class,'getCustomersAfter2024']);

Route::get('findCustomerById/{id}',[DataController::class,'findCustomerById']);
Route::get('findCustomerById2/{id}',[DataController::class,'findCustomerById2']);
Route::get('getCustomerByFirstName2/{id}',[DataController::class,'getCustomerByFirstName2']);
Route::get('getCustomerByFirstName3/{id}',[DataController::class,'getCustomerByFirstName3']);



Route::get('getCustomerByLastnameOrDob',[DataController::class,'getCustomerByLastnameOrDob']);
Route::get('getCustomerIn',[DataController::class,'getCustomerIn']);
Route::get('getCustomerBetween',[DataController::class,'getCustomerBetween']);
Route::get('getIbrahimCusomers',[DataController::class,'getIbrahimCusomers']);
Route::get('statistics',[DataController::class,'statistics']);


Route::get("createm1",[CrudController::class,"createm1"]);
Route::get("createm2",[CrudController::class,"createm2"]);
Route::post("createm3",[CrudController::class,"createm3"]);
Route::post("createm4",[CrudController::class,"createm4"]);
Route::get("createm5",[CrudController::class,"createm5"]);
Route::get("updatem1/{id}",[CrudController::class,"updatem1"]);
Route::post("updatem2/{id}",[CrudController::class,"updatem2"]);
Route::get("massUpdate",[CrudController::class,"massUpdate"]);


Route::get("delete/{id}",[CrudController::class,"delete"]);


Route::get("massDelete",[CrudController::class,"massDelete"]);


Route::get("first-view",[ViewController::class,"index"]);
Route::get("second-view",[ViewController::class,"index2"]);
Route::get("viewCustomer",[ViewController::class,"viewCustomer"]);
Route::get("listCustomer",[ViewController::class,"listCustomer"]);


Route::get("create-item",[ItemController::class,"create"])
->name("create")->middleware('check');
Route::get("list-item",[ItemController::class,"list"])
->name("list");
Route::post("save-item",[ItemController::class,"save"])
->name("save");

Route::get("show-item/{id}",[ItemController::class,"show"])
    ->name("show");

Route::get("delete-item/{id}",[ItemController::class,"delete"])
->name("delete");

Route::delete("delete-item2/{id}",[ItemController::class,"delete"])
    ->name("delete2");

Route::get("edit-item/{id}",[ItemController::class,"edit"])
    ->name("edit");
Route::put("update-item/{id}",[ItemController::class,"update"])
    ->name("update");


Route::resource("myitem",ItemResourceController::class);

Route::get("deleteitem/{id}",[ItemResourceController::class,"destroy"])
->name("deletefromresource");



Route::get("addImage",[ImageController::class,"addImage"]);
Route::get("displayImage/{id}",[ImageController::class,"displayImage"])->name("displayImage");
Route::post("addImage",[ImageController::class,"store"])->name("store-image");


Route::get("about",[WebsiteController::class, "about"]);
Route::get("contact",[WebsiteController::class, "contact"]);


Route::get("register",[AuthenticationController::class,'register']);
Route::get("login",[AuthenticationController::class,'login'])
->name("login");
Route::post("dologin",[AuthenticationController::class,'dologin'])
->name("dologin");
Route::get("checkUser",[AuthenticationController::class,'checkUser']);
Route::get("logout",[AuthenticationController::class,'logout'])
->name("logout");



Route::middleware(['check'])->group(function () {
    Route::get('/check1', function () {
        return "check 1";
    });
    Route::get('check2', function () {
        return "check 2";
    });
});


Route::get("before-di",[DIController::class,"beforedi"]);
Route::get("method-di",[DIController::class,"methoddi"]);
Route::get("method-di1",[DIController::class,"dic1"]);
Route::get("method-di2",[DIController::class,"dic2"]);





<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FirstController extends Controller
{
    function f1(){
        return "Hello i am first controller and i am function 1";
    }

    function f2(){
        return response()->json(["firstname"=>"Joe","lastname"=>"Doe"])
            ->header("header1","this is my header value");
    }

    function f3($id){
        return "the parameter is: " .$id;
    }

    function f4($fname, $lname){
        return response()->json(["firstname"=>$fname,"lastname"=>$lname]);
    }

    function f5($id=0){
        return "the parameter is: " .$id;
    }

    function post(Request $request){
        $header = $request->header('secret');
        if($header=="123"){
            $first_name = $request->fname;
            $last_name = $request->lname;
            $age = $request->input('age',20);
            $fullname = $first_name . " ". $last_name ."  and age is: " . $age ;
            return "User is authenticated you can return data: " .$fullname ;
        }
        else{
            return "No access";
        }
    }
}

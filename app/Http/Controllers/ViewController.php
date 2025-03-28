<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class ViewController extends Controller
{
    public function index(){
        // method 1
//        $message1 = "Hello thisis my first message from controlller";
//        $message2 = "This is my second message from controller";
//        return View("FirstView",['msg1'=>$message1,'msg2'=>$message2]);

        // method 2
//        $msg1 = "Hello thisis my first message from controlller";
//        $msg2 = "This is my second message from controller";
//        return View("FirstView",compact('msg1','msg2'));


//         method 3
        $message1 = "Hello thisis my first message from controlller";
        $message2 = "This is my second message from controller";
        $this->prepareData();
        return View("FirstView")
            ->with("msg1",$message1)
            ->with("msg2",$message2);


    }

    function prepareData()
    {
        $data1 = "This is from prepare data function";
        $data2= "second data";
        \View::share(["data"=>$data1, "data2"=>$data2]);

    }

    public function index2(){
        $this->prepareData();
        return View("SecondView");
    }

    public function viewCustomer(){
        $data = Customer::find(11);
        return View("ViewCustomer")->with("data",$data);
    }

    public function listCustomer(){
        $data = Customer::all();
        return View("ListCustomer")->with("data",$data);
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CrudController extends Controller
{
    public function createm1(){
        $obj = new Customer();
        $obj->first_name="Joe";
        $obj->last_name="Doe";
        $obj->dob = "2025-01-01";
        $obj->save();
        return "Ok data created using method 1";
    }
    public function createm2(){
        Customer::create([
           "first_name"=>"Joe 2",
           "last_name"=>"Doe 2",
           "dob"=>"2025-01-01"
        ]);
        return "ok data created using method 2";
    }
    public function createm3(Request $request){
        // method 1
        $obj = new Customer();
        $obj->first_name=$request->first_name;
        $obj->last_name=$request->last_name;
        $obj->dob = $request->dob;
        $obj->save();

        //method 2
        Customer::create([
            "first_name"=>$request->first_name,
            "last_name"=>$request->input("last_name","Default"),
            "dob"=>$request->dob
        ]);

        return "ok data created";
    }
    public function createm4(Request $request){
        Customer::create($request->all());
        return "ok data created using method 4";
    }
    public function createm5(Request $request){
        Customer::insert(
            [
            "first_name"=>"Joe 2",
            "last_name"=>"Doe 2",
            "dob"=>"2025-01-01"
           ],
            [
                "first_name"=>"Joe 2",
                "last_name"=>"Doe 2",
                "dob"=>"2025-01-01"
            ],
        );
        return "ok";
    }
    public function updatem1($id){
        $obj = Customer::find($id);
        $obj->first_name = "Updated";
        $obj->last_name = "Updated";
        $obj->dob = "2025-01-01";
        $obj->save();
        return "ok data updated";
    }
    public function updatem2(Request $request,$id){
        $obj  = Customer::find($id);
        $obj->fill($request->all());
        if($obj->isClean()){
            return "same data please update something";
        }
        $obj->save();
        return "ok data updated";
    }
    public function massUpdate(){
        Customer::where("first_name","like","%Joe%")
            ->update(["dob"=>"2021-01-01"]);
        return "ok updated";
    }
    public function delete($id){
        $obj= Customer::findOrFail($id);
        $obj->delete();
        return "okay deleted";
    }

    public function massDelete(){
        Customer::where("first_name", "like", "%Joe%")
            ->delete();
        return "deleted";
    }

}

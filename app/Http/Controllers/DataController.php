<?php

namespace App\Http\Controllers;

use App\Models\Address;
use App\Models\Credential;
use App\Models\Customer;
use App\Models\Service;
use App\Models\ServiceCustomer;
use Illuminate\Http\Request;

class DataController extends Controller
{
    public function create1(){
        $obj = new Customer();
        $obj->first_name= "Ali";
        $obj->last_name = "Ibrahim";
        $obj->dob= "2025-03-18";
        $obj->save();

        $obj2 = new Credential();
        $obj2->email= "ali@hotmail.com";
        $obj2->password = "123";
        $obj2->customer_id = $obj->id;
        $obj2->save();


        $obj3 = new Address();
        $obj3->country= "Lebanon";
        $obj3->city= "Baabda";
        $obj3->customer_id = $obj->id;
        $obj3->save();

        $obj3 = new Address();
        $obj3->country= "Lebanon";
        $obj3->city= "Jbeil";
        $obj3->customer_id = $obj->id;
        $obj3->save();


        $obj3 = new Address();
        $obj3->country= "Lebanon";
        $obj3->city= "Jounieh";
        $obj3->customer_id = $obj->id;
        $obj3->save();


        $obj4 = new Service();
        $obj4->name="Service 1";
        $obj4->save();


        $obj5 = new Service();
        $obj5->name="Service 2";
        $obj5->save();

        $relation = new ServiceCustomer();
        $relation->customer_id= $obj->id;
        $relation->service_id = $obj4->id;
        $relation->save();

        $obj->getServices()->attach($obj5->id);
        $obj->save();

        return "ok data created";
    }

    public function getCustomerById($id){
        // select * from customers where id=?;
        $customer = Customer::find($id);

        $credentials = $customer->getCredentials;
        $addresses = $customer->getAddresses;
        $services = $customer->getServices;
        return $customer;
    }

    public function getCredentialsById($id){
        //select * from credentials where id=?
        $credentials = Credential::find($id);
        $customer = $credentials->getCustomer;
        return $credentials;
    }

    public  function getAddressById($id){
        $obj = Address::find($id);
        $relatedCustomer = $obj->getCustomer;
        return $relatedCustomer;
    }

    public function getServiceById($id){
        $service = Service::find($id);
        $customeres = $service->getCustomers;
        return $service;

    }


    public function getAllCustomers(){
        //select * from customers;
        $customers = Customer::all();
        return $customers;
    }

    public function getCustomerByFirstName($fname){
        // select * from cusomters where first_name=?;
        $customer = Customer::where('first_name', $fname)
            ->get();
        return $customer;
    }

    public function getCustomerByFirstName1($fname){
        // select * from cusomters where first_name=?;
        $customer = Customer::where('first_name',$fname)
            ->first();
        return $customer;
    }

    public function getCustomerByFnameAndLname(){
        // SELECT * FROM CUSTOMERS WHERE FIRST_NAME = "ALI" AND LAST_NAME="iBRAHIM"
        $customer = Customer::where('first_name',"Ali 1")
            ->where("last_name","Ibrahim")
            ->get();
        return $customer;
    }

    public function getCustomersAfter2024(){
        $customer = Customer::where("dob","<","2024-01-01")
            ->get();
        return $customer;
    }


    public function findCustomerById($id){
        // select * from customers where id=?;
        $customer = Customer::findOrFail($id);
        $credentials = $customer->getCredentials->email;
        return $credentials;
    }

    public function findCustomerById2($id){
        // select * from customers where id=?;
        $customer = Customer::findOr($id,function(){
            return "Please input a valid id";
        });
        return $customer;
    }

    public function getCustomerByFirstName2($fname){
        // select * from cusomters where first_name=?;
        $customer = Customer::where('first_name',$fname)
            ->firstOrFail();
        return $customer;
    }

    public function getCustomerByFirstName3($fname){
        // select * from cusomters where first_name=?;
        $customer = Customer::where('first_name',$fname)
            ->firstOr(function(){
                return "not valid";
            });
        return $customer;
    }


    public function getCustomerByLastnameOrDob(){
        $data = Customer::where("first_name","Ali 1")
            ->orWhere("dob", "<","2024-01-01")
            ->get();
            return $data;
    }

    public function getCustomerIn(){
        //select * from customers where id in (1,2,3)
        //select * from customers where id = 1 or id=2 or id=3
        $data = Customer::WhereIn("id",[1,2,3,4,5,6,7])
            ->get();
        return $data;
    }


    public function getCustomerBetween(){
        $data =Customer::whereBetween("dob",["2024-01-01","2025-01-01"])
            ->get();
        return $data;
    }

    public function getIbrahimCusomers(){
        // SELECT * FROM CUSTOMERS WHERE LAST_NAME = IBRAHIM LIMIT 2
        $data = Customer::where("last_name","Ibrahim")
//            ->take(2)
//            ->OrderBy("dob")
            ->OrderBy("dob",'desc')
            ->get();
        return $data;
    }

    public function statistics(){

        $count = Customer::count();
        $maxId = Customer::max('Id');
        $minId = Customer::min('Id');
        $avg = Customer::avg('Id');
        return $avg;
    }












}

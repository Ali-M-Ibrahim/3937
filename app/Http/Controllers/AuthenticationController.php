<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthenticationController extends Controller
{
    public function register(){
        $user = new User();
        $user->name= "Ali Ibrahim";
        $user->email = "admin@hotmail.com";
        $user->password = Hash::make("123");
        $user->address = "Beirut";
        $user->is_admin=true;
        $user->save();


        $user = new User();
        $user->name= "Ali Ibrahim";
        $user->email = "user@hotmail.com";
        $user->password = Hash::make("123");
        $user->address = "Beirut";
        $user->is_admin=false;
        $user->save();
        return "ok created";
    }

    public function login(){
        return View("login");
    }

    public function dologin(Request $request){
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            return "ok connected";
        }
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }


    public function checkUser(){
//        if(Auth::check()){
//            $user = Auth::user()->name;
//            return "the connected user is: " . $user;
//        }else{
//            return "user not connected";
//        }

        return View("checkUser");

    }

    public function logout(){
        Auth::logout();

    }

}

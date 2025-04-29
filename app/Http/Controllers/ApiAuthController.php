<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Traits\APIResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class ApiAuthController extends Controller
{
    use APIResponse;
    public function register(Request $request){
        $validator = Validator::make($request->all(),[
            'name'=>'required',
            'email'=>'required',
            'address'=>'required',
            'is_admin'=>'required',
            'password'=>'required|same:c_password'
        ]);
        if($validator->fails()){
            $errors = $validator->errors();
            return $this->errorResponse("Validation error",$errors);
        }
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->address= $request->address;
        $user->is_admin = $request->is_admin;
        $user->save();
        $success['token'] =  $user->createToken('MyApp')->plainTextToken;
        $success['name'] =  $user->name;
        return $this->successResponse('User register successfully.',$success);
    }

    public function login(Request $request){
        $validator = Validator::make($request->all(),[
            'email'=>'required',
            'password'=>'required'
        ]);
        if($validator->fails()){
            $errors = $validator->errors();
            return $this->errorResponse("Validation error",$errors);
        }

        if(Auth::attempt(['email' => $request->email, 'password' => $request->password])){
            $user = Auth::user();
            $success['token'] =  $user->createToken('MyApp')->plainTextToken;
            $success['name'] =  $user->name;
            return $this->successResponse('User login successfully.',$success);
        }
        else{
            return $this->errorResponse('Unauthorised.', ['error'=>'Unauthorised']);
        }

    }
}

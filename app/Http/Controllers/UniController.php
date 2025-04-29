<?php

namespace App\Http\Controllers;

use App\Http\Resources\UniResource;
use App\Models\Uni;
use App\Traits\APIResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;

class UniController extends Controller
{
    use APIResponse;
    public function index(){
        $data = Uni::all();
        $content = UniResource::collection($data);
        return $this->successResponse("All data retrieved successfully",$content);
    }
    public function store(Request $request){
        $validator = Validator::make($request->all(),[
            'name'=>'required'
        ]);

        if($validator->fails()){
            $errors = $validator->errors();
            return $this->errorResponse("Validation error",$errors);
        }

        $uni = new Uni();
        $uni->name = $request->name;
        $uni->save();
        $content = new UniResource($uni);
        return $this->successResponse("Uni created successfully",$content,Response::HTTP_CREATED);


    }
    public function view($id){
        $data = Uni::find($id);
        if($data==null){
            return $this->errorResponse("Uni does not exist");
        }
        $content = new UniResource($data);
        return $this->successResponse("Uni retrieved successfully",$content);
    }
    public function update($id, Request $request){
        $validator = Validator::make($request->all(),[
            'name'=>'required'
        ]);
        if($validator->fails()){
            $errors = $validator->errors();
            return $this->errorResponse("Validation error",$errors);
        }
        $data = Uni::find($id);
        if($data==null){
            return $this->errorResponse("Uni does not exist");
        }
        $data->name = $request->name;
        $data->save();
        $content = new UniResource($data);
        return $this->successResponse("Uni updated successfully",$content);

    }

    public function delete($id){
        $data = Uni::find($id);
        if($data==null){
            return $this->errorResponse("Uni does not exist");
        }
        $data->delete();
        return $this->successResponse("Uni deleted successfully");

    }
}

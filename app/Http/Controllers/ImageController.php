<?php

namespace App\Http\Controllers;

use App\Models\Image;
use Illuminate\Http\Request;

class ImageController extends Controller
{
    public function addImage(){
        return View("addImage");
    }

    public function store(Request $request){
        if($request->hasFile("image")){
            $file = $request->file("image");
            $name = $file->getClientOriginalName();
            $path = $file->store("method3",'public');
            $img = new Image();
            $img->name=$name;
            $img->path='storage/'.$path;
            $img->save();
        }else{
            return "image not received";
        }
        return redirect()
            ->route("displayImage",["id"=>$img->id]);
    }

    public function storeRecommended(Request $request){
        if($request->hasFile("image")){
            $file = $request->file("image");
            $name = $file->getClientOriginalName();
            $newname = time() . "-" . $name;
            $file->storeAs("method2",$newname,'public');
            $img = new Image();
            $img->name=$name;
            $img->path='storage/method2/'.$newname;
            $img->save();
        }else{
            return "image not received";
        }
        return redirect()
            ->route("displayImage",["id"=>$img->id]);
    }

    public function storeInPublic(Request $request){
        if($request->hasFile("image")){
            $file = $request->file("image");
            $name = $file->getClientOriginalName();
            $newname = time() . "-" . $name;
            $file->move("method1",$newname);
            $img = new Image();
            $img->name=$name;
            $img->path='method1/'.$newname;
            $img->save();
        }else{
            return "image not received";
        }
        return redirect()
            ->route("displayImage",["id"=>$img->id]);
    }

    public function storeUrl(Request $request){
        $img = new Image();
        $img->name="image 1";
        $img->path=$request->image;
        $img->save();
        return redirect()
            ->route("displayImage",["id"=>$img->id]);
    }

    public function displayImage($id){
        $img = Image::find($id);
        return View("displayImage")->with("data",$img);
    }
}

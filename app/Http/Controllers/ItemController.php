<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    public function create(){
        return View("addItem");
    }

    public function list(){
        // select * from items
        $data = Item::all();
        return View("listItem",["data"=>$data]);
    }
    public function save(Request $request){
        $obj = new Item();
        $obj->name = $request->item_name;
        $obj->description = $request->item_description;
        $obj->price= $request->item_price;
        $obj->save();
        return redirect()->route("list");
    }
    public function show($id){
        // SELECT * FROM ITEMS WHERE ID = ?
        $obj = Item::findOrFail($id);
        return View("showItem")->with('data',$obj);
    }

    public function delete($id){
        $obj = Item::findOrFail($id);
        $obj->delete();
        return redirect()->route("list");
    }

    public function edit($id){
        $obj = Item::findOrFail($id);
        return View("editItem",compact("obj"));
    }

    public function update($id,Request $request){
        $obj = Item::findOrFail($id);
        $obj->name = $request->item_name;
        $obj->description = $request->item_description;
        $obj->price= $request->item_price;
        $obj->save();
        return redirect()->route("list");
    }
}

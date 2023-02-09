<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Accessory;

class AccessoryController extends Controller
{
    public function list($id=null){
        $accessory = $id?Accessory::find($id):Accessory::all();
        return response()->json([
            'accessory' => $accessory,
            'message' => 'success',
            'code' => 200
        ]);
    }

    public function add(Request $request){
        $accessory = new Accessory();
        $accessory->name = $request->name;
        $accessory->product_id = $request->product_id;
        $accessory->save();
        return response()->json([
            'accessory' => $accessory,
            'message'=>'Data added successfully'
        ]);

    }

    public function update(Request $request){
        $accessory = Accessory::find($request->id)->update([
            'name' => $request->name,
            'product_id' => $request->product_id
        ]);
        return response()->json([
            'accessory' => $accessory,
            'message' => 'success',
            'code' => 200
        ]);
    }

    public function delete($id){
        $accessory = Accessory::find($id);
        $accessory->delete();
        return ['message'=>'product with id '.$id. ' has been deleted'];
    }

    public function search($name){
        $accessory = Accessory::where('name','like','%'.$name.'%')->get();
        return $accessory;
    }
}

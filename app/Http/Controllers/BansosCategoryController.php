<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BansosCategory;
use Session;

class BansosCategoryController extends Controller
{
    public function index(){
        Session::put('menu','category');
        $data = BansosCategory::all();
        return view('dashboard.Category',compact('data'));
    } 
    public function create(Request $request){
        $data = new BansosCategory;
        $data->name_category=$request->name_category;
        $data->save();
        return redirect()->back();
    }
    public function update(Request $request,$id)
    {
        $data = BansosCategory::find($id);
        $data->name_category=$request->name_category;
        $data->save();
        return redirect()->back();
    }
    public function delete($id){
        BansosCategory::find($id)->delete();
        return redirect()->back();
    }
 }


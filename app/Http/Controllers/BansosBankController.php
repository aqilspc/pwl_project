<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BansosBank;
use Session;

class BansosBankController extends Controller
{
  public function __construct()
    {
        $this->middleware('auth');
    }
   public function index(){
    Session::put('menu','bank');
       $data = BansosBank::all();
       return view('dashboard.banks',compact('data'));
   } 

   public function create(Request $request){
    $data = new BansosBank;
    $data->name_bank=$request->name_bank;
    $data->no_rek=$request->no_rek;
    $data->an=$request->an;
    $data->save();
    return redirect()->back();
}
public function update(Request $request,$id)
{
    $data = BansosBank::find($id);
    $data->name_bank=$request->name_bank;
    $data->no_rek=$request->no_rek;
    $data->an=$request->an;
    $data->save();
    return redirect()->back();
}
public function delete($id){
    BansosBank::find($id)->delete();
    return redirect()->back();
}
}

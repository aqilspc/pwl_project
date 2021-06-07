<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BansosContributor;

class BansosContributorController extends Controller
{
    public function index(){
        $data = BansosContributor::all();
        return view('dashboard.index_contributor',compact('data'));
}
public function create(Request $request){
    $data = new BansosContribution;
    $data->user_id=$request->user_id;
    $data->name_contributor=$request->name_contributor;
    $data->phone_contributor=$request->phone_contributor;
    $data->address_contributor=$request->address_contributor;
    $data->save();
    return redirect()->back();
}
public function update(Request $request,$id)
{
    $data = BansosContribution::find($id);
    $data->user_id=$request->user_id;
    $data->name_contributor=$request->name_contributor;
    $data->phone_contributor=$request->phone_contributor;
    $data->address_contributor=$request->address_contributor;
    $data->save();
    return redirect()->back();
}
public function delete($id){
    BansosContribution::find($id)->delete();
    return redirect()->back();
}
}
}
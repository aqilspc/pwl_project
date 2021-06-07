<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\BansosItem;

class BansosItemController extends Controller
{
    public function index(){
        $data = BansosItem::all();
        return view('dashboard.donation',compact('data')); 
}
public function create(Request $request){
    $data = new BansosItem;
    $data->bansos_donation_id=$request->bansos_donation_id;
    $data->bansos_receiver_id=$request->bansos_receiver_id;
    $data->name_item=$request->name_item;
    $data->status_item=$request->status_item;
    $data->save();
    return redirect()->back();
}
public function update(Request $request,$id)
{
    $data = BansosItem::find($id);
    $data->bansos_donation_id=$request->bansos_donation_id;
    $data->bansos_receiver_id=$request->bansos_receiver_id;
    $data->name_item=$request->name_item;
    $data->status_item=$request->status_item;
    $data->save();
    return redirect()->back();
}
public function delete($id){
    BansosItem::find($id)->delete();
    return redirect()->back();
}
}
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BansosItem;
use Session;
class BansosItemController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(){
        Session::put('menu','transaction');
        $data = BansosItem::with('donation','contributor')->get();
        return view('dashboard.transactions',compact('data')); 
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


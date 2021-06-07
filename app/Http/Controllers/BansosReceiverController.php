<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BansosReceiver;
use Session;
class BansosReceiverController extends Controller
{
    public function index(){
        Session::put('menu','receiver');
        $data = BansosReceiver::all();
        return view('dashboard.index_receiver',compact('data'));
}
public function create(Request $request)
{
    $data = new BansosReceiver;
    //$data->code_receiver=$request->code_receiver;
    $data->name_receiver=$request->name_receiver;
    $data->phone_receiver=$request->phone_receiver;
    $data->address_receiver=$request->address_receiver;
    $data->save();
    return redirect()->back();
}
public function update(Request $request,$id)
{
    $data = BansosReceiver::find($id);
    //$data->code_receiver=$request->code_receiver;
    $data->name_receiver=$request->name_receiver;
    $data->phone_receiver=$request->phone_receiver;
    $data->address_receiver=$request->address_receiver;
    $data->save();
    return redirect()->back();
}
    public function delete($id)
    {
        BansosReceiver::find($id)->delete();
        return redirect()->back();
    }
}
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BansosDonation;

class BansosDonationController extends Controller
{
    public function index(){
        $data = BansosDonation::all();
        return view('dashboard.donation',compact('data'));
}
public function create(Request $request){
    $data = new BansosDonation;
    $data->bansos_category_id=$request->bansos_category_id;
    $data->bansos_contributor_id=$request->bansos_contributor_id;
    $data->name_donation=$request->name_donation;
    $data->total_donation=$request->total_donation;
    $data->date_donation=$request->date_donation;
    $data->save();
    return redirect()->back();
}
public function update(Request $request,$id)
{
    $data = BansosDonation::find($id);
    $data->bansos_category_id=$request->bansos_category_id;
    $data->bansos_contributor_id=$request->bansos_contributor_id;
    $data->name_donation=$request->name_donation;
    $data->total_donation=$request->total_donation;
    $data->date_donation=$request->date_donation;
    $data->save();
    return redirect()->back();
}
public function delete($id){
    BansosDonation::find($id)->delete();
    return redirect()->back();
}
}
}

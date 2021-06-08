<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BansosDonation;
use App\Models\BansosCategory;
use App\Models\BansosReceiver;
use Session;
class BansosDonationController extends Controller
{

    public function uploadFile(Request $request,$oke)
    {
            $result ='';
            $file = $request->file($oke);
            $name = $file->getClientOriginalName();
            // $tmp_name = $file['tmp_name'];

            $extension = explode('.',$name);
            $extension = strtolower(end($extension));

            $key = rand().'-'.$oke;
            $tmp_file_name = "{$key}.{$extension}";
            $tmp_file_path = "admin/images/cars/";
            $file->move($tmp_file_path,$tmp_file_name);
            // if(move_uploaded_file($tmp_name, $tmp_file_path)){
            $result = url('admin/images/cars').'/'.$tmp_file_name;
            // }
        return $result;
    }

    public function index()
    {
        Session::put('menu','donation');
        $data = BansosDonation::with('receiver','category')->get();
        $category = BansosCategory::all();
        $receiver = BansosReceiver::all();
        return view('dashboard.donation',compact('data','receiver','category'));
    }
    public function create(Request $request){
        $img = 'banner';
        $data = new BansosDonation;
        $data->bansos_banner = $this->uploadFile($request,$img);
        $data->bansos_category_id=$request->bansos_category_id;
        $data->bansos_receiver_id=$request->bansos_receiver_id;
        $data->name_donation=$request->name_donation;
        $data->total_donation=$request->total_donation;
        $data->date_donation=$request->date_donation;
        $data->save();
        return redirect()->back();
    }
    public function update(Request $request,$id)
    {
        $img = 'banner';
        $data = BansosDonation::find($id);
        if($request->file('banner')!=null)
        {
            $data->bansos_banner = $this->uploadFile($request,$img);
        }else
        {
            $data->bansos_banner = $request->old_banner;
        }
        $data->bansos_category_id=$request->bansos_category_id;
        $data->bansos_receiver_id=$request->bansos_receiver_id;
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


<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BansosContributor;
use App\Models\User;
use Session;

class BansosContributorController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(){
        Session::put('menu','contributor');
        $data = BansosContributor::with('user')->get();
        //
        return view('dashboard.index_contributor',compact('data'));
}
public function create(Request $request){

    $user = new User;
        $user->name = $request->name_contributor;
        $user->password = bcrypt($request->password);
        $user->role = 'donatur';
        $user->email = $request->email;
        $user->save();

        $contributor = new BansosContributor;
        $contributor->name_contributor = $request->name_contributor;
        $contributor->user_id = $user->id;
        $contributor->phone_contributor = $request->phone_number;
        $contributor->address_contributor = $request->address;
        $contributor->save();

    // $data = new BansosContributor;
    // $data->user_id=$request->user_id;
    // $data->name_contributor=$request->name_contributor;
    // $data->phone_contributor=$request->phone_contributor;
    // $data->address_contributor=$request->address_contributor;
    // $data->save();
    return redirect()->back();
}
public function update(Request $request,$id)
{
    $data = BansosContributor::find($id);
    $data->name_contributor=$request->name_contributor;
    $data->phone_contributor=$request->phone_number;
    $data->address_contributor=$request->address;
    $data->save();
    return redirect()->back();
}
public function delete($id){
    BansosContributor::find($id)->delete();
    return redirect()->back();
}
}

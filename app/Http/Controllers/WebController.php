<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\BansosContributor;
use App\Models\BansosDonation;
use App\Models\BansosItem;
use App\Models\User;
use Carbon\Carbon;
class WebController extends Controller
{
    public function log_out_admin(Request $request)
    {
        Auth::logout();
        return redirect('login');
    }

    public function log_out_customer(Request $request)
    {
        Auth::logout();
        return redirect('homepage');
    }

    public function index()
    {
        $total_donasi = [];
        $data_empat = BansosDonation::with('item','category')->orderBy('created_at','DESC')->limit(4)->get();
        //return $data_empat;
        foreach ($data_empat as $key => $value)
        {
            $cek = BansosItem::where('bansos_donation_id',$value->id)->first();
            $total = 0;
            if($cek)
            {
                foreach ($value->item as $keys => $values)
                {
                    $total += $values->total_item;
                }
                
                $total_donasi[$key] = $total;
            }else
            {
                $total_donasi[$key] = $total;
            }
        }
        $now = Carbon::now()->format('Y-m-d');
        
        return view('web.home',compact('data_empat','now','total_donasi'));
    }

    public function login_auth()
    {
        return view('web.login');
    }

    public function register_auth(Request $request)
    {
        //return $request;
        $user = new User;
        $user->name = $request->name;
        $user->password = bcrypt($request->password);
        $user->role = 'donatur';
        $user->email = $request->email;
        $user->save();

        $contributor = new BansosContributor;
        $contributor->name_contributor = $request->name;
        $contributor->user_id = $user->id;
        $contributor->phone_contributor = $request->phone_contributor;
        $contributor->address_contributor = $request->address_contributor;
        $contributor->save();

        $userlogin = User::find($user->id);
        Auth::login($userlogin);
        return redirect('home');
    }

    public function donateNow(Request $request,$id)
    {
        $contributor = BansosContributor::where('user_id',Auth::user()->id)->first();
        $data = new BansosItem;
        $data->bansos_donation_id = $id;
        $data->total_item = $request->total_item;
        $data->bansos_contributor_id = $contributor->id;
        $data->date=Carbon::now()->format('Y-m-d');
        $data->save();
        return redirect()->back()->with('success','Your dontaion succeed thanks for your donation!');
    }
}

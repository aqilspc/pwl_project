<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use Auth;
use DB;
use App\Models\BansosItem;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if(Auth::user()->role=='admin')
        {
           Session::put('menu','home');
           $donation = DB::table('bansos_donations')->count();
           $donatur = DB::table('bansos_contributors')->count();
           $receiver = DB::table('bansos_receivers')->count();
           $admin = DB::table('bansos_items')->count();
           return view('dashboard.home',compact('donation','donatur','receiver','admin')); 
        }else
        {
            return redirect('homepage');
        }
        
    }
    public function getDataDonor()
    {
        $data = BansosItem::with('donation','contributor')->get();
        return view('web.donation',compact('data'));
    }
}

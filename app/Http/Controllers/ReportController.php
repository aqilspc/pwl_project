<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BansosItem;
use Carbon\Carbon;
use Session;
use Auth;
use PDF;

class ReportController extends Controller
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
           Session::put('menu','report');
           $now=Carbon::now()->format('Y-m-d');
           return view('dashboard.report',compact('now')); 
        }else
        {
            return redirect('homepage');
        }
        
    }

    public function detail(Request $request)
    {
        $data=BansosItem::whenBetween([$request->start_date,$request->end_date])->get();
    }
}

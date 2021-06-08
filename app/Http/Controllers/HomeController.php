<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use Auth;
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
           return view('dashboard.home'); 
        }else
        {
            return redirect('homepage');
        }
        
    }
}

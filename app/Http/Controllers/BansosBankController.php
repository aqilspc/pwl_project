<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BansosBank;

class BansosBankController extends Controller
{
   public function index(){
       $data = BansosBank::all();
       return view('dashboard.banks',compact('data'));
   } 
}

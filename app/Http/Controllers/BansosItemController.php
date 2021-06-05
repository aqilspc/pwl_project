<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\BansosItem;

class BansosItemController extends Controller
{
    public function index(){
        $data = BansosItem::all();
        return view('dashboard.donation',compact('data')); 
}
}

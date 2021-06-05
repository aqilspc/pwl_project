<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\BansosReceiver;

class BansosReceiverController extends Controller
{
    public function index(){
        $data = BansosReceiver::all();
        return view('dashboard.index_receiver',compact('data'));
}
}
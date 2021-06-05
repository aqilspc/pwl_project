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
}

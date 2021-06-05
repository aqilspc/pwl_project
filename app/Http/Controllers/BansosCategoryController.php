<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BansosCategory;

class BansosCategoryController extends Controller
{
    public function index(){
        $data = BansosCategory::all();
        return view('dashboard.Category',compact('data'));
    } 
}

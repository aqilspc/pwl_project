<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BansosContributor;

class BansosContributorController extends Controller
{
    public function index(){
        $data = BansosContributor::all();
        return view('dashboard.index_contributor',compact('data'));
}
}
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
class UserController extends Controller
{
    public function log_out_admin(Request $request)
    {
        Auth::logout();
        return redirect('homepage');
    }

    public function log_out_customer()
    {
        Auth::logout();
        return redirect('homepage');
    }
}

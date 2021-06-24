<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function home(){
        if(Auth::check()){
            return redirect('/dashboard');
            // return view ("panel");
        }
        // return redirect ("login");

        return "Welcome to TBT";
    }

    public function dashboard() {
        if(Auth::check()){
            return view ("panel");
        }
        return redirect ("login");
    }
}

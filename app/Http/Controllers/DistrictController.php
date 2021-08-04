<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\District;

class DistrictController extends Controller
{
    public function index(){
        $test = district::where('district_id', 10)->first();
        dd($test);
    }
}

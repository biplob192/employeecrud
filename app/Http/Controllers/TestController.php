<?php

namespace App\Http\Controllers;
use App\Models\Ad;
use Exception;

use Illuminate\Http\Request;

class TestController extends Controller
{
    public function index(){
        return view("test");
    }

     public function ajaxcall(Request $req){
        try{
            $ad = Ad::where('gd_no',$req->gd_no)->first();
            if(!$ad){
                throw new Exception("GD-No not found");
            }
            return response()->json(array(
                'status' => true,
                'data' => $ad
            ));

        }
        catch(Exception $e){
            return response()->json(array(
            'status' => false,
            'status_msg' => $e->getMessage()
        ));

        }
    }
}




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

    public function apiHit(){
        $url = "http://dummy.restapiexample.com/api/v1/employees"; 
        $url = "http://127.0.0.1:8080/api/correspondents"; 
        $token = 'env('TOKEN')';  
        $authorization = "Authorization: Bearer ".$token; // Prepare the authorisation token
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json' , $authorization ));   
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);   
        curl_setopt($ch, CURLOPT_URL, $url);   
        $res = curl_exec($ch);
        $res = json_decode($res);
        if($res && $res->status == true){
            return $res;
        }else{
            $res = $this->apiLogin();
            $this->apiHit();
        }
        // 
        return $res;
    }

    protected function apiLogin(){
        $url = "http://127.0.0.1:8080/api/login"; 
        $token = env('TOKEN');  
        $login['email']    = 'shajib@gmail.com';
        $login['password'] = 'shajib';
        $login = json_encode($login);
        $authorization = "Authorization: Bearer ".$token; // Prepare the authorisation token
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json' , $authorization ));   
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);   
        curl_setopt($ch, CURLOPT_POSTFIELDS,$login);
        curl_setopt($ch, CURLOPT_URL, $url);   
        $res = curl_exec($ch);
        $res = json_decode($res);
        putenv('TOKEN='.$res->data->token);
        dd($res->data->token);
    }

    public function getRowsQuery(){
        return 123;
    }

    public function getCorres(){
         $query = Ad::query();
         // if(){
         //    $query->where('gd_no', 100);
         // }
         $query->where('gd_no', 100);
         $ad = $query->get();
        $ad = Ad::where('gd_no', 100)->first();
        return response()->json($ad);
    }
}




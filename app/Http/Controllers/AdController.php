<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ad;
use App\Models\AdsPrice;
use Validator;

class AdController extends Controller
{
    public function index(){ // show all ads list
        // return view('ads');
        $ad=Ad::all();
        return view ('ads',['ad'=>$ad]);
    }

    public function create(){ // show insert form
        return view('create_new_ad');
    }

    public function store(Request $req){ // store into database
        try{
        $validator  = Validator::make($req->all(), [
            'name' => 'required|max:50',            
            'ad_type' => 'required',            
            'ad_position' => 'required',            
           
            'extra_charge' => 'required',            
            'division' => 'required',            
            'district' => 'required',            
            'upazila' => 'required',            
            'client' => 'required',            
            'gd_no' => 'required',            
            'order_no' => 'required',            
            'inch' => 'required',            
            'colum' => 'required',            
            
                      
            'payment_status'  => 'required',            
        ]);

        if($validator ->fails()){
           return back()->withErrors($validator )->withInput();
        }
        $ads_price = AdsPrice::select('price')
                ->where([
                    'ads_type' => $req->ad_type,
                    'ads_position' => $req->ad_position
                ])->first();

        $total_size = $req->inch*$req->colum;      
        $amount = ($total_size*$ads_price->price)+$req->extra_charge;
        $ad= new Ad;
        $ad->correspondent_name =$req->name;
        $ad->ad_type            =$req->ad_type;
        $ad->rate               =$ads_price->price;
        $ad->extra_charge       =$req->extra_charge;
        $ad->division           =$req->division;
        $ad->district           =$req->district;
        $ad->upazila            =$req->upazila;
        $ad->client             =$req->client;
        $ad->gd_no              =$req->gd_no;
        $ad->order_no           =$req->order_no;
        $ad->inch               =$req->inch;
        $ad->colum              =$req->colum;
        $ad->total_size         =$total_size;
        $ad->amount             =$amount;
        $ad->payment_status     =$req->payment_status;
        $ad->save();
        return back();

        // Member::insert([
        //     'name'=> $req->staffname,
        //     'mobile'=> $req->mobileno
        // ]);
        // return redirect('/addstaff');
    }
    catch(Exception $e){
        return $e->getMessage();
    }
    }

    public function show($id){ // show single ad 
        return 'all list';
    }

    public function edit($id){ // show single ad  in edit form
        $ad=Ad::find($id);
        return view ('edit_ad',['ad'=>$ad]);
    }

    public function update(Request $req){ // edit single ad
        // return $req->input();
        $ad=Ad::find($req->id);
        if($req->name){
            $ad->correspondent_name=$req->name;
        }
        if($req->ad_type){
            $ad->ad_type=$req->ad_type;
        }
        if($req->rate){
            $ad->rate=$req->rate;
        }
        if($req->extra_charge){
            $ad->extra_charge=$req->extra_charge;
        }
        if($req->division){
            $ad->division=$req->division;
        }
        if($req->district){
            $ad->district=$req->district;
        }
        if($req->upazila){
            $ad->upazila=$req->upazila;
        }
        if($req->client){
            $ad->client=$req->client;
        }
        if($req->gd_no){
            $ad->gd_no=$req->gd_no;
        }
        if($req->order_no){
            $ad->order_no=$req->order_no;
        }
        if($req->inch){
            $ad->inch=$req->inch;
        }
        if($req->colum){
            $ad->colum=$req->colum;
        }
        if($req->total_size){
            $ad->total_size=$req->total_size;
        }
        if($req->amount){
            $ad->amount=$req->amount;
        }        
        if($req->payment_status == 1){
            $ad->payment_status=$req->payment_status;
        }
        if($req->payment_status == 0){
            $ad->payment_status=$req->payment_status;
        }
        
        $ad->save();
        return redirect('/ads');
    }

    public function delete($id){ // delete single ad
        $ad=Ad::find($id);
        $ad->delete();
        return back();
    }
}

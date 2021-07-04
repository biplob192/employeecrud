<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AdsPrice;
use Validator;

class AdsPriceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ad_prices=AdsPrice::all();
        return view ('admin.ads.ad_prices',['ad_prices'=>$ad_prices]);               
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.ads.create_ad_price');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $req)
    {
        try{
        $validator  = Validator::make($req->all(), [
            // unique:ads_price,ads_type
            'ad_type' => 'required',  
            'ad_position'  => 'required',
            'rate'  => 'filled',                   
        ]);

        if($validator ->fails()){
           return back()->withErrors($validator )->withInput();
        }

        AdsPrice::updateOrCreate(
            [
                'ads_type' =>  $req->ad_type,
                'ads_position' =>  $req->ad_position

            ], // finding condition

            [
                'ads_type'     => $req->ad_type,
                'ads_position' => $req->ad_position,
                'price'        => $req->rate
            ] // inserting data
        );
        return back(); 

        }
        catch(Exception $e){
            return $e->getMessage();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $ad_price=AdsPrice::find($id);
        return view ('admin.ads.edit_ad_price',['ad_price'=>$ad_price]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $req, $id)
    {
        $ad_price=AdsPrice::find($req->id);

        if($req->ad_type){
            $ad_price->ads_type=$req->ad_type;
        }
        if($req->ad_position){
            $ad_price->ads_position=$req->ad_position;
        }
        
        if($req->rate){
            $ad_price->price=$req->rate;
        }        
                
        $ad_price->save();
        return redirect('/ad_prices');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $price_id=AdsPrice::find($id);
        $price_id->delete();
        return back();
    }
}

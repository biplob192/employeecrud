<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cheque;
use App\Models\Ad;
use Validator;

class ChequeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cheques=Cheque::all();
        return view ('admin.cheques.cheques',['cheques'=>$cheques]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.cheques.create_new_cheque');
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
                'gd_no' => 'required',            
                'bank_name' => 'required',            
                'cheque_amount' => 'required',            
            ]);

            if($validator ->fails()){
               return back()->withErrors($validator )->withInput();
            }
            $ad = Ad::select('amount')->where(['gd_no' => $req->gd_no])->first();
            if($req->cheque_amount >= $ad->amount){
                // echo 'Payment suffecient';
         
                $ad->payment_status     = 1;
                $cheque = new Cheque;
                $cheque->gd_no          =$req->gd_no;
                $cheque->bank_name      =$req->bank_name;
                $cheque->cheque_amount  =$req->cheque_amount;
                $ad->save();
                $cheque->save();
                return back();
            }
            else{
                echo 'Payment not suffecient';
            }

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
        $cheque=Cheque::find($id);
        return view ('admin.cheques.edit_cheque',['cheque'=>$cheque]);
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
        $cheque=Cheque::find($id);
        if($req->gd_no){
            $cheque->gd_no=$req->gd_no;
        }
        if($req->bank_name){
            $cheque->bank_name=$req->bank_name;
        }
        if($req->cheque_amount){
            $cheque->cheque_amount=$req->cheque_amount;
        }
        $cheque->save();
        return redirect('/cheques');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cheque=Cheque::find($id);
        $cheque->delete();
        return back();
    }
}

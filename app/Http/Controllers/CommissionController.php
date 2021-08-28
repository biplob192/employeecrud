<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Commission;
use App\Models\CorrWallet;
use App\Models\Correspondent;
use Validator;
use Exception;

class CommissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $commissions=Commission::
        leftjoin('correspondents', 'commissions.correspondent', '=', 'correspondents.id')
        ->leftjoin('district_list', 'correspondents.district_id', '=', 'district_list.district_id')
        ->leftjoin('upazila_list', 'correspondents.upazila_id', '=', 'upazila_list.upazila_id')
        ->orderBy('commission_id', 'DESC')
        ->select('commissions.*', 'correspondents.name', 'upazila_list.upazila_name', 'district_list.district_name')
        ->get();

        $correspondents= Correspondent::select('id','name','upazila_name')
        ->leftjoin('upazila_list', 'correspondents.upazila_id', '=', 'upazila_list.upazila_id')
        ->get();
        // dd($cheques);
       
        return view ('admin.commissions.commissions',['commissions'=>$commissions, 'correspondents'=>$correspondents]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            'correspondent_id'      => 'required',            
            'commission_amount'     => 'required',            
        ]);

        if($validator ->fails()){
           return back()->withErrors($validator )->withInput();
        }
        // dd($req->all());
        $wallet     = CorrWallet::where('corr_id', $req->correspondent_id)->first();
        if (!$wallet) {
            throw new Exception("The correspondent have no wallet yet!");            
        }
        $credit     = $wallet->credit;
        if ($req->commission_amount > $credit) {
            throw new Exception('The amount is more than due commission!');
        }
        CorrWallet::where('corr_id', $req->correspondent_id)
        ->update(['credit' => $credit - $req->commission_amount]);
        // CorrWallet::where('corr_id', $req->correspondent_id)
        // ->decriment('credit',$req->commission_amount);

        $previous_amount            = $credit;
        $current_amount  = $credit-$req->commission_amount;

        $commission = new Commission;
        $commission->correspondent      =$req->correspondent_id;
        $commission->previous_amount  =$previous_amount;
        $commission->commission_amount  =$req->commission_amount;
        $commission->current_amount  =$current_amount;
        $commission->commission_amount  =$req->commission_amount;
        $commission->save();
        return back();
      }
        catch(Exception $e){          
            return back()->with('error', $e->getMessage())->withInput();
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $commission = Commission::find($id);
        // dd($commission->commission_amount);
        $wallet     = CorrWallet::where('corr_id', $commission->correspondent)->first();
        $credit     = $wallet->credit;
        $comm       = $commission->commission_amount;
        if ($commission->delete()) {
            CorrWallet::where('corr_id', $commission->correspondent)
            ->update(['credit' => $credit + $comm]);
        }
        return back();
    }
}

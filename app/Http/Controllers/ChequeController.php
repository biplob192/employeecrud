<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Correspondent;
use App\Models\CorrWallet;
use App\Models\Cheque;
use App\Models\Ad;
use App\Models\Log;
use Validator;
use Auth;
use Exception;
use Carbon\Carbon;
use DB;

class ChequeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function index()
    // {
    //     // $cheques=Cheque::all();
    //     $cheques=Cheque::
    //     leftjoin('ads', 'cheques.gd_no', '=', 'ads.gd_no')
    //     ->leftjoin('district_list', 'ads.district_id', '=', 'district_list.district_id')
    //     ->leftjoin('upazila_list', 'ads.upazila_id', '=', 'upazila_list.upazila_id')
    //     ->leftjoin('correspondents', 'cheques.correspondent_id', '=', 'correspondents.id')
    //     ->get();
    //     // dd($cheques);
    //     return view ('admin.cheques.cheques',['cheques'=>$cheques]);
    // }   

    public function index()
    {
        // $cheques=Cheque::all();
        $cheques=Cheque::
        leftjoin('ads', 'cheques.gd_no', '=', 'ads.gd_no')
        ->leftjoin('district_list', 'ads.district_id', '=', 'district_list.district_id')
        ->leftjoin('upazila_list', 'ads.upazila_id', '=', 'upazila_list.upazila_id')
        ->leftjoin('correspondents', 'cheques.correspondent_id', '=', 'correspondents.id')
        ->whereNull('cheques.deleted_at')
        ->get();
        // dd($cheques);
        return view ('admin.cheques.cheques',['cheques'=>$cheques]);
    } 

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $gd_no= Ad::select('gd_no')->where('payment_status', 0)->get();
        $correspondents= Correspondent::select('id','name','upazila_name')
        ->leftjoin('upazila_list', 'correspondents.upazila_id', '=', 'upazila_list.upazila_id')
        ->get();
        return view('admin.cheques.create_new_cheque')->with('gd_no', $gd_no)->with('correspondents', $correspondents);
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
                'cheque_amount' => 'required|between:3,10',            
                'cheque_number' => 'required',            
            ]);

            if($validator ->fails()){
               // return back()->withErrors($validator )->withInput();
                throw new Exception('$validation fails');                
            }
            $ads = Ad::select('amount','upazila_id')->where(['gd_no' => $req->gd_no])->first();
            
             if($req->cheque_amount < $ads->amount * 0.7){                          //Store Cheque Data with Condition
                throw new Exception('Cheque amount not sufficient!');
            }                  
            $cheque = new Cheque;
            $cheque->correspondent_id   =$req->correspondent_id;
            $cheque->gd_no              =$req->gd_no;
            $cheque->bank_name          =$req->bank_name;
            $cheque->cheque_amount      =$req->cheque_amount;
            $cheque->cheque_number      =$req->cheque_number;
            $cheque->ait_amount         =$ads->amount - $req->cheque_amount;

            if($ads->upazila_id == 494){
                $cheque->commission     =$req->cheque_amount * 0.35;
            }
            if($ads->upazila_id != 494){
                $cheque->commission     =$req->cheque_amount * 0.3;
            }
            $cheque->save();

                Ad::where('gd_no',$req->gd_no)->update(['payment_status' => 1]);    //Change Payment Status

                // $wallet     = new CorrWallet;                                       //Update Correspondent Commission
                // $credit     = $wallet->credit;
                // $credit     = CorrWallet::select('credit')->where('corr_id', $req->correspondent_id)->first();
                $wallet     = CorrWallet::where('corr_id', $req->correspondent_id)->first();
                $credit     = $wallet->credit;
                $comm       = $req->cheque_amount * 0.3;
                $commDhaka  = $req->cheque_amount * 0.35;
                if ($ads->upazila_id == 494) {
                    CorrWallet::where('corr_id', $req->correspondent_id)
                    ->update(['credit' => $credit + $commDhaka]);
                }else {              
                    CorrWallet::where('corr_id', $req->correspondent_id)
                    ->update(['credit' => $credit + $comm]);
                }

                log::insert([
                    'user_id'           => Auth::user()->id,
                    'data'              => json_encode($cheque),
                    'operation_type'    => 'Insert Cheque',
                ]);
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
        $cheque=Cheque::find($id);
        // $cheque=Cheque::where('cheque_id', $id)->first();
        // dd($cheque);
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
        // dd($req);
        // $cheque=Cheque::where('cheque_id', $req->id)->first();
        // dd($cheque);
        if($req->gd_no){
            $cheque->gd_no=$req->gd_no;
        }
        if($req->bank_name){
            $cheque->bank_name=$req->bank_name;
        }
        if($req->cheque_amount){
            $cheque->cheque_amount=$req->cheque_amount;
        }
        if($req->correspondent_id){
            $cheque->correspondent_id=$req->correspondent_id;
        }
        if($req->cheque_number){
            $cheque->cheque_number=$req->cheque_number;
        }
        if($req->ait_amount){
            $cheque->ait_amount=$req->ait_amount;
        }
        if($req->commission){
            $cheque->commission=$req->commission;
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
    // public function destroy($id)
    // {
    //     $cheque     =Cheque::find($id);
    //     $wallet     =CorrWallet::where('corr_id', $cheque->correspondent_id)->first();
    //     $credit     = $wallet->credit;
    //     $commission = $cheque->commission;
    //     if ($cheque->delete()) {
    //         CorrWallet::where('corr_id', $cheque->correspondent_id)
    //         ->update(['credit' => $credit - $commission]);

    //         Ad::where('gd_no',$cheque->gd_no)->update(['payment_status' => 0]);
    //     }
    //     return back();
    // }

     public function destroy($id)
    {
        $cheque     =Cheque::find($id);
        $wallet     =CorrWallet::where('corr_id', $cheque->correspondent_id)->first();
        $credit     = $wallet->credit;
        $commission = $cheque->commission;
        if ($cheque->update(['deleted_at' => Carbon::now()])) {
            CorrWallet::where('corr_id', $cheque->correspondent_id)
            ->update(['credit' => $credit - $commission]);

            Ad::where('gd_no',$cheque->gd_no)->update(['payment_status' => 0]);
        }
        log::insert([
            'user_id'           => Auth::user()->id,
            'data'              => json_encode($cheque),
            'operation_type'    => 'Delete Cheque',
        ]);
        return back();
    }

    public function getGdPrice(Request $req){
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

    public function indexCommission()
    {
        // $cheques=Cheque::all();
        $cheques=Cheque::
        leftjoin('ads', 'cheques.gd_no', '=', 'ads.gd_no')
        ->leftjoin('district_list', 'ads.district_id', '=', 'district_list.district_id')
        ->leftjoin('upazila_list', 'ads.upazila_id', '=', 'upazila_list.upazila_id')
        ->leftjoin('correspondents', 'cheques.correspondent_id', '=', 'correspondents.id')
        ->get();

        $correspondents= Correspondent::select('id','name','upazila_name')
        ->leftjoin('upazila_list', 'correspondents.upazila_id', '=', 'upazila_list.upazila_id')
        ->get();
        // dd($cheques);
        return view ('admin.commissions.commissions',['cheques'=>$cheques, 'correspondents'=>$correspondents]);
    }

    public function getCorrName(){ 
        try{
            // $correspondents= Correspondent::select('name')->get();
            $correspondents = DB::table("correspondents")
            ->pluck("name","id");
            
            if(!$correspondents){
                throw new Exception("Correspondents not found");
            }
            return response()->json($correspondents);

            // return response()->json(array(
            //     'status' => true,
            //     'data' => $correspondents
            // ));
        }
        catch(Exception $e){
            return response()->json(array(
                'status' => false,
                'status_msg' => $e->getMessage()
            ));

        }
    }
}

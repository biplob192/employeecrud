<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Correspondent;
use App\Models\CorrWallet;
use App\Models\Cheque;
use App\Models\Upazila;
use App\Models\Ad;
use App\Models\Log;
use Validator;
use Auth;
use Exception;
use Carbon\Carbon;
use DB;

class ChequeController extends Controller
{
    public function index()
    {
        $cheques=Cheque::select('cheques.cheque_id','cheques.gd_no','cheques.bank_name','cheques.cheque_amount','cheques.cheque_number','correspondents.name','upazila_list.upazila_name')       
        ->leftjoin('correspondents', 'cheques.correspondent_id', '=', 'correspondents.id')
        ->leftjoin('upazila_list', 'correspondents.upazila_id', '=', 'upazila_list.upazila_id')       
        ->whereNull('cheques.deleted_at')->orderBy('cheques.cheque_id','DESC')
        ->get();
        return view ('admin.cheques.cheques',['cheques'=>$cheques]);
    } 

    public function create()
    {
        $gd_no= Ad::select('gd_no')->where('payment_status', 0)->get();
        $upazilas = Upazila::get();
        $correspondents= Correspondent::select('id','name','upazila_name')
        ->leftjoin('upazila_list', 'correspondents.upazila_id', '=', 'upazila_list.upazila_id')
        ->get();
        return view('admin.cheques.create_new_cheque')->with('gd_no', $gd_no)
        ->with('correspondents', $correspondents)
        ->with('upazilas', $upazilas);
    }

    public function store(Request $req)
    {
        // dd($req->all());
          // Ads will not insert if Correspondent Previous Due not set.
        $wallet = CorrWallet::where('corr_id', $req->correspondent_id)->first();
        if($wallet->previous_due == null){
            Return "You have not set 'Previous Due Amount' for this correspondent. Please set the 'Previous Due Amount' first.";
        }

        try{
            $cheque     = new Cheque;
            $upazila_id = 0;
            $corr_id    = 0;
            $ait_amount = 0;

            if($req->gd_no != 'previous_ad'){
                $validator  = Validator::make($req->all(), [
                    'gd_no' => 'required',            
                    'bank_name' => 'required',            
                    'cheque_amount' => 'required|between:3,10',            
                    'cheque_number' => 'required|unique:cheques,cheque_number',            
                ]);

                if($validator ->fails()){
                    throw new Exception('$validation fails');                
                }
                $ads = Ad::select('amount','upazila_id','ad_type')->where(['gd_no' => $req->gd_no])->first();

                if($req->cheque_amount < $ads->amount * 0.7){        //Store Cheque Data with Condition
                    throw new Exception('Cheque amount not sufficient!');
                }
                $upazila_id = $ads->upazila_id;
                $ads_type   = $ads->ad_type;    
                $corr_id    = $req->correspondent_id;    
                $ait_amount = $ads->amount - $req->cheque_amount;             
            }

            if($req->gd_no == 'previous_ad'){
                $validator  = Validator::make($req->all(), [
                    'gd_no'         => 'required', 
                    'correspondents'=> 'required',            
                    'ad_type'       => 'required',            
                    'upazila'       => 'required',            
                    'bank_name'     => 'required',            
                    'cheque_amount' => 'required|between:3,10',            
                    'cheque_number' => 'required',            
                ]);

                if($validator ->fails()){
                    throw new Exception('$validation fails');                
                }
                $upazila_id = $req->upazila;
                $corr_id    = $req->correspondents; 

                $due            = CorrWallet::where('corr_id', $corr_id)->first();
                $due_balance    = $due->previous_due;
                // $cheque_balance = $req->cheque_amount;
                $ads_type       = $req->ad_type;
                CorrWallet::where('corr_id', $corr_id)->update(['previous_due' => $due_balance - $req->cheque_amount]); 
            }
           
            $cheque->correspondent_id   = $corr_id;
            $cheque->gd_no              = $req->gd_no;
            $cheque->ait_amount         = $ait_amount;
            $cheque->bank_name          = $req->bank_name;
            $cheque->cheque_amount      = $req->cheque_amount;
            $cheque->cheque_number      = $req->cheque_number;
            if($upazila_id == 494 && $ads_type != 'Private'){
                $cheque->commission     = $req->cheque_amount * 0.35;
                $cheque->percentage     = 35;
            }
            if($upazila_id != 494 && $ads_type != 'Private'){
                $cheque->commission     = $req->cheque_amount * 0.3;
                $cheque->percentage     = 30;
            }
            if($ads_type == 'Private'){
                $cheque->commission     = 0;
                $cheque->percentage     = 0;
            } 

            $cheque->save();

            if($req->gd_no != 'previous_ad'){
                Ad::where('gd_no',$req->gd_no)->update(['payment_status' => 1]);    //Change Payment Status
            }
             
            $wallet     = CorrWallet::where('corr_id', $corr_id)->first(); //Update Commission
            $credit     = $wallet->credit;
            $comm       = $cheque->commission;
            // dd($comm);
            CorrWallet::where('corr_id', $corr_id)->update(['credit' => $credit + $comm]);

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


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        $cheque = Cheque::find($id);
        $correspondent = Correspondent::select('name', 'upazila_name')
        ->leftjoin('upazila_list', 'correspondents.upazila_id', '=', 'upazila_list.upazila_id')
        ->where('id', $cheque->correspondent_id)->first(); 
        // $cheque=Cheque::where('cheque_id', $id)->first();
        // dd($cheque);
        return view ('admin.cheques.edit_cheque',['cheque'=>$cheque, 'correspondent'=>$correspondent]);
    }


    public function update(Request $req, $id)
    {
        $cheque=Cheque::find($id);

        if($req->gd_no){
            $cheque->gd_no=$req->gd_no;
        }
        if($req->bank_name){
            $cheque->bank_name=$req->bank_name;
        }
        if($req->cheque_amount && $cheque->cheque_amount!=$req->cheque_amount){
            $gd_no = $cheque->gd_no;
            if($gd_no!='previous_ad'){
                $ad_amount=Cheque::select('ads.amount')       
                ->leftjoin('ads', 'cheques.gd_no', '=', 'ads.gd_no')
                ->get();

                if($req->cheque_amount < $ad_amount * 0.7){
                    throw new Exception('Cheque amount not sufficient!');
                }
            }
            $pre_commission = $cheque->commission;
            $amount= $req->cheque_amount;
            $percentage = $cheque->percentage/100;
            $commission = $amount * $percentage;
            $cheque->commission=$commission;
            $cheque->cheque_amount=$req->cheque_amount;

            if($pre_commission>$commission){
                $minus = $pre_commission-$commission;
                $wallet     = CorrWallet::where('corr_id', $cheque->correspondent_id)->first(); //Update Commission
                $credit     = $wallet->credit;
                CorrWallet::where('corr_id', $cheque->correspondent_id)->update(['credit' => $credit - $minus]);
            }
            if($pre_commission<$commission){
                $add        = $commission-$pre_commission;
                $wallet     = CorrWallet::where('corr_id', $cheque->correspondent_id)->first(); //Update Commission
                $credit     = $wallet->credit;
                CorrWallet::where('corr_id', $cheque->correspondent_id)->update(['credit' => $credit + $add]);
            }
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
        log::insert([
            'user_id'           => Auth::user()->id,
            'data'              => json_encode($cheque),
            'operation_type'    => 'Update Cheque',
        ]);
        return redirect('/cheques');
    }

     public function destroy($id)
    {
        $cheque     =Cheque::find($id);
        $wallet     =CorrWallet::where('corr_id', $cheque->correspondent_id)->first();
        $credit     = $wallet->credit;
        $commission = $cheque->commission;

        if ($cheque->update(['deleted_at' => Carbon::now()])) {
            CorrWallet::where('corr_id', $cheque->correspondent_id)->update(['credit' => $credit - $commission]);

            Ad::where('gd_no',$cheque->gd_no)->update(['payment_status' => 0]);

            if($cheque->gd_no == 'previous_ad'){
                $new_wallet_due = $wallet->previous_due + $cheque->cheque_amount;
                CorrWallet::where('corr_id', $cheque->correspondent_id)->update(['previous_due' => $new_wallet_due]);
            } 
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

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\member;
use App\Models\CorrWallet;
use App\Models\Correspondent;
use App\Models\Ad;
use App\Models\Cheque;
use App\Models\Commission;
use App\Models\Log;
use App\Models\Division;
use App\Models\District;
use App\Models\Upazila;
use Validator;
use Exception;
use Auth;
use DB;

class CorrespondentController extends Controller
{
    public function index(){ // show all correspondent list
        // $correspondent=Correspondent::all();
        // $correspondent=DB::table('correspondents')
        //     ->leftjoin('district_list', 'correspondents.district_id', '=', 'district_list.district_id')
        //     ->leftjoin('upazila_list', 'correspondents.upazila_id', '=', 'upazila_list.upazila_id')
        //     ->get();
        $correspondent=Correspondent::
            leftjoin('division_list', 'correspondents.division_id', '=', 'division_list.division_id')
            ->leftjoin('district_list', 'correspondents.district_id', '=', 'district_list.district_id')
            ->leftjoin('upazila_list', 'correspondents.upazila_id', '=', 'upazila_list.upazila_id')->orderBy('name')
            ->get();
        // $correspondentCount=Correspondent::all()->count();
        $correspondentCount=$correspondent->count();
        // $correspondents = Correspondent::where('id', '<=', $correctedComparisons)->get();
        // $correspondentCount = $correspondents->count();
        return view ('admin.correspondents.correspondents',['correspondent'=>$correspondent],['correspondentCount'=>$correspondentCount]);
    }

    public function indexWallets(){
        $wallets=CorrWallet::
            leftjoin('correspondents', 'corr_wallets.corr_id', '=', 'correspondents.id')
            ->leftjoin('district_list', 'correspondents.district_id', '=', 'district_list.district_id')
            ->leftjoin('upazila_list', 'correspondents.upazila_id', '=', 'upazila_list.upazila_id')->orderBy('name')
            ->get();

        $correspondents= Correspondent::select('id','name','upazila_name')
        ->leftjoin('upazila_list', 'correspondents.upazila_id', '=', 'upazila_list.upazila_id')
        ->get();

        return view ('admin.correspondents.wallets',['wallets'=>$wallets, 'correspondents'=>$correspondents]);
    }

    public function overwriteWallet(Request $req){
        try{
            $validator  = Validator::make($req->all(), [
                'update_list'      => 'required',
                'corr_name2'       => 'filled',
                'amount'           => 'filled',
            ]);

            if($validator ->fails()){
               return back()->withErrors($validator )->withInput();
            }

            if($req->update_list==1){
                $update['previous_due'] = $req->amount;
            } elseif ($req->update_list==2){
                $update['credit'] = $req->amount;
            }

            $overwriteWallet = CorrWallet::updateOrCreate(
                ['corr_id' => $req->corr_name2],
                $update
            );

            Log::insert([
                'user_id'           => Auth::user()->id,
                'data'              => json_encode($overwriteWallet),
                'operation_type'    => 'Overwrite Wallet',
            ]);
            return back();

        }
        catch(Exception $e){
            return $e->getMessage();
        }
    }

    // public function overwriteWallet(Request $req){
    //     try{
    //         $validator  = Validator::make($req->all(), [
    //             'update_list'      => 'required',
    //             'corr_name2'       => 'filled',
    //             'amount'           => 'filled',
    //         ]);

    //         if($validator ->fails()){
    //            return back()->withErrors($validator )->withInput();
    //         }

    //         if($req->update_list==1){
    //             $update['previous_due'] = $req->amount;
    //         } elseif ($req->update_list==2){
    //             $update['credit'] = $req->amount;
    //         }
    //         $overwriteWallet = CorrWallet::where('corr_id', $req->corr_name2)->update($update);

    //         Log::insert([
    //             'user_id'           => Auth::user()->id,
    //             'data'              => json_encode($overwriteWallet),
    //             'operation_type'    => 'Overwrite Wallet',
    //         ]);
    //         return back();

    //     }
    //     catch(Exception $e){
    //         return $e->getMessage();
    //     }
    // }

    public function create(){ // show insert form
        // $division_names= Division::select('division_name')->get();
        $divisions= Division::all();
        return view ('admin.correspondents.new_correspondent')->with('divisions',$divisions);
    }

    public function store(Request $req){ // store into database
        try{
        $validator  = Validator::make($req->all(), [
            'name'              => 'required|unique:correspondents,name|max:50',
            'district'          => 'filled',
            'upazila'           => 'filled',
            'mobile'            => 'required|unique:correspondents,mobile|size:11',
            // 'nid'               => 'required|unique:correspondents,nid',
            // 'corrid'            => 'required|unique:correspondents,corrid',
            // 'email'             => 'required',
            // 'appointed_date'    => 'required',

        ]);

        if($validator ->fails()){
           return back()->withErrors($validator )->withInput();
        }

        // $correspondent= new Correspondent;
        // $correspondent->name=$req->name;
        // $correspondent->division_id=$req->div_name;
        // $correspondent->district_id=$req->district;
        // $correspondent->upazila_id=$req->upazila;
        // $correspondent->mobile=$req->mobile;
        // $correspondent->nid=$req->nid;
        // $correspondent->corrid=$req->corrid;
        // $correspondent->email=$req->email;
        // $correspondent->appointed_date=$req->appointed_date;
        // $correspondent->image=$req->image;
        // $correspondent->save();
        $correspondent['name']=$req->name;
        $correspondent['division_id']=$req->div_name;
        $correspondent['district_id']=$req->district;
        $correspondent['upazila_id']=$req->upazila;
        $correspondent['mobile']=$req->mobile;
        $correspondent['nid']=$req->nid;
        $correspondent['corrid']=$req->corrid;
        $correspondent['email']=$req->email;
        $correspondent['appointed_date']=$req->appointed_date;
        $correspondent['image']=$req->image;
        $corr = Correspondent::create($correspondent);
        CorrWallet::create([
            'corr_id'   => $corr->id,
            'credit'    => $req->initial_balance
        ]);
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

    public function show($id){ // show single correspondent
        $correspondent=Correspondent::
        leftjoin('division_list', 'correspondents.division_id', '=', 'division_list.division_id')
        ->leftjoin('district_list', 'correspondents.district_id', '=', 'district_list.district_id')
        ->leftjoin('upazila_list', 'correspondents.upazila_id', '=', 'upazila_list.upazila_id')->find($id);
        // return $employee;
        return view ('admin.correspondents.correspondent',['correspondent'=>$correspondent]);
    }

    public function edit($id){ // show single correspondent  in edit form
        $correspondent=Correspondent::find($id);
        $upazilas= Upazila::select('upazila_name','upazila_id')->get();
        $districts= District::select('district_name','district_id')->get();
        $divisions= Division::select('division_name','division_id')->get();
        return view ('admin.correspondents.editcorrespondent',['upazilas'=>$upazilas, 'districts'=>$districts, 'divisions'=>$divisions,'correspondent'=>$correspondent]);
    }

    public function update(Request $req){ // edit single correspondent
        // return $req->input();
        $validator  = Validator::make($req->all(), [
            'mobile'            => 'size:11',
            'name'              => 'max:50',
        ]);

        if($validator ->fails()){
           return back()->withErrors($validator )->withInput();
        }
        $correspondent=Correspondent::find($req->id);
        // $updatedata=Member::find($req->id);
        if($req->name != $correspondent->name){
            if (!Correspondent::where('name',$req->name)->first()) {
                $correspondent->name=$req->name;
            }
        }
        if($req->division){
            $correspondent->division_id=$req->division;
        }
        if($req->district){
            $correspondent->district_id=$req->district;
        }
        if($req->upazila){
            $correspondent->upazila_id=$req->upazila;
        }
        if($req->mobile != $correspondent->mobile){
            if (!Correspondent::where('mobile',$req->mobile)->first()) {
                $correspondent->mobile=$req->mobile;
            }
        }
        if($req->email != $correspondent->email){
            if (!Correspondent::where('email',$req->email)->first()) {
                $correspondent->email=$req->email;
            }
        }
        if($req->nid){
            $correspondent->nid=$req->nid;
        }
        if($req->corrid){
            $correspondent->corrid=$req->corrid;
        }
        if($req->appointed_date){
            $correspondent->appointed_date=$req->appointed_date;
        }
        if($req->image){
            $correspondent->image=$req->image;
        }

        $correspondent->save();

        log::insert([
            'user_id'           => Auth::user()->id,
            'data'              => json_encode($correspondent),
            'operation_type'    => 'Update Correspondent',
        ]);
        return redirect('/correspondents');
    }

    public function delete($id){ // delete single correspondent
        $correspondent=Correspondent::find($id);
        $correspondent->delete();
        return back();
    }

    public function getDistrict(Request $request)
     {
        $districts = DB::table("district_list")
        ->where("division_id",$request->division_id)
        ->pluck("district_name","district_id");
        return response()->json($districts);
     }

     public function getUpazila(Request $request)
     {
        $upazilas = DB::table("upazila_list")
        ->where("district_id",$request->district_id)
        ->pluck("upazila_name","upazila_id");
        return response()->json($upazilas);
     }

     public function correspondentReport(Request $req) {
        $duration = 'All time report';
        if(Auth::check()){
            $status = $req->filled('payment_status') ? $req->payment_status : 4;
            $count          = 0;
            $totalPaid      = 0;
            $countPaid      = 0;
            $totalUnPaid    = 0;
            $countUnPaid    = 0;
            $totalSize      = 0;
            $total          = 0;
            $ad             = [];
            $chequeCount    = 0;
            $chequeAmount   = 0;

            if($status != 4 || $req->payment_status || $req->corr_id){
                $dates = [];
                if($req->filled('from')){
                    $date = explode(' - ',$req->from);
                    $from = $date[0];
                    $to = $date[1];
                    $from = date('Y-m-d', strtotime($from));
                    $to = date('Y-m-d', strtotime($to));
                    $dates = [$from.' 00:00:00',$to.' 23:59:59'];
                    $duration = $req->from;
                }

                $ad=Ad::whereStatus($status)
                ->leftjoin('district_list', 'ads.district_id', '=', 'district_list.district_id')
                ->leftjoin('upazila_list', 'ads.upazila_id', '=', 'upazila_list.upazila_id')
                ->whereNull('ads.deleted_at')
                ->when($req->corr_id , fn($query) => $query->where("ads.correspondent_id", $req->corr_id))
                ->when(count($dates) > 0, function($query) use ($dates ) {
                    return $query->whereBetween('ads.created_at',$dates);
                })
                ->get();

                $wallet = CorrWallet::where('corr_id', $req->corr_id)->first();

                // $ad->toArray();
                // dd($ad[0]->amount);

                $cheque = Cheque::where('correspondent_id', $req->corr_id)
                ->when(count($dates) > 0, function($query) use ($dates ) {
                    return $query->whereBetween('created_at',$dates);
                })->get();

                $commission = Commission::where('correspondent', $req->corr_id)
                ->when(count($dates) > 0, function($query) use ($dates ) {
                    return $query->whereBetween('created_at',$dates);
                })->get();

                $total_comm     = $commission->sum('commission_amount');
                $last_comm      = $commission->sortByDesc('created_at')->first();

                $count          = $ad->count();
                $total          = $ad->sum('amount');
                $totalPaid      = $ad->where('payment_status', 1)->sum('amount');
                $countPaid      = $ad->where('payment_status', 1)->count();
                $totalUnPaid    = $ad->where('payment_status', 0)->sum('amount');
                $countUnPaid    = $ad->where('payment_status', 0)->count();
                $totalSize      = $ad->sum('total_size');

                $chequeAmount   = $cheque->sum('cheque_amount');
                $chequeCount    = $cheque->count();

                // session()->flush();
                session([
                    'count'         => $count,
                    'total'         => $total,
                    'totalPaid'     => $totalPaid,
                    'countPaid'     => $countPaid,
                    'totalUnPaid'   => $totalUnPaid,
                    'countUnPaid'   => $countUnPaid,
                    'totalSize'     => $totalSize,
                    'chequeAmount'  => $chequeAmount,
                    'chequeCount'   => $chequeCount,
                    'duration'      => $duration,
                    'ad'            => $ad,
                    'corr_id'       => $req->corr_id,
                    'previous_due'  => $wallet->previous_due,
                    'credit'        => $wallet->credit,
                    'last_comm'     => $last_comm,
                    'total_comm'    => $total_comm,
                ]);
            }

            // $totalPaid and $chequeAmount are not same, although they should be same.
            return view ('admin.reports.correspondent_report',['ad'=>$ad, 'totalPaid'=>$totalPaid, 'totalUnPaid'=>$totalUnPaid, 'count'=>$count, 'totalSize'=>$totalSize, 'countPaid'=>$countPaid, 'countUnPaid'=>$countUnPaid,  'duration'=>$duration, 'total'=>$total, 'chequeCount'=> $chequeCount, 'chequeAmount'=> $chequeAmount, 'corr_id'=>$req->corr_id,]);
        }
        return redirect ("login");
    }
}

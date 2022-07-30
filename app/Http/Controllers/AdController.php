<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ad;
use App\Models\CorrWallet;
use App\Models\Member;
use App\Models\Employee;
use App\Models\Correspondent;
use App\Models\Division;
use App\Models\District;
use App\Models\Upazila;
use App\Models\AdsPrice;
use App\Models\Log;
use Carbon\Carbon;
use Validator;
use Exception;
use DB;
use Auth;
use App\Exports\AdsExport;
use Maatwebsite\Excel\Facades\Excel;

class AdController extends Controller
{
    public function index(Request $req){ // show all ads list
        if(!$req->from){
            $ad=Ad::
            leftjoin('district_list', 'ads.district_id', '=', 'district_list.district_id')
            ->leftjoin('upazila_list', 'ads.upazila_id', '=', 'upazila_list.upazila_id')
            ->get();
            $count=$ad->count();
            $totalPaid=$ad->where('payment_status', 1)->sum('amount');
            $totalUnPaid=$ad->where('payment_status', 0)->sum('amount');
        }else{
            $date = explode(' - ',$req->from);
            $from = $date[0];
            $to = $date[1];
            $ad=Ad::
            leftjoin('district_list', 'ads.district_id', '=', 'district_list.district_id')
            ->leftjoin('upazila_list', 'ads.upazila_id', '=', 'upazila_list.upazila_id')
            ->where('ads.created_at', '>=', date('Y-m-d', strtotime($from)).' 00:00:00')
            ->where('ads.created_at', '<=', date('Y-m-d', strtotime($to)).' 23:59:59')->get();
            $count=$ad->count();
            $totalPaid=$ad->where('payment_status', 1)->sum('amount');

            $totalUnPaid=$ad->where('payment_status', 0)->sum('amount');

        }
        return view ('admin.ads.ads',['ad'=>$ad, 'totalpaid' =>$totalPaid, 'totalunpaid' =>$totalUnPaid, 'count' =>$count]);
    }

    public function indexV2(Request $req){
        $dates = [];
        if($req->filled('from')){
            $date = explode(' - ',$req->from);
            $from = $date[0];
            $to = $date[1];
            $from = date('Y-m-d', strtotime($from));
            $to = date('Y-m-d', strtotime($to));
            $dates = [$from.' 00:00:00',$to.' 23:59:59'];
        }

        $status = $req->filled('payment_status') ? $req->payment_status : 4;

        // $ad=Ad::
        // leftjoin('district_list', 'ads.district_id', '=', 'district_list.district_id')
        // ->leftjoin('upazila_list', 'ads.upazila_id', '=', 'upazila_list.upazila_id')
        // ->whereNull('ads.deleted_at')
        // ->when($status == 0 || $status ==1 , fn($query) =>
        //     $query->where('ads.payment_status',$status))
        // ->when($status ==2 , fn($query) => $query->where('ads.upazila_id', 494))
        // ->when($status ==3, fn($query) => $query->where('ads.upazila_id','<>', 494))
        // ->when(count($dates) > 0, function($query) use ($dates ) {
        //     return $query->whereBetween('ads.created_at',$dates);
        // })
        // ->when($req->corr_id , fn($query) => $query->where("ads.correspondent_id", $req->corr_id))
        // ->get();

        $ad=Ad::whereStatus($status)
        ->leftjoin('district_list', 'ads.district_id', '=', 'district_list.district_id')
        ->leftjoin('upazila_list', 'ads.upazila_id', '=', 'upazila_list.upazila_id')
        ->whereNull('ads.deleted_at')
        ->when($req->corr_id , fn($query) => $query->where("ads.correspondent_id", $req->corr_id))
        ->when(count($dates) > 0, function($query) use ($dates ) {
            return $query->whereBetween('ads.created_at',$dates);
        })
        ->get();

        $count=$ad->count();
        $totalPaid=$ad->where('payment_status', 1)->sum('amount');
        $countPaid=$ad->where('payment_status', 1)->count();
        $totalUnPaid=$ad->where('payment_status', 0)->sum('amount');
        $countUnPaid=$ad->where('payment_status', 0)->count();
        $totalSize=$ad->sum('total_size');
        return view ('admin.ads.ads',['ad'=>$ad, 'totalpaid' =>$totalPaid, 'totalunpaid' =>$totalUnPaid, 'count' =>$count, 'totalSize' =>$totalSize, 'countPaid' => $countPaid, 'countUnPaid' => $countUnPaid]);
    }

    public function create(){ // show insert form
        // $correspondents= Correspondent::select('name','upazila_id')->get();
        $correspondents= Correspondent::select('name','upazila_name')
        ->leftjoin('upazila_list', 'correspondents.upazila_id', '=', 'upazila_list.upazila_id')
        ->get();
        $division_names= Division::select('division_name')->get();
        $district_names= District::select('district_name')->get();
        $upazila_names= Upazila::select('upazila_name','upazila_id')->get();
        return view('admin.ads.create_new_ad')->with('correspondents', $correspondents)
        ->with('division_names',$division_names)->with('district_names',$district_names)->with('upazila_names',$upazila_names);
    }

    public function store(Request $req){
        // Ads will not insert if Correspondent Previous Due not set.
        // $wallet = CorrWallet::where('corr_id', $req->corr_id)->first();
        // if($wallet->previous_due == null){
        //     Return "You have not set 'Previous Due Amount' for this correspondent. Please set the 'Previous Due Amount' first.";
        // }
        try{
            $validator  = Validator::make($req->all(), [
                'corr_name'         => 'required|max:50',
                'corr_id'           => 'required',
                'ad_type'           => 'required',
                'ad_position'       => 'required',
                'div_id'            => 'required',
                'dist_id'           => 'required',
                'upazila_id'        => 'required',
                'client'            => 'required',
                'gd_no'             => 'required|unique:ads,gd_no',
                'order_no'          => 'required',
                'order_date'        => 'required',
                'inch'              => 'required',
                'colum'             => 'required',
                'payment_status'    => 'required',
                'calculation_type'  => 'required',
            ]);

            if($validator ->fails()){
                return back()->withErrors($validator )->withInput();
            }

            $total_size = $req->inch*$req->colum;
            $ads_price = AdsPrice::select('price')->where([
                'ads_type'      => $req->ad_type,
                'ads_position'  => $req->ad_position
            ])->first();

            if($req->calculation_type == 'regular'){
                $validator2  = Validator::make($req->all(), [
                    'extra_charge'   => 'required',
                ]);

                if($validator2 ->fails()){
                    return back()->withErrors($validator2 )->withInput();
                }

                $extra_charge = $req->extra_charge;
                $final_amount = ($total_size*$ads_price->price)+$req->extra_charge;
                $custom_amount = 0;
                $custom_commission = 0;

                if($req->ad_position == 'Inner_Color'){
                    $final_amount = $final_amount + ($final_amount * 0.45);
                }
                else if($req->ad_position == 'Front Page'){
                    $final_amount = ($final_amount * 2) + (($final_amount * 2) * 0.45);
                }
                else if($req->ad_position == 'Back Page'){
                    $final_amount = ($final_amount + ($final_amount * 0.50)) + ($final_amount + ($final_amount * 0.50)) * 0.45;
                }
            }

           if($req->calculation_type == 'custom'){
               $validator3  = Validator::make($req->all(), [
                    'custom_commission' => 'required',
                    'custom_charge'     => 'required',
                ]);

                if($validator3 ->fails()){
                    return back()->withErrors($validator3 )->withInput();
                }

                $extra_charge = 0;
                $final_amount = $req->custom_charge;
                $custom_amount = $req->custom_charge;
                $custom_commission = $req->custom_commission;
           }

           $ad= new Ad;
           $ad->correspondent_name =$req->corr_name;
           $ad->correspondent_id   =$req->corr_id;
           $ad->ad_type            =$req->ad_type;
           $ad->rate               =$ads_price->price;
           $ad->extra_charge       =$extra_charge;
           $ad->division_id        =$req->div_id;
           $ad->district_id        =$req->dist_id;
           $ad->upazila_id         =$req->upazila_id;
           $ad->client             =$req->client;
           $ad->gd_no              =$req->gd_no;
           $ad->order_no           =$req->order_no;
           $ad->order_date         =$req->order_date;
           $ad->inch               =$req->inch;
           $ad->ad_position        =$req->ad_position;
           $ad->colum              =$req->colum;
           $ad->total_size         =$total_size;
           $ad->amount             =$final_amount;
           $ad->custom_commission  =$custom_commission;
           $ad->custom_amount      =$custom_amount;
           $ad->payment_status     =$req->payment_status;
           $ad->publishing_date    =$req->publishing_date;
           $ad->calculation_type   =$req->calculation_type;
           $ad->save();
           log::insert([
            'user_id'           => Auth::user()->id,
            'data'              => json_encode($ad),
            'operation_type'    => 'Insert Ad',
        ]);
           return back();
       }
       catch(Exception $e){
        return $e->getMessage();
    }
}

    // show single ad
    public function show($id){
        $ad=Ad::find($id);
        $upazila= Upazila::select('upazila_name')->where('upazila_id', $ad->upazila_id)->first();
        $district= District::select('district_name')->where('district_id', $ad->district_id)->first();
        return view ('admin.prints.print_bill_pre',['ad'=>$ad, 'upazila'=>$upazila, 'district'=>$district]);
    }

    public function edit($id){ // show single ad  in edit form
        $ad=Ad::find($id);
        $upazilas= Upazila::select('upazila_name','upazila_id')->get();
        $districts= District::select('district_name','district_id')->get();
        $divisions= Division::select('division_name','division_id')->get();
        $correspondents= Correspondent::select('name','id','upazila_name')
        ->leftjoin('upazila_list', 'correspondents.upazila_id', '=', 'upazila_list.upazila_id')
        ->get();
        return view ('admin.ads.edit_ad',['ad'=>$ad, 'upazilas'=>$upazilas, 'districts'=>$districts, 'divisions'=>$divisions, 'correspondents'=>$correspondents]);
    }

    public function update(Request $req){ // edit single ad
        // return $req->input();
        $ad =Ad::find($req->id);

        if($req->inch && $req->colum){
            $ads_price = AdsPrice::select('price')
            ->where([
                'ads_type' => $req->ad_type,
                'ads_position' => $req->ad_position
            ])->first();

            $total_size = $req->inch*$req->colum;
            $final_amount = ($total_size*$ads_price->price)+$req->extra_charge;

            $ad->total_size = $total_size;
            $ad->amount= $final_amount;
            $ad->inch = $req->inch;
            $ad->colum = $req->colum;
            $ad->rate =$ads_price->price;
        }

        if($req->corr_name){
            $ad->correspondent_name=$req->corr_name;
        }
        if($req->corr_id){
            $ad->correspondent_id=$req->corr_id;
        }
        if($req->ad_type){
            $ad->ad_type=$req->ad_type;
        }
        if($req->ad_position){
            $ad->ad_position=$req->ad_position;
        }
        if($req->publishing_date){
            $ad->publishing_date=$req->publishing_date;
        }
        if($req->extra_charge){
            $ad->extra_charge=$req->extra_charge;
        }
        if($req->division){
            $ad->division_id=$req->division;
        }
        if($req->district){
            $ad->district_id=$req->district;
        }
        if($req->upazila){
            $ad->upazila_id=$req->upazila;
        }
        if($req->client){
            $ad->client=$req->client;
        }
        if($req->gd_no != $ad->gd_no){
            if (!Ad::where('gd_no',$req->gd_no)->first()) {
                $ad->gd_no=$req->gd_no;
            }
        }
        if($req->order_no){
            $ad->order_no=$req->order_no;
        }
        if($req->payment_status == 1){
            $ad->payment_status=$req->payment_status;
        }
        if($req->payment_status == 0){
            $ad->payment_status=$req->payment_status;
        }

        $ad->save();
        log::insert([
            'user_id'           => Auth::user()->id,
            'data'              => json_encode($ad),
            'operation_type'    => 'Update Ad',
        ]);
        return redirect('/ads');
    }

    public function delete($id){ // delete single ad
        $ad=Ad::find($id);
        // dd($ad);
        if($ad->update(['deleted_at' => Carbon::now()])){
            log::insert([
                'user_id'           => Auth::user()->id,
                'data'              => json_encode($ad),
                'operation_type'    => 'Delete Ad',
            ]);
        }
        return back();
    }

    public function print_bill($id){
        $ad=Ad::find($id);
        $upazila= Upazila::select('upazila_name')->where('upazila_id', $ad->upazila_id)->first();
        $district= District::select('district_name')->where('district_id', $ad->district_id)->first();
        return view ('admin.prints.print_bill',['ad'=>$ad, 'upazila'=>$upazila, 'district'=>$district]);
    }

    public function previewPrintReport(Request $request){
        $data = session()->all();
        $corr = Correspondent::where('correspondents.id', session('corr_id'))
        ->leftjoin('upazila_list', 'correspondents.upazila_id', '=', 'upazila_list.upazila_id')
        ->leftjoin('district_list', 'correspondents.district_id', '=', 'district_list.district_id')
        ->first();
        return view ('admin.prints.print_report_pre', ['data'=>$data, 'corr'=>$corr]);
    }

    public function printReport(Request $request){
        $data = session()->all();
        $corr = Correspondent::where('correspondents.id', session('corr_id'))
        ->leftjoin('upazila_list', 'correspondents.upazila_id', '=', 'upazila_list.upazila_id')
        ->leftjoin('district_list', 'correspondents.district_id', '=', 'district_list.district_id')
        ->first();

        session()->forget([
            'count', 'total', 'totalPaid', 'countPaid', 'totalUnPaid', 'countUnPaid', 'totalSize', 'chequeAmount', 'chequeCount', 'duration', 'ad', 'previous_due', 'credit', 'last_comm', 'total_comm'
        ]);

        return view ('admin.prints.print_report', ['data'=>$data, 'corr'=>$corr]);
    }

    public function query(Request $request)
    {
      $input = $request->all();
      $v= 'GE';

      $data = Ad::select('gd_no')
      ->where("gd_no","LIKE","%{$input['query']}%")
      ->where('payment_status', '=', 0)
      ->pluck('gd_no')->toArray();

       // ->where('client', '<>', null)
       // if($v != NULL){

       // }
        // $data_o = Ad::select("gd_no","amount")
        //           ->where("gd_no","LIKE","%{$input['query']}%")
        //           ->get();
        // foreach($data_o as $key => $value){
        //     $data[] = $value->gd_no.' , amount '.$value->amount;
        // }

      return response()->json($data);
  }

  public function getAddress(Request $req){
    try{
            // $correspondent= Correspondent::where('name',$req->corr_name)->first();
        $correspondent= Correspondent::
        leftjoin('division_list', 'correspondents.division_id', '=', 'division_list.division_id')
        ->leftjoin('district_list', 'correspondents.district_id', '=', 'district_list.district_id')
        ->where('name', $req->corr_name)->first();

            // $correspondent= Correspondent::
            // leftjoin('division_list', 'correspondents.division_id', '=', 'division_list.division_id')
            // ->where('name', $req->corr_name)->first();

            // $correspondent= Correspondent::
            // leftjoin('district_list', 'correspondents.district_id', '=', 'district_list.district_id')
            // ->where('name', $req->corr_name)->first();

        if(!$correspondent){
            throw new Exception("Correspondent not found");
        }
        return response()->json(array(
            'status' => true,
            'data' => $correspondent,
        ));
    }
    catch(Exception $e){
        return response()->json(array(
            'status' => false,
            'status_msg' => $e->getMessage()
        ));
    }
}

    public function filterAds(Request $req){  //from ads page
        // dd($req);
        if ($req->payment_status != '' && $req->corr_id != '') {
            try{
                if ($req->payment_status == 2) {
                    $ads=Ad::
                    leftjoin('district_list', 'ads.district_id', '=', 'district_list.district_id')
                    ->leftjoin('upazila_list', 'ads.upazila_id', '=', 'upazila_list.upazila_id')
                    ->where('correspondent_id',$req->corr_id)->get();
                }else{
                    $ads=Ad::
                    leftjoin('district_list', 'ads.district_id', '=', 'district_list.district_id')
                    ->leftjoin('upazila_list', 'ads.upazila_id', '=', 'upazila_list.upazila_id')
                    ->where('correspondent_id',$req->corr_id)->where('payment_status',$req->payment_status)->get();
                }

                if(!$ads){
                    throw new Exception("Ads not found");
                }
                return response()->json(array(
                    'status' => true,
                    'data' => $ads
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

    public function exportAds(){
        return Excel::download(new AdsExport, 'ads.xlsx');
    }

    public function dailyAds(){
        $correspondents= Correspondent::select('name','upazila_name')
        ->leftjoin('upazila_list', 'correspondents.upazila_id', '=', 'upazila_list.upazila_id')
        ->get();
        $division_names= Division::select('division_name')->get();
        $district_names= District::select('district_name')->get();
        $upazila_names= Upazila::select('upazila_name','upazila_id')->get();
        return view('admin.ads.daily_ads')->with('correspondents', $correspondents)
        ->with('division_names',$division_names)->with('district_names',$district_names)->with('upazila_names',$upazila_names);
    }

    public function dailyAdsPost(Request $request){
        if($request->filled('publishing_date')){
            $form_date = date('Y-m-d', strtotime($request->publishing_date));

            $ads = Ad::whereDate('created_at', $form_date)->get();
            $total_amount = $ads->sum('amount');
            // $total_amount = Ad::sum('amount')->whereDate('created_at', $form_date)->get();
            if(empty($ads)){
                return 'No record found!!';
            }
            return view ('admin.prints.daily_ads_report')
            ->with('ads', $ads)
            ->with('form_date', $request->publishing_date)
            ->with('total_amount', $total_amount);
            return view('admin.ads.daily_ads_report')->with('ads', $ads);
        }
    }
}

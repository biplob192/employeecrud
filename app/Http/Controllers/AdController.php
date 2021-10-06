<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ad;
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
        $con= 'ads.payment_status IS NOT NULL';
        // if($req->payment_status && $req->payment_status < 2){
        if($req->payment_status < 2 && $req->payment_status > -1){
            $con = 'ads.payment_status = '.$req->payment_status;
        }
        if($req->payment_status == 2){
            $con = 'ads.upazila_id = 494';
        }
        if($req->payment_status == 3){
            $con = 'ads.upazila_id != 494';
        }
        
        if($req->filled('from')){
            $date = explode(' - ',$req->from);
            $from = $date[0];
            $to = $date[1];
            $from = date('Y-m-d', strtotime($from));
            $to = date('Y-m-d', strtotime($to));
            // dd($date);
            $con .= ' AND ads.created_at between "'.$from.' 00:00:00" AND "'.$to.' 23:59:59"';
            // dd($con);

        }
        
        if($req->corr_id){
            $con .= ' AND ads.correspondent_id = '.$req->corr_id;
        }
        
        $ad=Ad::
        leftjoin('district_list', 'ads.district_id', '=', 'district_list.district_id')
        ->leftjoin('upazila_list', 'ads.upazila_id', '=', 'upazila_list.upazila_id')
        ->whereRaw($con)->whereNull('ads.deleted_at')
        ->get();
        // dd($ad);
        $count=$ad->count();
        $totalPaid=$ad->where('payment_status', 1)->sum('amount');
        $countPaid=$ad->where('payment_status', 1)->count();
        $totalUnPaid=$ad->where('payment_status', 0)->sum('amount');
        $countUnPaid=$ad->where('payment_status', 0)->count(); 
        $totalSize=$ad->sum('total_size');
        return view ('admin.ads.ads',['ad'=>$ad, 'totalpaid' =>$totalPaid, 'totalunpaid' =>$totalUnPaid, 'count' =>$count, 'totalSize' =>$totalSize, 'countPaid' => $countPaid, 'countUnPaid' => $countUnPaid]);    
        
    }

    // public function filterAdsDate(Request $req){
    //     if($req->from != '' && $req->to != ''){
    //         $ad=Ad::
    //         leftjoin('district_list', 'ads.district_id', '=', 'district_list.district_id')
    //         ->leftjoin('upazila_list', 'ads.upazila_id', '=', 'upazila_list.upazila_id')
    //         ->where('ads.created_at', '>=', date('Y-m-d', strtotime($req->from)).' 00:00:00')
    //         ->where('ads.created_at', '<=', date('Y-m-d', strtotime($req->to)).' 23:59:59')->get();
    //         $count=$ad->count();
    //         $totalPaid=$ad->where('payment_status', 1)->sum('amount');
    //         $totalUnPaid=$ad->where('payment_status', 0)->sum('amount');
    //         return view ('admin.ads.ads',['ad'=>$ad, 'totalpaid' =>$totalPaid, 'totalunpaid' =>$totalUnPaid, 'count' =>$count]);
    //     }
    //     // index();
    //     return redirect ("ads");
    // }

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

    public function store(Request $req){ // store into database
        try{
        $validator  = Validator::make($req->all(), [
            'corr_name'     => 'required|max:50',            
            'corr_id'       => 'required',            
            'ad_type'       => 'required',            
            'ad_position'   => 'required',          
            'extra_charge'  => 'required',            
            'div_id'        => 'required',            
            'dist_id'       => 'required',            
            'upazila_id'    => 'required',            
            'client'        => 'required',            
            'gd_no'         => 'required|unique:ads,gd_no',            
            'order_no'      => 'required',            
            'inch'          => 'required',            
            'colum'         => 'required',      
            'payment_status'=> 'required',            
        ]);

        if($validator ->fails()){
           return back()->withErrors($validator )->withInput();
        }
        // dd($req->all());
        $ads_price = AdsPrice::select('price')
                ->where([
                    'ads_type'      => $req->ad_type,
                    'ads_position'  => $req->ad_position
                ])->first();

        $total_size = $req->inch*$req->colum;      
        $final_amount = ($total_size*$ads_price->price)+$req->extra_charge;

        $ad= new Ad;
        $ad->correspondent_name =$req->corr_name;
        $ad->correspondent_id   =$req->corr_id;
        $ad->ad_type            =$req->ad_type;
        $ad->rate               =$ads_price->price;
        $ad->extra_charge       =$req->extra_charge;
        $ad->division_id        =$req->div_id;
        $ad->district_id        =$req->dist_id;
        $ad->upazila_id         =$req->upazila_id;
        $ad->client             =$req->client;
        $ad->gd_no              =$req->gd_no;
        $ad->order_no           =$req->order_no;
        $ad->inch               =$req->inch;
        $ad->ad_position        =$req->ad_position;
        $ad->colum              =$req->colum;
        $ad->total_size         =$total_size;
        $ad->amount             =$final_amount;
        $ad->payment_status     =$req->payment_status;
        $ad->publishing_date    =$req->publishing_date;
        $ad->save();
        log::insert([
            'user_id'           => Auth::user()->id,
            'data'              => json_encode($ad),
            'operation_type'    => 'Insert Ad',
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

    public function show($id){ // show single ad 
        $ad=Ad::find($id);
        return view ('admin.prints.print_bill_pre',['ad'=>$ad]);
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
        // $ad->delete();
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
        return view ('admin.prints.print_bill',['ad'=>$ad]);
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
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Ad;
use App\Models\Cheque;
use App\Models\CorrWallet;
use App\Models\Commission;

class HomeController extends Controller
{    public function home(){
        if(Auth::check()){
            return redirect('/dashboard');
        }
        // return redirect ("login");

        return view ('home');
    }

    public function dashboard(Request $req) {
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
            return view ('admin.dashboard',['ad'=>$ad, 'totalPaid'=>$totalPaid, 'totalUnPaid'=>$totalUnPaid, 'count'=>$count, 'totalSize'=>$totalSize, 'countPaid'=>$countPaid, 'countUnPaid'=>$countUnPaid,  'duration'=>$duration, 'total'=>$total, 'chequeCount'=> $chequeCount, 'chequeAmount'=> $chequeAmount, 'corr_id'=>$req->corr_id,]);
        }
        return redirect ("login");
    }
}

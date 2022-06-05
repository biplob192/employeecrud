<?php

namespace App\Http\Controllers;
use App\Models\Ad;
use Exception;

use Illuminate\Http\Request;

class TestController extends Controller
{
    public function index(){
        return view("test");
    }

    public function time(){
        $dateFrom = "2021-07-31 00:00:00";
        $dateTo = "2021-09-01 23:59:59";
        $timeFrom = "0000-00-00 15:00:00";
        $timeTo = "0000-00-00 18:00:00";
        $dates = [$dateFrom, $dateTo];

        $allADS = Ad::whereBetween('created_at',$dates)->get();

        $adsID = array();
        foreach($allADS as $ad){
            $time = $ad->created_at->format('H:i:s');
            $timeFrom = "15:00:00";
            $timeTo = "18:00:00";
            if($time >= $timeFrom && $time <= $timeTo){
                $adsID[] = $ad->id;
            }
        }
        return $allADS->whereIn('id', $adsID);

        $allADS2 = Ad::whereBetween('created_at',$dates)->
        whereTime('created_at', '>=',$timeFrom)
        ->whereTime('created_at', '<=',$timeTo)
        ->get();
        return $allADS2;

        // solution 2

        $allADS = Ad::with('selfilter')
            ->whereDate('created_at', '>=',$dateFrom)
            ->whereDate('created_at', '<=',$dateTo)
            ->whereHas('selfilter', function($query) use ( $timeFrom,  $timeTo){
            return $query->whereTime('created_at', '>=',$timeFrom)
            ->whereTime('created_at', '<=',$timeTo);
        })
        ->get();
        //  ->toSql();
        ddd($allADS);

        // $dateFrom = "2021-07-31 12:57:33";
        // $dateTo = "2021-09-01 03:04:09";
        // $timeFrom = "15:00:00";
        // $timeTo = "18:00:00";
        // $dateFrom = "2021-07-31";
        // $dateTo = "2021-09-01";

        // $from = date('Y-m-d', strtotime($from));
        // $to = date('Y-m-d', strtotime($to));
        // $dates = [$from.' 00:00:00',$to.' 23:59:59'];
        // $times = [$timeFrom, $timeTo];


        // $ads = Ad::whereBetween('created_at',$dates)->get();
        // return $ads->whereBetween('created_at',$times);
        // return $ads->where('payment_status', 1);
        // return $ads->where('payment_status', 1)->first();
        // return Ad::whereBetween('created_at',$dates)->where(created_at->format('H:i:s'))->get();
    }

    public function ajaxcall(Request $req){
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

    public function apiHit(){
        $url = "http://dummy.restapiexample.com/api/v1/employees";
        $url = "http://127.0.0.1:8080/api/correspondents";
        $token = 'env('TOKEN')';
        $authorization = "Authorization: Bearer ".$token; // Prepare the authorisation token
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json' , $authorization ));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_URL, $url);
        $res = curl_exec($ch);
        $res = json_decode($res);
        if($res && $res->status == true){
            return $res;
        }else{
            $res = $this->apiLogin();
            $this->apiHit();
        }
        //
        return $res;
    }

    protected function apiLogin(){
        $url = "http://127.0.0.1:8080/api/login";
        $token = env('TOKEN');
        $login['email']    = 'shajib@gmail.com';
        $login['password'] = 'shajib';
        $login = json_encode($login);
        $authorization = "Authorization: Bearer ".$token; // Prepare the authorisation token
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json' , $authorization ));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS,$login);
        curl_setopt($ch, CURLOPT_URL, $url);
        $res = curl_exec($ch);
        $res = json_decode($res);
        putenv('TOKEN='.$res->data->token);
        dd($res->data->token);
    }

    public function getRowsQuery(){
        return 123;
    }

    public function getCorres(){
         $query = Ad::query();
         // if(){
         //    $query->where('gd_no', 100);
         // }
         $query->where('gd_no', 100);
         $ad = $query->get();
        $ad = Ad::where('gd_no', 100)->first();
        return response()->json($ad);
    }

    public function renderx()
    {
        $loggedInUser = Auth::user();

        $data['title'] = "Attendance";

        if (!empty($this->search)) {
                $users = User::where('nid','like', "%{$this->search}%")
                    ->orWhere('first_name','like',"%{$this->search}%")
                    ->orWhere('last_name','like',"%{$this->search}%")
                    ->orWhere('email','like',"%{$this->search}%")
                    ->select('id')
                    ->get();

                $user_ids = array();

                if($users){
                    foreach($users as $user){
                        array_push($user_ids,$user->id);
                    }
                }
                if (!empty($user)) {
                    $hourlyRatedEmployees = EmployeeRate::where('rate_type', 1)->select('employee_id')->get();
                    $hEmpId = array();
                    if ($hourlyRatedEmployees) {
                        foreach ($hourlyRatedEmployees as $hRate) {
                            array_push($hEmpId, $hRate->employee_id);
                        }
                    }

                    $hEmployee = Employee::whereIn('user_id', $user_ids)->whereIn('id', $hEmpId);

                    $data['hourlyRatedEmployees'] = $hEmployee->paginate(50);
                     // end hourly rated

                    $data['employees'] = Employee::whereIn('user_id', $user_ids)->orderBy('id', 'DESC')->paginate(50);

                } else {
                    $data['employees'] = array();
                }
        }
        else {
            $data['employees'] = Employee::orderBy('id', 'DESC')->paginate(10);
            // hourly rated employee
            $hourlyRatedEmployees = EmployeeRate::where('rate_type', 1)->select('employee_id')->get();

            $hEmpId = array();

            if ($hourlyRatedEmployees) {
                foreach ($hourlyRatedEmployees as $hRate) {
                    array_push($hEmpId, $hRate->employee_id);
                }
            }

            $hEmployee = Employee::whereIn('id', $hEmpId);

            $data['hourlyRatedEmployees'] = $hEmployee->paginate(50); // hourly rated
            //end hourly rated employee

            $data = Employee::leftjoin('EmployeeRate', 'Employee.id', '=', 'EmployeeRate.id')->paginate(50);
        }
        return $this->view('livewire.admin.attendances', $data);
    }
}




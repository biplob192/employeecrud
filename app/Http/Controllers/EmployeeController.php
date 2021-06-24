<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;
use Validator;
use Exception;

class EmployeeController extends Controller
{
    public function index(){ // show all correspondent list        
        // $member=Member::orderBy('name', 'asc')->get();
        $employee=Employee::all();
        return view ('employees',['employee'=>$employee]);
    }

    public function create(){ // show insert form
        return view('create_new_employee');
    }

    public function store(Request $req){ // store into database
        try{
        $validator  = Validator::make($req->all(), [
            'name' => 'required|max:50',
            'mobile'  => 'required|unique:employees,mobile',
            'district'  => 'filled', 
            'tc'  => 'accepted',            
        ]);

        if($validator ->fails()){
           return back()->withErrors($validator )->withInput();
        }

        $employee= new Employee;
        $employee->name=$req->name;
        $employee->fathers_name=$req->fathers_name;
        $employee->district=$req->district;
        $employee->upazila=$req->upazila;
        $employee->mobile=$req->mobile;
        $employee->email=$req->email;
        $employee->nid=$req->nid;
        $employee->joining_date=$req->joining_date;
        $employee->image=$req->image;
        $employee->save();
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
        $employee=Employee::find($id);
        // return $employee;        
        return view ('employee',['employee'=>$employee]);
    }

    public function edit($id){ // show single correspondent  in edit form
        $employee=Employee::find($id);
        return view ('editemployee',['employee'=>$employee]);
    }

    public function update(Request $req){ // edit single correspondent
        // return $req->input();
        $updatedata=Employee::find($req->id);
        if($req->name){
            $updatedata->name=$req->name;
        }
        if($req->district){
            $updatedata->district=$req->district;
        }
        if($req->mobile){
            $updatedata->mobile=$req->mobile;
        }
        $updatedata->save();
        return redirect('/employees');
    }

    public function delete($id){ // delete single correspondent
        $employee=Employee::find($id);
        $employee->delete();
        return back();
    }
}

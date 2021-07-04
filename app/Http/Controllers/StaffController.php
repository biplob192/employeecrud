<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\member;
use App\Models\Correspondent;
use Validator;
use Exception;

class StaffController extends Controller
{
    public function create(){ // show insert form
        return view ('admin.correcpondents.office_staff');
    }

    public function store(Request $req){ // store into database
        try{
        $validator  = Validator::make($req->all(), [
            'name' => 'required|max:50',            
            'district'  => 'filled', 
            'upazila'  => 'filled', 
            'mobile'  => 'required|unique:correspondents,mobile',
            'nid'  => 'required|unique:correspondents,nid',
            'corrid'  => 'required|unique:correspondents,nid',
            'email'  => 'required',
            'appointed_date'  => 'required',
                        
        ]);

        if($validator ->fails()){
           return back()->withErrors($validator )->withInput();
        }

        $correspondent= new Correspondent;
        $correspondent->name=$req->name;
        $correspondent->district=$req->district;
        $correspondent->upazila=$req->upazila;
        $correspondent->mobile=$req->mobile;
        $correspondent->nid=$req->nid;
        $correspondent->corrid=$req->corrid;
        $correspondent->email=$req->email;
        $correspondent->appointed_date=$req->appointed_date;
        $correspondent->image=$req->image;
        $correspondent->save();
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

   public function addStaff (Request $req){ 
    
   }

   public function mlist(){

    // return redirect('/addstaff');
    // $member=Member::orderBy('name', 'asc')->get();
    $member=Member::all();
    return view ('memberlist',['member'=>$member]);
   }

   public function delete($id){

    $member=Member::find($id);
    $member->delete();
    return back();
   }

   public function edit($id){

    $member=Member::find($id);
    return view ('editlist',['member'=>$member]);

   }

   public function updateMember(Request $req){

    // return $req->input();
    $updatedata=Member::find($req->id);
    if($req->staffname){
        $updatedata->name=$req->staffname;
    }
    if($req->district){
        $updatedata->district=$req->district;
    }
    if($req->mobileno){
        $updatedata->mobile=$req->mobileno;
    }
    $updatedata->save();
    return redirect('/mlist');

   
   }
}

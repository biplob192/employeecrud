<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\member;
use Validator;
use Exception;

class StaffController extends Controller
{
   public function addStaff (Request $req){ 
    try{
        $validator  = Validator::make($req->all(), [
            'staffname' => 'required|max:50',
            'mobileno'  => 'required|unique:members,mobile',
            'district'  => 'filled', 
            'tc'  => 'accepted',            
        ]);

        if($validator ->fails()){
           return back()->withErrors($validator )->withInput();
        }

        $member= new Member;
        $member->name=$req->staffname;
        $member->mobile=$req->mobileno;
        $member->district=$req->district;
        $member->save();
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

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\member;
use App\Models\Correspondent;
use Validator;
use Exception;

class ConrrespondentController extends Controller
{
    public function index(){ // show all correspondent list
        $correspondent=Correspondent::all();
        $correspondentCount=Correspondent::all()->count();
        // $correctedComparisons=0;
        // $correspondents = Correspondent::where('id', '<=', $correctedComparisons)->get();
        // $correspondentCount = $correspondents->count();
        return view ('admin.Correspondents.Correspondents',['correspondent'=>$correspondent],['correspondentCount'=>$correspondentCount]);
    }

    public function create(){ // show insert form
        return view ('admin.correspondents.office_staff');
    }

    public function store(Request $req){ // store into database
        try{
        $validator  = Validator::make($req->all(), [
            'name' => 'required|max:50',            
            'district'  => 'filled', 
            'upazila'  => 'filled', 
            'mobile'  => 'required|unique:correspondents,mobile|size:11',
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

    public function show($id){ // show single correspondent 
        $correspondent=Correspondent::find($id);
        // return $employee;        
        return view ('admin.correspondents.correspondent',['correspondent'=>$correspondent]);
    }

    public function edit($id){ // show single correspondent  in edit form
        $correspondent=Correspondent::find($id);
        return view ('admin.correspondents.editlist',['correspondent'=>$correspondent]);
    }

    public function update(Request $req){ // edit single correspondent
        // return $req->input();
        $validator  = Validator::make($req->all(), [
            'mobile'  => 'size:11',
        ]);

        if($validator ->fails()){
           return back()->withErrors($validator )->withInput();
        }
        $correspondent=Correspondent::find($req->id);
        // $updatedata=Member::find($req->id);
        if($req->name){
            $correspondent->name=$req->name;
        }
        if($req->division){
            $correspondent->division=$req->division;
        }
        if($req->district){
            $correspondent->district=$req->district;
        }
        if($req->upazila){
            $correspondent->upazila=$req->upazila;
        }        
        if($req->mobile != $correspondent->mobile){
            if (!Correspondent::where('mobile',$req->mobile)->first()) {
                $correspondent->mobile=$req->mobile;
            }            
        }
        if($req->email){
            $correspondent->email=$req->email;
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
        return redirect('/correspondents');
    }

    public function delete($id){ // delete single correspondent
        $correspondent=Correspondent::find($id);
        $correspondent->delete();
        return back();
    }
}

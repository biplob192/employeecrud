<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\member;
use Validator;
use Exception;

class ConrrespondentController extends Controller
{
    public function index(){ // show all correspondent list
        return 'all list';
    }

    public function create(){ // show insert form
        return 'all list';
    }

    public function store(Request $req){ // store into database
        return 'all list';
    }

    public function show($id){ // show single correspondent 
        return 'all list';
    }

    public function edit($id){ // show single correspondent  in edit form
        $member=Member::find($id);
        return view ('editlist',['member'=>$member]);
    }

    public function update(Request $req){ // edit single correspondent
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

    public function delete($id){ // delete single correspondent
        $member=Member::find($id);
        $member->delete();
        return back();
    }
}

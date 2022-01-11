<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Employee;
use Validator;
use Exception;
use Intervention\Image\ImageManagerStatic as Image;

class EmployeeController extends Controller
{
    public function index(){ // show all correspondent list        
        // $member=Member::orderBy('name', 'asc')->get();
        // $employees=Employee::all();
        // $employees = DB::table('employees')->Paginate(6);
        // $employees=Employee::orderBy('name', 'asc')->Paginate(6);          
        $employees=Employee::orderBy('name', 'asc')->get();            
        return view ('admin.employees.employees',['employees'=>$employees]);
    }

    public function create(){ // show insert form
        return view('admin.employees.create_new_employee');
    }

    public function store(Request $req){ // store into database
        try{
        $validator  = Validator::make($req->all(), [
            'name'      => 'required||unique:employees,name|max:20',
            'mobile'    => 'required|unique:employees,mobile|size:11',
            'district'  => 'required|max:20',            
            'upazila'   => 'required|max:20',            
        ]);

        if($validator ->fails()){
           return back()->withErrors($validator )->withInput();
        }
        $image = $req->image;
        $image_name = time().'.'.$image->getClientOriginalExtension();
        //$destination = base_path().'/public/images/'.$image_name;
        $destination = storage_path().'/app/public/images/'.$image_name;
        Image::make($image)->resize(200, 200)->save($destination);

        $employee= new Employee;
        $employee->name=$req->name;
        $employee->fathers_name=$req->fathers_name;
        $employee->district=$req->district;
        $employee->upazila=$req->upazila;
        $employee->mobile=$req->mobile;
        $employee->email=$req->email;
        $employee->nid=$req->nid;
        $employee->emp_id=$req->emp_id;
        $employee->section=$req->section;
        $employee->designation=$req->designation;
        $employee->appointed_date=$req->appointed_date;
        $employee->image= $image_name;
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
        return view ('admin.employees.editemployee',['employee'=>$employee]);
    }

    public function update(Request $req){ // edit single correspondent
        // return $req->input();
        $updatedata=Employee::find($req->id);
        $validator  = Validator::make($req->all(), [
            'name'      => 'required|max:20',
            'mobile'    => 'required|size:11',
            'district'  => 'required|max:20',            
            'upazila'   => 'required|max:20',            
        ]);

        if($validator ->fails()){
           return back()->withErrors($validator )->withInput();
        }
        if($req->name){
            $updatedata->name=$req->name;
        }
        if($req->fathers_name){
            $updatedata->fathers_name=$req->fathers_name;
        }
        if($req->district){
            $updatedata->district=$req->district;
        }
        if($req->upazila){
            $updatedata->upazila=$req->upazila;
        }
        if($req->mobile != $updatedata->mobile){
            if (!Employee::where('mobile',$req->mobile)->first()) {
                $updatedata->mobile=$req->mobile;
            }            
        }
        if($req->email){
            $updatedata->email=$req->email;
        }
        if($req->nid){
            $updatedata->nid=$req->nid;
        }
        if($req->emp_id){
            $updatedata->emp_id=$req->emp_id;
        }
        if($req->section){
            $updatedata->section=$req->section;
        }
        if($req->designation){
            $updatedata->designation=$req->designation;
        }
        if($req->appointed_date){
            $updatedata->appointed_date=$req->appointed_date;
        }
        if($req->image){
            $image = $req->image;
            
            $image_name = time().'.'.$image->getClientOriginalExtension();
            $destination = base_path().'/public/images/'.$image_name;
            Image::make($image)->resize(200, 200)->save($destination);

            $updatedata->image= $image_name;
        }
        $updatedata->save();
        return redirect('/employees');
    }

    public function delete($id){ // delete single correspondent
        $employee=Employee::find($id);
        $employee->delete();
        return back();
    }

    public function search(Request $request){ 

        if ($request->ajax()) {
            $data = Employee::where('name','LIKE','%'.$request->search.'%')->get();
            $output = '';
            if(count($data)>0){

                $output ='
                    <table>
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                            </tr>
                        </thead>
                        <tbody>';

                        

                        foreach($data as $row){
                            $output .='
                            <tr>
                            <th scope="row">'.$row->id.'</th>
                            <td>'.$row->name.'</td>
                            </tr>
                            ';
                        }
                        

                $output =' 
                    </tbody>
                    </table>';

            }
            else{
                $output .='No Result';
            }

            return $output;
        }
        
    }
}

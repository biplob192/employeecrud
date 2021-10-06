<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Models\User;
use App\Models\Log;
use Validator;
use Exception;
use Auth;
use Hash;

class UserController extends Controller
{
    public function index(){
        $users = User::get();
        // dd($users->roles());
        $roles = Role::get();
        return view ('admin.appusers.users',['users'=>$users,'roles' => $roles]);
    }

    public function store(Request $req){
        try{
        $validator  = Validator::make($req->all(), [           
            'user_name'      => 'required',            
            'user_email'     => 'required|unique:users,email',
            'user_password'  => 'required',          
            'user_role'      => 'required',          
        ]);

        if($validator ->fails()){
           return back()->withErrors($validator )->withInput();
        }

        $user = new User;
        $user->name         = $req->user_name;
        $user->email        = $req->user_email;
        $user->password     = Hash::make($req->user_password);
        $user->save();
        $user->assignRole($req->user_role);
        log::insert([
            'user_id'           => Auth::user()->id,
            'data'              => json_encode($user),
            'operation_type'    => 'Insert App User',
        ]);
        return back();
      }
        catch(Exception $e){          
            return back()->with('error', $e->getMessage())->withInput();
      }
    }

    public function update(Request $req){
        dd($req->all());
        $user=User::find($req->id);

        if($req->user_name != $user->name){
            if (!User::where('name',$req->user_name)->first()) {
                $user->name=$req->user_name;
            }
        }
        if($req->user_password){
            $user->password     = Hash::make($req->user_password);
        }
        if($req->email != $user->user_email){
            if (!User::where('email',$req->user_email)->first()) {
                $user->email=$req->user_email;
            }            
        }        
       
        $user->save();
        $user->assignRole($req->edit_user_role);
        return redirect('/users');
    }
    public function user_update(Request $req){
        // dd($req->edit_user_role);
        $user=User::find($req->id);

        if($req->user_name != $user->name){
            if (!User::where('name',$req->user_name)->first()) {
                $user->name=$req->user_name;
            }
        }
        if($req->user_password){
            $user->password     = Hash::make($req->user_password);
        }
        if($req->email != $user->user_email){
            if (!User::where('email',$req->user_email)->first()) {
                $user->email=$req->user_email;
            }            
        }        
       
        $user->save();
        $user->roles()->sync($req->edit_user_role);
        log::insert([
            'user_id'           => Auth::user()->id,
            'data'              => json_encode($user),
            'operation_type'    => 'Update App User',
        ]);
        return redirect('/users');
    }
    
}

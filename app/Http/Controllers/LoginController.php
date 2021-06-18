<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Hash;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function postLogin(Request $req){
        if(Auth::attempt(['email' => $req->email,'password' => $req->password])){
            return 'valid';
        }else{
            return 'Invalid';
        }
    }

    public function postLogin2(Request $req){
        $user = User::where('email',$req->email)->first();
        if(!$user){
            return 'email not valid';
        }

        if (!Hash::check($req->password, $user->password)) {
            return 'password not valid';
        }

        return 'valid credential';
    }

    // public function adminLogin(Request $req){
    //     if(Auth::guards('Admin')->attempt(['email' => $req->email,'password' => $req->password])){
    //         return 'valid';
    //     }else{
    //         return 'Invalid';
    //     }
    // }

    public function logout(){
        Auth::logout();
        return redirect('/');
    }
}

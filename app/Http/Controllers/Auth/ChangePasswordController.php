<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class ChangePasswordController extends Controller
{
    public function index()

    {

        return view('auth.password.change');
    }


    public function ChangePassword(Request $Request){

        
        // $Request->validate([
        //     'oldpasswordname'=> ['required'] ,
        //     'password'=> ['required'] ,
           
          
        // ]);

      

        $hashPassword= Auth::user()->password;
        if(Hash::check($Request->input("oldpassword") , $hashPassword)){

            $user = User::find(Auth::id());
            $user->password = Hash::make($Request->input("password"));
            $user->save();
            Auth::logout();
            return redirect()->route('login')->with('successMsg', ' تم تغيير كلمة المرور بنجاح');
        }
        else
        return redirect()->back()->with('erorrMsg', ' كلمة المرور القديمة خاطئة');



    }
}

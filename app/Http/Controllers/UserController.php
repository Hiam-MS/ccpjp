<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;


class UserController extends Controller
{
    public function editform()

    {
        $user = User::find(Auth::id());

        return view('user.EditProfile', compact('user'));
    }





    public function updateprofile(Request $Request){

$Request->validate([
            'name'=> ['required', 'string', 'max:255'] ,
            // 'email'=>  'string|nullable|unique:users',
            // 'mobile'=> ['required', 'string', 'max:10', 'unique:users'] ,
           
           
          
        ]);



    $user = User::find(Auth::id());

    $user->name =  $Request->input("name");
    // $user->email  =  $Request->input("email");
      // $user->mobile  = $Request->input("mobile");
    
    if($user){
        $user->save();
        return view('index');

    }
    else
    return back()->withInput()->with('fail','هناك خطأ ما');
   


         


    }

    //************ */ Edit Email ********************

    public function editformEmail()

    {
        $user = User::find(Auth::id());

        return view('user.EditEmail', compact('user'));
    }





    public function updateprofileEmail(Request $Request){

$Request->validate([
           
            'email'=>  'string|nullable|unique:users',
            // 'mobile'=> ['required', 'string', 'max:10', 'unique:users'] ,
           
           
          
        ]);



    $user = User::find(Auth::id());

   
    $user->email  =  $Request->input("email");
      // $user->mobile  = $Request->input("mobile");
    $user->save();
    if($user){

        return view('welcome');

    }
    else
    return back()->withInput()->with('fail','هناك خطأ ما');
   


         


    }

// ************ Delete Profile *******************
// public function Deleteprofile()
//     {
//         $user = User::find(Auth::id());

//          $res=$user->delete();
//          Auth::logout();
//   if ($res){
    
//     return view('index');
// }else{
    
//     return redirect()->back()->with('erorrDelteProfile', ' لم يتم الحذف يرجى المحاولة مرة ثانية');
 
//   }
// }

}

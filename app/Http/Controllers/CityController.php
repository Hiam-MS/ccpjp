<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\City;
use App\Models\Governorate;
class CityController extends Controller
{
    //
    public function showCitites(){
        if(Auth()->user()->role == 'a'){
           $cities=City::paginate(30);
        
 
            return view ('city.show',compact('cities'));
        }
        else{
            abort(403);
        }
    }
    public function editCitites($id){
        if(Auth()->user()->role == 'a'){
            $city= City::find($id);
            $governorates=Governorate::all();
 
            return view ('city.edit',compact('city','governorates'));
        }
        else{
            abort(403);
        }
    }
    public function updateCities(Request $Request){
        $person = auth()->user()->GetPerson;
        $person->email =  $Request->input("email");
       $person->place_Of_b = $Request->input("place_Of_b");
        // $person->ci_id = $Request->input('city');
        $person->fixed_phone= $Request->input("fixed_phone");
        $person->user_id= auth()->user()->id;
        if($person)
        {
            $person->save();
            return redirect()->route('PersonDash')->with('success','  تم تعديل المعلومات الشخصية بنجاح');
        }
        else
        {
           return back()->withInput()->with('fail','هناك خطأ ما');
        }
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Person;
// use App\Models\PersonSkill;
use App\Models\PersonEducation;
// use App\Models\PersonExperience;
// use App\Models\PersonCourse; 
use Illuminate\Support\Facades\DB;
use App\Models\JobCategory;
use App\Models\PersonCategory;
use App\Models\ApplyedJob;
use App\Models\PersonAdditionalInfo;
use App\Models\City;
use Illuminate\Support\Facades\Session;




class PersonController extends Controller
{
    public function index()
    {
        return view('person.person_dash');
    }

    public function ViewpersonalInfo()
    {
        if(isset(auth()->user()->GetPerson))
        {
            $Person = auth()->user()->GetPerson;
            $current_address=DB::table('people')
              ->join('cities', 'people.ci_id', '=', 'cities.city_id');

            // $Person=DB::tabel('people')
            // ->join('person_education', 'people.id', '=', 'person_education.person_id');

            return view('person.ViewPersonInfo',compact('Person','current_address'));
        }
        else
        {
            return redirect()->route('resuem.create');
        }
    }
    // public function index2()
    // {
    //     $person = Person::latest()->paginate(5);
    //     return view('person.viewResuem',compact('person'));
    // }



    public function records(Request $request)
    {
        if ($request->ajax()) {

            if ($request->input('start_date') && $request->input('end_date')) {

                $start_date = Carbon::parse($request->input('start_date'));
                $end_date = Carbon::parse($request->input('end_date'));

                if ($end_date->greaterThan($start_date)) {
                    $person = Person::whereBetween('created_at', [$start_date, $end_date])->get();
                } else {
                    $person = Person::latest()->get();
                }
            } else {
                $person = Person::latest()->get();
            }

            return response()->json([
                'person' => $person
            ]);
        } else {
            return response()->json([
                'person' => $person
            ]);
        }
    }

    public function viewResuemForm(Request $request)
    {
        $cities=City::all();
        $degrees=PersonEducation::all();
       
       
        $degree = $request->input('degree');
        $city=$request->input('city');
        $gender=$request->input('gender');


   
        if($request->has('degree') && $city == NULL && $gender == NULL){
            
      
        // $Person=Person::select("*")->where('degree_name','LIKE','%'.$degree.'%')
        // ->join('person_education', 'people.id', '=', 'person_education.person_id')
        // ->orderBy('people.created_at','desc')->paginate(50);
        $Person = Person::with(['PersonEducation' => fn($query) => $query->where('degree_name','LIKE','%'.$degree.'%')])
        ->whereHas('PersonEducation', fn ($query) => 
        $query->where('degree_name','LIKE','%'.$degree.'%')
        )
        ->latest('people.created_at')
        ->paginate(50);
        }       
       

    elseif($request->has('degree') && $request->has('city') && $gender == NULL){
        // $Person=Person::select("*")->where('city_name','LIKE','%'.$city.'%')->where('degree_name','LIKE','%'.$degree.'%')
        // ->join('cities', 'people.ci_id', '=', 'cities.city_id')
        // ->join('person_education', 'people.id', '=', 'person_education.person_id')
        // ->orderBy('created_at','desc')->paginate(50);

        $Person = Person::with(['PersonEducation' => fn($query) => $query->where('degree_name','LIKE','%'.$degree.'%')])
        ->whereHas('PersonEducation', fn ($query) => 
        $query->where('degree_name','LIKE','%'.$degree.'%'))
        ->whereHas('City', fn ($query) => 
        $query->where('city_name','LIKE','%'.$city.'%'))
        ->latest('people.created_at')
        ->paginate(50);
    }
    elseif($request->has('degree') && $request->has('city') && $request->has('gender')){
        // $Person=Person::select("*")->where('city_name','LIKE','%'.$city.'%')->where('degree_name','LIKE','%'.$degree.'%')->where('gender','LIKE','%'.$gender.'%')
        // ->join('cities', 'people.ci_id', '=', 'cities.city_id')
        // ->join('person_education', 'people.id', '=', 'person_education.person_id')
        // ->orderBy('created_at','desc')->paginate(50);
        $Person = Person::with(['PersonEducation' => fn($query) => $query->where('degree_name','LIKE','%'.$degree.'%')])
        ->whereHas('PersonEducation', fn ($query) => 
        $query->where('degree_name','LIKE','%'.$degree.'%'))
        ->whereHas('City', fn ($query) => 
        $query->where('city_name','LIKE','%'.$city.'%'))
        ->where('gender','LIKE','%'.$gender.'%')
        ->latest('people.created_at')
        
        ->paginate(50);
    }
//    elseif($request->has('city') && $degree == NULL && $gender == NULL){

//     $Person=Person::select("*")->where('city_name','LIKE','%'.$city.'%')
//     ->join('cities', 'people.ci_id', '=', 'cities.city_id')
//     ->join('person_education', 'people.id', '=', 'person_education.person_id')
//     ->orderBy('created_at','desc')->paginate(50);
       
        
//     }
//     elseif($request->has('gender') && $degree == NULL && $city == NULL){
//         $Person=Person::where('gender','LIKE','%'.$gender.'%')
//         ->orderBy('created_at','desc')->paginate(50);
           
//     }

    else{
        $Person=Person::orderBy('created_at','desc')->paginate(50);
       
      
       

    }
        //$Person=appends($request->all());
        // return view('person.viewResuem',compact('Person'));
        // }else{
        //     $Person=Person::paginate(10);
        //     return view('person.viewResuem',compact('Person'));
        // }

        // if ($request->ajax()) {

        //     if ($request->input('start_date') && $request->input('end_date')) {

        //         $start_date = Carbon::parse($request->input('start_date'));
        //         $end_date = Carbon::parse($request->input('end_date'));

        //         if ($end_date->greaterThan($start_date)) {
        //             $Person = Person::whereBetween('created_at', [$start_date, $end_date])->get();
        //         } else {
        //             $Person=Person::select("*")->orderBy("created_at", "desc")->paginate(10);
        //         }
        //     } else {
        //         $Person=Person::select("*")->orderBy("created_at", "desc")->paginate(10);
        //     }
            
        //     return view('person.viewResuem',compact('Person'));
           
        // } 
        // $Person = Person::latest()->paginate(50);
        // $ci =DB::table('people')
        // ->join('cities', 'people.city_id', '=', 'cities.city_id');

    // $Person=DB::table('people')
    // ->join('cities', 'people.city_id', '=', 'cities.city_id')
    // // ->join('person_education', 'people.id', '=', 'person_education.person_id')
    // ->orderBy("Fname", "asc")->paginate(50);
    


        // $Person=Person::select("*")->paginate(50);
        // $Person=Person::select("*")->orderBy("created_at", "asc")->paginate(50);


    
    
    
 
        // if($degree !=NULL && $city !=NULL && $gender !=NULL){
        //     if($request->has('degree') && $city !=NULL && $gender !=NULL){

        //     }else{
        //         $Person = PersonEducation::where('degree_name', $degree)
        //         ->join('people', 'person_education.person_id', '=', 'people.id')
        //         ->orderBy('created_at', 'desc')
        //         ->paginate(10);
        //     }
        // }else{
        //     $Person=Person::join('cities', 'people.city_id', '=', 'cities.city_id')->paginate(10);
        // }
       
          
      
       
       
      
        return view('person.viewResuem',compact('Person','cities','degrees'));
   
       
     
        // return view('person.viewResuem',compact('Person','ci'));
    }

        //   search resume    //



    public function searchResume(Request $request)
    {
        $Person = DB::table('people')
        ->join('person_education', 'people.id', '=', 'person_education.person_id')
        ->join('cities', 'people.ci_id', '=', 'cities.city_id')
        ->where('degree_name','LIKE','%' . $request->get('serchQuest') . '%')->get();
        return json_encode( $Person);
    }

    public function ResuemDetails($id)
    {
        $Person = Person::find($id);
        return view('person.ResuemDetail',compact('Person'));
    }

 
    // personal inf
    public function createResume()
    {
        if(isset(auth()->user()->GetPerson))
        {
            return redirect()->route('PersonDash');
        }
        else
        {
            $cities=City::all();
            return view('person.addResume',compact('cities'));
        }
    }


    public function store(Request $Request)
    {
       $Request->validate([
            'fname'=> ['required','string' , 'max:20'] ,
            'father_name'=> ['required','string' , 'max:20'] ,
            'Lname'=> ['required','string', 'max:20'] ,
            'gender'=> ['required'] ,
            'military_service'=> ['required'] ,
            'marital_status'=> ['required'] ,
            'dob'=> ['required','date'] ,
            // 'place_Of_b'=> ['required','string'] ,
            // 'Current_address'=> ['required','string'] ,
            // 'fixed_phone'=> ['required','integer'] ,
            'mobile_number'=> ['required','string'] ,
            'lang'=>['required'] ,
            'user_id'=>['unique:Person'] ,
          
        ],[
            'fname.string' =>'يجب أن لا يحتوي حقل الاسم سوى على حروف.',
            'father_name.string' =>'يجب أن لا يحتوي حقل الاسم سوى على حروف.',
            'Lname.string' =>'يجب أن لا يحتوي حقل الاسم سوى على حروف.',
            'fname.required'=>'يجب تعبئة حقل الاسم',
            'father_name.required'=>'يجب  تعبئة  حقل اسم الأب',
            'Lname.required'=>'يجب تعبئة حقل الكنية  ',
            'gender.required'=>'يجب اختيار حقل الجنس  ',
            'military_service.required'=>'يجب   اختيار حقل خدمة العلم ',
            'marital_status.required'=>'يجب  اختيار حقل الوضع العائلي   ',
            'dob.required'=>'يجب ادخال  حقل  تاريخ  الميلاد   ',

            // 'place_Of_b.required'=>'يجب ادخال  حقل  مكان  الولادة   ',
            'mobile_number.required'=>'يجب تعبئة حقل رقم الموبايل   ',
            'lang.required'=>'يجب  اختيار حقل  اللغة   ',
            // 'email.required'=>'يجب  ادخال البريد الالكتروني ',
            //'national_number.required'=>'يجب  ادخال حقل الرقم الوطني  ',
            // 'Current_address.required'=>'يجب  ادخال حقل  مكان الاقامة الحالي   ',
            // 'fixed_phone.required'=>'يجب  تعبئة  حقل الهاتف الأرضي  ',
        ]);
        
        $person =new Person ;
            $person->Fname = $Request->input("fname");
            $person->Father_name = $Request->input("father_name");
            $person->Lname = $Request->input("Lname");
            $person->gender= $Request->input("gender");
            $person->dob= $Request->input("dob");
            $person->ci_id= $Request->input("city");
            // $person->place_Of_b = $Request->input("place_Of_b");
            $person->marital_status= $Request->input("marital_status");
            $person->military_service= $Request->input("military_service");
            $person->mobile_number= $Request->input("mobile_number");
            $person->lang= $Request->input("lang");
            $person->user_id= auth()->user()->id;
            // $person->national_number= $Request->input("national_number");
            // $person->Current_address= $Request->input("Current_address");
            // $person->fixed_phone= $Request->input("fixed_phone");
             // $person->email =  $Request->input("email");
            // $person->img= $Request->input("img");
        if($person){
            $person->save();
            return redirect()->route('PersonDash');
        }else{
            return back();
        }
    }


    //Edit  Personal-Info

    public function editPersonalInfo(Request $Request)
    {

        if(isset(auth()->user()->GetPerson))
        {
            $person = auth()->user()->GetPerson;
            $person_id = auth()->user()->GetPerson->id;
            $cities = City::all();
        


            // $city_id=City::select("city_id")->where('id', $person_id)
            // ->join('people', 'cities.city_id', '=', 'people.city_id')
            // ;


            return view('person.editPersonalInfo',compact('person','cities'));
        }
        else
        {
            return view('person.addResume');
        }
    }

    public function updatPersonalInfo(Request $Request)
    {
        $Request->validate([
            'fname'=> ['required','string' , 'max:20'] ,
            'father_name'=> ['required','string' , 'max:20'] ,
            'Lname'=> ['required','string', 'max:20'] ,
            'gender'=> ['required'] ,
            'military_service'=> ['required'] ,
            'marital_status'=> ['required'] ,
            'dob'=> ['required','date'] ,
            
            // 'place_Of_b'=> ['required','string'] ,
            // 'Current_address'=> ['required','string'] ,
            // 'fixed_phone'=> ['required','integer'] ,
            'mobile_number'=> ['required','string'] ,
            'lang'=>['required'] ,
            'user_id'=>['unique:Person'] ,
          
        ],[
            'fname.string' =>'يجب أن لا يحتوي حقل الاسم سوى على حروف.',
            'father_name.string' =>'يجب أن لا يحتوي حقل الاسم سوى على حروف.',
            'Lname.string' =>'يجب أن لا يحتوي حقل الاسم سوى على حروف.',
            'fname.required'=>'يجب تعبئة حقل الاسم',
            'father_name.required'=>'يجب  تعبئة  حقل اسم الأب',
            'Lname.required'=>'يجب تعبئة حقل الكنية  ',
            'gender.required'=>'يجب اختيار حقل الجنس  ',
            'military_service.required'=>'يجب   اختيار حقل خدمة العلم ',
            'marital_status.required'=>'يجب  اختيار حقل الوضع العائلي   ',
            'dob.required'=>'يجب ادخال  حقل  تاريخ  الميلاد   ',
            // 'place_Of_b.required'=>'يجب ادخال  حقل  مكان  الولادة   ',
            'mobile_number.required'=>'يجب تعبئة حقل رقم الموبايل   ',
            'lang.required'=>'يجب  اختيار حقل  اللغة   ',
            // 'email.required'=>'يجب  ادخال البريد الالكتروني ',
            //'national_number.required'=>'يجب  ادخال حقل الرقم الوطني  ',
            // 'Current_address.required'=>'يجب  ادخال حقل  مكان الاقامة الحالي   ',
            // 'fixed_phone.required'=>'يجب  تعبئة  حقل الهاتف الأرضي  ',
        ]);

            $person = auth()->user()->GetPerson;

            $person->Fname = $Request->input("fname");
            $person->Father_name = $Request->input("father_name");
            $person->Lname = $Request->input("Lname");
            $person->gender= $Request->input("gender");
            $person->dob= $Request->input("dob");
             $person->ci_id = $Request->input("city");
            // $person->place_Of_b = $Request->input("place_Of_b");
            $person->marital_status= $Request->input("marital_status");
            $person->military_service= $Request->input("military_service");
            $person->mobile_number= $Request->input("mobile_number");
            $person->lang= $Request->input("lang");
            // $person->national_number= $Request->input("national_number");
            // $person->email =  $Request->input("email");
            // $person->Current_address= $Request->input("Current_address");
            // $person->fixed_phone= $Request->input("fixed_phone");
            $person->user_id= auth()->user()->id;
        if($person)
        {
            $person->save();
            return back();
        }
        else
        {
            return back()->withInput()->with('fail','هناك خطأ ما');
        }
    }

    public function updatPersonalInfo2(Request $Request)
    {
        
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
   


   



///////////////////////////////////////////////////////////edit///////////////////
 
//show resume for add edu - skills - courses
    public function createResumeEdu()
    {
        if(isset(auth()->user()->GetPerson)){
        $jobCat =JobCategory::all();
        $person = auth()->user()->GetPerson;
        $pid= $person->id;

        $person_cat = DB::table('job_categories')
        ->join('person_categories', 'job_categories.cat_id', '=', 'person_categories.category_id')
        ->where('person_categories.person_id', $pid)->get();
       
        return view('person.addResumeEdu',compact('person','jobCat','person_cat'));
        }
        else
        return redirect()->route('resuem.create');
    }

// show form for add person Education
    public function createPersonEdu($id)
    {

        return view('person.addEdu', ['id' => $id]);
    }


//store person Education
    public function storePersonEdu(Request $Request)

    {
        $person =auth()->user()->GetPerson;
        $Request->validate([
            'degree_name'=> ['required','string'] ,
            'Institution'=> ['required','string'] ,
            'Degree'=> ['required','string'] ,
            // 'Major'=> ['required','string'] ,
            // 'person_id'=>['unique:Person'] ,
          
        ],[
            'degree_name.required'=>'يجب تعبئة حقل اسم الشهادة',
            'Institution.required'=>'يجب  تعبئة  حقل  المؤسسة التعليمية',
            'Degree.required'=>'يجب  اختيار الدرجة/الشهادة    ',
            'Major.required'=>'يجب    تعبئة حقل اختصاص الشهادة ',
        ]);

      
        
        $personEdu =new PersonEducation ;
            $personEdu->degree_name = $Request->input("degree_name");
            $personEdu->Institution =  $Request->input("Institution");
            $personEdu->Degree= $Request->input("Degree");
            $personEdu->Major= $Request->input("Major");
            $personEdu->Graduation_year = $Request->input("Graduation_year");
            if($Request->has('still_study')){
                $arrayTostring =implode(',',$Request->input('still_study'));
                $personEdu->still_study = $arrayTostring;}
           
            
         
            $personEdu->person_id=  auth()->user()->GetPerson->id;
            $personEdu->save();

            return back();
            // return redirect()->route('edu');
        //    return redirect()->route('edu', ['id' => $id]);
          
 }


        //show form for add person *****Experience*****
    // public function createPersonExp($id)
    // {

    //     return view('person.addExperience', ['id' => $id]);
    // }

//store person Experience
    
         //show form for add person *****Skill*****
    // public function createPersonSkill($id)
    // {

    //     return view('person.addSkill', ['id' => $id]);
    // }

//store person Skill
    


          //show form for add person *****Course*****
    // public function createPersonCourse($id)
    // {

    //     return view('person.addCourse', ['id' => $id]);
    // }

//store person ****Course****


// **********  show form for Job Category *******

// public function createResumeJobCat($id)
// {
//     $jobCat =JobCategory::all();
//     $Person = Person::find($id);
//     return view('person.addCategory',compact('Person','jobCat'));
// }
    

// store person job category


public function storePersonJobCat(Request $Request)

{
    $input = $Request->input("category");
    foreach($input as $cat)
    {
        $PersonCategory =new PersonCategory ;
        $PersonCategory->category_id= $cat;
        $PersonCategory->person_id= auth()->user()->GetPerson->id;
        $PersonCategory->save();
    }

    return redirect()->route('edu');

   // $id = $Request->input("pid");
    //return redirect()->route('edu', ['id' => $id]);

   
    }

                  /////////////////  DELETE ************



    public function DeletePersonEdu($id)
    {
        $res=PersonEducation::find($id)->delete();
        return redirect()->back();
       
    }

    public function DeletePersonCat($id)
    {
        if(isset(auth()->user()->GetPerson))
        {
            $person = auth()->user()->GetPerson;
        }
            
        $pid= $person->id;
        $res=PersonCategory::where('person_id',$pid)->where('category_id',$id)->delete();
        return redirect()->back();
        
    }


public function editPersonEdu($cid)
{

   $Edu= PersonEducation::find($cid);
   
       
    return view('person.editEdu',compact('Edu'));

    

}

public function updateEdu(Request $Request)
 {

    $person_id=auth()->user()->GetPerson->id;
    // $Edu = PersonEducation::where('id' , $person_id);

    // $Edu->degree_name=$Request->input("degree_name");
    // $Edu->Institution=$Request->input("Institution");
    // $Edu->Degree=$Request->input("Degree");
    // $Edu->Major=$Request->input("Major");
    // if($Request->has('still_study'))
    // {
    //     $arrayTostring =implode(',',$Request->input('still_study'));
    //     $Edu->still_study = $Request->input("still_study");
    // }
    //     // if($Request->has('still_study')){
    //     //     $Edu->$still_study=$Request->still_study;
    //     // }
    // $Edu->Graduation_year=$Request->input("Graduation_year");
    
    //    if($Edu){
    //      $Edu->save();
    //     return redirect()->route('edu')->with('success','  تمّ التعديل بنجاح');
    // }else{
    //     return back()->withInput()->with('fail','هناك خطأ ما');
    // }
    
    $Edu = PersonEducation::where('id' , $person_id)
    
       ->update([
        'degree_name' => $Request->input("degree_name"),
        'Institution' => $Request->input("Institution"),
        'Degree' => $Request->input("Degree"),
        'Major' => $Request->input("Major"),
        // 'still_study' =>implode(',',$Request->input('still_study')),
        'Graduation_year' => $Request->input("Graduation_year"),
        'person_id' =>  auth()->user()->GetPerson->id,

       ]);
      
       if($Edu){
        
        return redirect()->route('edu')->with('success','  تمّ التعديل بنجاح');
    }else{
        return back()->withInput()->with('fail','هناك خطأ ما');
    }
         
        


    }




 

}

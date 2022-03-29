<?php

namespace App\Http\Controllers;
use App\Models\PersonExperience;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ExpController extends Controller
{
    //
    public function storePersonExp(Request $Request)
    {
        $Request->validate([
            'Job_title'=> ['required','string'] ,
            'job_Specialize'=> ['required','string'] ,
            'company_name'=> ['required','string'] ,
            'Start_date'=> ['required','date'] ,
            // 'end_date'=> ['required','date'] ,
            'Responsibilities'=> ['required'] ,
            'person_id'=>['unique:Person'] ,
          
        ],[
            'Job_title.required'=>'يجب تعبئة حقل  المنصب الوظيفي',
            'job_Specialize.required'=>'يجب  تعبئة  حقل   اختصاص العمل',
            'company_name.required'=>'يجب   تعبئة حقل اسم الشركة',
            'company_address.required'=>'يجب    تعبئة حقل  عنوان الشركة ',
            'Start_date.required'=>'يجب     اختيار تاريخ بدء العمل   ',
            'Responsibilities.required'=>'يجب  تعبئة حقل المسؤوليات   ',
        ]);

       

        $personExp =new PersonExperience ;
            $personExp->Job_title = $Request->input("Job_title");
            $personExp->job_Specialize =  $Request->input("job_Specialize");
            $personExp->company_name= $Request->input("company_name");
            $personExp->Start_date = $Request->input("Start_date");
            $personExp->end_date = $Request->input("end_date");
            if($Request->has('still_work')){
                $arrayTostring =implode(',',$Request->input('still_work'));
                $personExp->still_work = $arrayTostring;}
            
            $personExp->Responsibilities= $Request->input("Responsibilities");
            $personExp->person_id= auth()->user()->GetPerson->id;


        
            $personExp->save();

            return redirect()->route('edu');
       
            
            
      
    }

    public function editPersonExperience($cid)
    {
        $Exp= PersonExperience::find($cid);
        if($Exp && $Exp->person_id == auth()->user()->GetPerson->id )
        {
            return view('exps.editExperience',compact('Exp'));
        }
        else{
            abort(404);
        }
    }

    public function updateExperience(Request $Request)
    {
        $cid = $Request->input("cid");
        $Exp = PersonExperience::where('id' , $cid)
            ->update([
            'Job_title' => $Request->input("Job_title"),
            'job_Specialize' => $Request->input("job_Specialize"),
            'company_name' => $Request->input("company_name"),
            'Start_date' => $Request->input("Start_date"),
            'end_date' => $Request->input("end_date"),
            'still_work'=> $Request->input("still_work"),
            'Responsibilities' => $Request->input("Responsibilities"),
            'person_id' =>  auth()->user()->GetPerson->id,
        ]);
        if($Exp)
        {
            return redirect()->route('edu')->with('success','  تمّ التعديل بنجاح');
        }
        else
        {
            return back()->withInput()->with('fail','هناك خطأ ما');
        }
    }

    public function DeletePersonExperience($id)
    {
        $res=PersonExperience::find($id)->delete();
        if ($res)
        {
            return redirect()->back()->with('success', ' تم الحذف بنجاح');
        }
        else
        {
            return redirect()->back()->with('success', ' لم يتم الحذف يرجى المحاولة مرة ثانية');
        }
    }

}

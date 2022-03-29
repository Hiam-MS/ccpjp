<?php

namespace App\Http\Controllers;
use App\Models\PersonCourse;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    //

    public function editPersonSkill($cid )
    {
        $skill= PersonSkill::find($cid);
        if($skill && $skill->person_id == auth()->user()->GetPerson->id )
        {
            return view('person.editSkill',compact('skill'));
        }
        else
        {
            abort(404);
        }
    }

    public function storePersonCourse(Request $Request)
    {
        $Request->validate([
            'name'=> ['required','string'] ,
        ]);

        $PersonCourse =new PersonCourse ;
        $PersonCourse->name = $Request->input("name");
        $PersonCourse->person_id= auth()->user()->GetPerson->id;
        if($PersonCourse)
        {
            $PersonCourse->save();
            return redirect()->route('edu')->with('success','  تمت الاضافة بنجاح');
        }
        else
        {
            return back()->withInput()->with('fail','هناك خطأ ما');
        }
    }
    public function editPersonCourse($cid)
    {
        $course= PersonCourse::find($cid);
        if($course && $course->person_id == auth()->user()->GetPerson->id)
        {
            return view('person.editCourse',compact('course')); 
        }
        else
        {
            abort(404);
        }
        
    }

    public function updateCourse(Request $Request)
    {
        $Request->validate([
            'name'=> ['string'] ,
        ]);

        // $id = $Request->input("pid");
        $cid = $Request->input("cid");
        $course = PersonCourse::where('id' , $cid)
        ->update([
            'name' => $Request->input("name"),
            'person_id' => auth()->user()->GetPerson->id,
            ]);
        if ($course)
        {
            return redirect()->route('edu')->with('success', ' تم التعديل بنجاح');
        }
        else
        {
            return redirect()->back()->with('fail', ' لم يتم التعديل يرجى المحاولة مرة ثانية');
        }   
    }

    public function DeletePersonCourse($id)
    {
        $res=PersonCourse::find($id)->delete();
        if ($res)
        {
            return redirect()->back()->with('success', ' تم الحذف بنجاح');
        }
        else
        {
            return redirect()->back()->with('fail', ' لم يتم الحذف يرجى المحاولة مرة ثانية');
        }
    }
}

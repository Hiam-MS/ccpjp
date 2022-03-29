<?php

namespace App\Http\Controllers;
use App\Models\PersonSkill;
use Illuminate\Http\Request;

class SkillController extends Controller
{
    //

    public function storePersonSkill(Request $Request)
    {
        $Request->validate([
        'name'=> ['required','string'] ,
        ],[
            'name.required'=>'يجب   ادخال حقل اسم المهارة     ',
        ]);

        $personSkill =new PersonSkill ;
        $personSkill->name = $Request->input("name");
        $personSkill->person_id= auth()->user()->GetPerson->id;
        if($personSkill)
        {
            $personSkill->save();
            return redirect()->back();
        }
        else
        {
            return back()->withInput()->with('fail','هناك خطأ ما');
        }
    }

    public function editPersonSkill($cid )
    {
        $skill= PersonSkill::find($cid);
        if($skill && $skill->person_id == auth()->user()->GetPerson->id )
        {
            return view('person.skills.editSkill',compact('skill'));
        }
        else
        {
            abort(404);
        }
    }

    public function updateSkill(Request $Request)
    {
        $Request->validate([
            'name'=> ['string'] ,
        ]);
        $cid = $Request->input("cid");

        $skill = PersonSkill::where('id' , $cid)
            ->update([
            'name' => $Request->input("name"),
            'person_id' => auth()->user()->GetPerson->id,
        ]);
         
       if($skill)
        {
            return redirect()->route('edu')->with('success', ' تم التعديل بنجاح');
        }
        else
        {
            return redirect()->back()->with('fail', ' لم يتم التعديل يرجى المحاولة مرة ثانية');
        }   
    }

    public function DeletePersonSkill($id)
    {
        $res=PersonSkill::find($id)->delete();
        return redirect()->back();
       
    }   
}

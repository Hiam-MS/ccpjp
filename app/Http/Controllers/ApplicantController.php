<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Job;
use App\Models\Person;
use App\Models\ApplyedJob;
use DB;

class ApplicantController extends Controller
{

    public function getApplicationForm($id)
    {
        $job = Job::find($id);

        return view('job.applicationForm',compact('job'));
    }





    public function applyedJob()
    {
        $id = auth()->user()->GetPerson->id;
        $person =auth()->user()->GetPerson;
      

        $jobs = DB::table('applyed_jobs')
        ->join('jobs', 'applyed_jobs.job_id', '=', 'jobs.id')
        ->when($id, function ($query) use ($id) {
                return $query->where('applyed_jobs.person_id', $id);
            })
        ->orderBy('applyed_jobs.created_at', 'desc')
        ->get();
        return view('person.progressRecord',compact('jobs','person'));

    }

    


    public function getApplyedToJob($id)
    {

        $job = Job::findOrFail($id);
        $person =auth()->user()->GetPerson;
        
        $applicants = DB::table('applyed_jobs')
       
        ->join('jobs', 'applyed_jobs.job_id', '=', 'jobs.id')
        ->join('people', 'applyed_jobs.person_id', '=', 'people.id')
        ->where(function ($query) use ($id) {
                    $query->where('applyed_jobs.job_id', $id);
             })  
        ->orderBy('applyed_jobs.created_at', 'desc')
        ->get();

      
           
       return view('company.viewApplyedToJob', compact('job', 'applicants'));

    }


    public function hire($id,$user) {
        $job = Job::findOrFail($id);
        $applicant = DB::table('applyed_jobs')
            ->when($id, function ($query) use ($id) {
                    return $query->where('job_id', $id);
                })
            ->when($user, function ($query) use ($user) {
                    return $query->where('person_id', $user);
                })
            ->update(['choice' => 'hired']); 
            if($applicant)  {
                return redirect()->route('Applicants',['id' => $id])->with('success','  تم قبول المرشح بنجاح  ');
            }else{
                return back()->withInput()->with('fail','هناك خطأ ما');
            }
          
        
    }  

    public function reject($id,$user) {
       
        $job = Job::findOrFail($id);
        $applicant = DB::table('applyed_jobs')
            ->when($id, function ($query) use ($id) {
                    return $query->where('job_id', $id);
                })
            ->when($user, function ($query) use ($user) {
                    return $query->where('person_id', $user);
                })
            ->update(['choice' => 'rejected']);   
            if($applicant)  {
                return redirect()->route('Applicants',['id' => $id])->with('success','  تم رفض المرشح بنجاح  ');
            }else{
                return back()->withInput()->with('fail','هناك خطأ ما');
            }
            
           
    }  


    




    public function storeApplyedJob(Request $request)
    {
        

            $Applyedjob =new ApplyedJob ;
            $Applyedjob->job_id=  $request->input('job');
            $Applyedjob->person_id= auth()->user()->GetPerson->id;
            $Applyedjob->choice='pennding';

           
            if($Applyedjob){
                $Applyedjob->save();
                return redirect()->route('ApplyedJob')->with('success','  تمّ التقدم بنجاح');
            }else{
                return back()->withInput()->with('fail','هناك خطأ ما');
            }




    }
  



}

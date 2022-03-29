<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Job;
use App\Models\Company;
use App\Models\CompanyActivity;
use App\Models\City;
use Carbon\Carbon;
use App\Models\User;
use App\Models\CompanyAddInformation;


use Illuminate\Support\Facades\DB;

class CompanyController extends Controller
{
    //
   
    
    public function createProfile()
    {
        $activities=CompanyActivity::all();
        $cities =City::all();
        return view('company.addProfile',compact('activities','cities'));
    }

    // public function showCompany()
    // {
    //     $company=Company::all();
        

    //     return view ('company.showCompany',compact('company'));
    // }
    public function viewProfile()
    {
        $company=auth()->user()->GetCompany;
        return view('company.viewProfile',compact('company'));
    }

    public function editCompanyProfile()
    {
        if(isset(auth()->user()->GetCompany)){
            $company=auth()->user()->GetCompany;
            $cities =City::all();
            return view('company.editProfile',compact('company'));
        }
        else
        return redirect()->route('company.profile');
    }

    public function updatCompanyProfile(Request $Request)
    {
        $company = auth()->user()->GetCompany;
        $activity=$Request->input('activity');
        $city=$Request->input('city');
        $company->company_name=$Request->company_name;
        
        $company->email=$Request->email;
        $company->fixed_phone=$Request->fixed_phone;
        // $company->mobile=$Request->mobile;
        // $company->fax_phone=$Request->fax_phone;
        // $company->location=$Request->location;
        $company->cci_id=$Request->city;
        $company->act_id=$Request->activity;
        $company->user_id= auth()->user()->id;
        

        if($company){
            $company->save();
            return back()->withInput();
        }else{
            return back()->withInput()->with('fail','هناك خطأ ما');
        }
        
        
    }

    public function updatCompanyProfile2(Request $Request)
    {
        

        $company = auth()->user()->GetCompany;
        // $company->commercial_record=$Request->input("commercial_record");
        // $company->industria_record=$Request->input("industria_record");
        // $company->website=$Request->input("website");
        $company->user_id= auth()->user()->id;
        if($company)
        {
            $company->save();

            return redirect()->route('CompanyDash');
        }
        else
        {
            return back()->withInput()->with('fail','هناك خطأ ما');
        }
        
        
    }

  

    public function storeProfile(Request $Request)
    {
        
        $Request->validate([
            'company_name'=>'required|',
            'email'=>'required|email',
            'fixed_phone'=>'required|numeric',
            // 'fax_phone'=>'required|numeric',
            // 'location'=>'required',
            
            // 'commercial_record'=>'required|alpha_num|',
            // 'industria_record'=>'required|alpha_num',
            // 'website'=>'required|starts_with:www',
        

        ],[
            'company_name.required'=>'بجب ادخال الاسم بالعربي',
            'email.required'=>'بجب ادخال البريد الالكتروني للشركة  ',
            'fixed_phone.required'=>'بجب ادخال رقم الهاتف الأرضي ',
            // 'fax_phone.required'=>'بجب ادخال رقم  الفاكس ',
            // 'location.required'=>'بجب ادخال عنوان الشركة   ',
            
            // 'commercial_record.required'=>'بجب ادخال  السجل التجاري ',
            // 'industria_record.required'=>'بجب ادخال  السجل الصناعي  ',
            // 'website.required'=>'بجب ادخال موقع الانترنت للشركة  ',
        ]);

       
      

        $company =new Company ;
            $company->company_name = $Request->input("company_name");
            $company->email= $Request->input("email");
            $company->fixed_phone= $Request->input("fixed_phone");
            $company->mobile = $Request->input("mobile");
            $company->cci_id = $Request->input('city');
            $company->act_id = $Request->input('activity');
              // $company->location= $Request->input("location");
            // $company->company_specialist= $Request->input("company_specialist");
            // $company->company_name_en =  $Request->input("company_name_en");
            // $company->commercial_record= $Request->input("commercial_record");
            // $company->industria_record= $Request->input("industria_record");
            // $company->website= $Request->input("website");
         
            $company->user_id= auth()->user()->id;

          

        
       
       if($company){
        $company->save();
           return redirect()->route('CompanyDash')->with('success','  تمّ التسجيل بنجاح');
       }else{
           return back()->withInput()->with('fail','هناك خطأ ما');
       }


    }


    public function getDash()
    {
        return view('company.company_dash');
    }
// get company published jobs
    public function getJob()
    {
        
        if(isset(auth()->user()->GetCompany))
        {
            $company=auth()->user()->GetCompany;
            $company_id=auth()->user()->GetCompany->id;

            $jobs = Job::where('company_id', $company_id)
            ->whereDate('end_job', '>', Carbon::today()->toDateString())
            ->orderBy('created_at', 'desc')
            ->paginate(5);

          
            return view('company.shortList', compact('company','jobs'));
        }
        else
        {
            return redirect()->route('company.profile');
        }
       
       
    }

    public function endJobs()
    {
        
        if(isset(auth()->user()->GetCompany))
        {
            $company=auth()->user()->GetCompany;
            $company_id=auth()->user()->GetCompany->id;

            $jobs = Job::where('company_id', $company_id)
            ->whereDate('end_job', '<=', Carbon::today()->toDateString())
            ->orderBy('created_at', 'desc')
            ->paginate(5);

          
            return view('company.endJobs', compact('company','jobs'));
        }
        else
        {
            return redirect()->route('company.profile');
        }
       
       
    }


    public function update_JobEnd($id){
      
        $company=auth()->user()->GetCompany;
        $job = Job::find($id);
        $job->end_job =Carbon::now() ;
        $job->save();
            
            return back()->withInput()->with('success','  تم الانهاء بنجاح');

    }


    public function addCompanyInfo(Request $request)
    {
        if(isset(auth()->user()->GetCompany))
        {
            // $company = auth()->user()->GetCompany;
            $company = auth()->user()->GetCompany;
            $activities=CompanyActivity::all();
            $cities=City::all();
            $activity=$request->input('activity');
            $city=$request->input('city');
           
        


            return view('company.additionalInfo',compact('company','activities','cities'));
        }
        else
        {
            return view('company.addProfile');
        }
       
        
    }


    

}

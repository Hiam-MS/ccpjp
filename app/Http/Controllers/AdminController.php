<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Country;
use App\Models\City;
use DB;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\Job;
use App\Models\Company;
use App\Models\Person;
use App\Models\Governorate;
use App\Models\CompanyActivity;


class AdminController extends Controller
{
    
    public function getDash()
    {
        return view('admin.dashboard');
    }

    public function show()
    {
        $country =Country::all();
        return view('admin.add-Country',compact('country'));
    }


    // public function addCountry()
    // {
    //     $country =new Country();

    //     $country->country_name="امارات";
    //     $country->save();
    //     return "DOOOOON";
        
    // }
    // public function addCity($id)
    // {
    //     $country =Country::find($id);
    //     $city= new City();
    //     $city->city_name="دبي";
    //     $country->cities()->save($city);
    //     return "DOne";

    // }


    public function pendingJob()
    {
       
        $job = DB::table('jobs')->where('status', 'pending')->get();
        return view('admin.pending_job',compact('job'));

 


    }

    public function accepte_JobStatuse($id){
      
        $job = Job::find($id);
        $job->status ='accepted' ;
        $job->save();
            
        if($job){
           
            return redirect()->back()->with('success','  تمّت عملية القبول بنجاح');
        }else{
            
            return redirect()->back()->with('fail','  هناك خطأ ما');
        }

    }

    public function denied_JobStatuse($id){
      
        
        $job = Job::find($id);
        $job->status = 'denied';
        $job->save();
            
        if($job){
           
            return redirect()->back()->with('success','  تمّت عملية الرفض بنجاح');
        }else{
            
            return redirect()->back()->with('fail','  هناك خطأ ما');
        }

    }

    public function showCompany(Request $request)
    {
        if(Auth()->user()->role == 'a'){

            $comName=$request->input('comName');
            $activities=CompanyActivity::all();
            $cities=City::all();
            if($request->has('comName')){
                $companies=User::where(function ($query) {
                    $query->where('role', 'c')
                            ->orWhere('role', 'd');})
                            ->orderBy('created_at', 'desc')
                            ->paginate(10);
                    $comDetail=Company::where('company_name','LIKE','%'.$comName.'%')->orWhere('mobile', 'LIKE','%'.$comName.'%')
                        ->paginate(10);
                        return view ('admin.showCompany',compact('companies','comDetail','activities','cities'));
                }
                if($request->has('city')){
                    $companies=User::where(function ($query) {
                        $query->where('role', 'c')
                                ->orWhere('role', 'd');})
                                ->orderBy('created_at', 'desc')
                                ->paginate(10);
                        $comDetail=Company::where('company_name','LIKE','%'.$comName.'%')->orWhere('mobile', 'LIKE','%'.$comName.'%')
                            ->paginate(10);
                            return view ('admin.showCompany',compact('companies','comDetail','activities','cities'));
                    }
            else{
                $companies=User::where(function ($query) {
                    $query->where('role', 'c')
                          ->orWhere('role', 'd');
                        })
            ->orderBy('created_at', 'desc')
            ->paginate(10);
            $comDetail=Company::orderBy('created_at', 'desc')
            ->paginate(10);
            
     
                return view ('admin.showCompany',compact('companies','comDetail','activities','cities'));
            }


           
        }
        else{
            abort(403);
        }
        
    }
 
    public function BanCompany(Request $request){

        $id = $request->id;
    	$user = User::find($id);
    	$user->role = 'd';
    	$user->save();
        return back();
       
    }
    public function unBanCompany(Request $request){

        $id = $request->id;
    	$user = User::find($id);
    	$user->role = 'c';
    	$user->save();
        return back();
    }

    public function showPeople(){
        if(Auth()->user()->role == 'a'){
            $people=User::where(function ($query) {
                $query->where('role', 'p')
                      ->orWhere('role', 'e');
                    })
        ->orderBy('created_at', 'desc')
        ->paginate(10);
        $peopleDetail=Person::orderBy('created_at', 'desc')
        ->paginate(50);
        
 
            return view ('admin.showPeople',compact('people','peopleDetail'));
        }
        else{
            abort(403);
        }
        
    }
    public function BanPeople(Request $request){
        $id = $request->id;
    	$user = User::find($id);
    	$user->role = 'e';
    	$user->save();
        return back();
       
    }
    public function unBanPeople(Request $request){
        $id = $request->id;
    	$user = User::find($id);
    	$user->role = 'p';
    	$user->save();
        return back();
       
    }
    public function showJobs(){
        if(Auth()->user()->role == 'a'){
            $jobs = Job::join('job_categories', 'jobs.category_id', '=', 'job_categories.cat_id')
            ->orderBy("created_at", "desc")->paginate(15);
        
 
            return view ('admin.showJobs',compact('jobs'));
        }
        else{
            abort(403);
        }
        
    }

    // public function showCitites(){
    //     if(Auth()->user()->role == 'a'){
    //         $cities=City::paginate(30);
    //     $governorates=Governorate::all();
 
    //         return view ('admin.city.show',compact('cities'));
    //     }
    //     else{
    //         abort(403);
    //     }
  
    // }
    public function showGovernorate(){
        
        return view('admin.showPeople');
    }
    public function showCompanyActivity(){
        
        return view('admin.showPeople');
    }
    public function showCategory(){
        
        return view('admin.showPeople');
    }
    public function addCategory(){
        
        return view('admin.showPeople');
    }
    public function addCompanyActivity(){
        
        return view('admin.showPeople');
    }
    public function addCity(){
        
        return view('admin.showPeople');
    }
    public function addGovernorate(){
        
        return view('admin.showPeople');
    }
  
 

    public function showCompanyDetail(Request $request){
        if(Auth()->user()->role == 'a'){
            $id = $request->id;
            $company=Company::find($id);
            $cities=City::all();
            $activities=CompanyActivity::all();
            return view('admin.company.companyDetail',compact('company','cities','activities'));
        }
        else{
            abort(403);
        }
    }

    public function updateCompanyDetail(Request $Request)
    {
        if(Auth()->user()->role == 'a'){
            
            $id = $Request->id;
            $companies=Company::find($id);

            $activity=$Request->input('activity');
            $city=$Request->input('city');
            
            $companies->company_name=$Request->company_name;
            $companies->email=$Request->email;
            $companies->fixed_phone=$Request->fixed_phone;
            $companies->mobile=$Request->mobile;
            $companies->cci_id=$Request->city;
            $companies->act_id=$Request->activity;
            // $companies->industria_record=$Request->industria_record;
            // $companies->commercial_record=$Request->commercial_record;
            // $companies->website=$Request->website;
           
            $companies->save();
            return back()->withInput()->with('success','  Successfull Update');
        }
        else{
            abort(403);
        }
    }

    public function showPeopleDetail(Request $request){
        if(Auth()->user()->role == 'a'){
            $id = $request->id;
            $person=Person::find($id);
            $cities=City::all();
            
            return view('admin.people.peopleDetail',compact('person','cities'));
        }
        else{
            abort(403);
        }
    }

    
   
    
    
}

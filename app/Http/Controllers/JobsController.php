<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Job;
use App\Models\Company;
use App\Models\JobCategory;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use App\Models\City;
use Carbon\Carbon;

class JobsController extends Controller
{
    public function index()
    {
        return view('welcome');
    }

    public function addJob()
    {
        if(isset(auth()->user()->GetCompany))
        {
            $categories = JobCategory::all();
            $cities = City::all();
            $company_id=auth()->user()->getCompany->id;
            $company=DB::table('companies')->where('id', $company_id)
            ->join('cities', 'companies.cci_id', '=', 'cities.city_id')
           ->first();
            return view('job.addJob',compact('company','categories','cities'));
        }
        else
        {
            return redirect()->route('company.profile');
        }
   
      
    }

    public function JobDetails($id)
    {
        if(auth()->user())
        {
            if(Auth()->user()->role == 'p')
            {
                $job = Job::find($id);
                $person_id = auth()->user()->GetPerson->id;

                $exist = DB::table('applyed_jobs')->where('job_id', $id)->where('person_id', $person_id)->first();
                if ($exist == null)
                {
                    $result = 'not exist';          
                } 
                else
                {
                    $result = 'exist';
                }  
                return view('job.jobDetails',compact('job','result'));
            }
          else
            {
                $job = Job::find($id);
            
            
            return view('job.jobDetails',compact('job'));
          }


       
        } 
     
       
        else
        {
            $job = Job::find($id);
            return view('job.jobDetails',compact('job'));
        }
   
   
      
    }




//     public function showJob(Request $request)
//     {
//         $categories = JobCategory::all();
//         $category = $request->input('category');
        
    
//       if($request->has('category')) 
//         { 
//             $jobs = DB::table('jobs')->where('category_id', $category)
//             ->join('job_categories', 'jobs.category_id', '=', 'job_categories.cat_id')
//             ->whereDate('end_job', '>', Carbon::today()->toDateString())
//             ->orderBy('created_at', 'desc')
//             ->paginate(10);
//         }
//     //     else
//     //     {
//     //         $jobs = DB::table('jobs')
//     //         ->join('job_categories', 'jobs.category_id', '=', 'job_categories.id')
//     //         // $jobs = DB::table('jobs')
//     //         ->whereDate('end_job', '>', Carbon::today()->toDateString())->Where('status','=','accepted')->paginate(20);
//     //     }
         
//     //     return view('job.showJobs',compact('jobs','category','categories'));
//     //     // return view('job.showJobs');


// else{
//     $jobs = DB::table('jobs')
//     ->join('job_categories', 'jobs.category_id', '=', 'job_categories.cat_id')
//     ->whereDate('end_job', '>', Carbon::today()->toDateString())->Where('status','=','accepted')->paginate(20);
// }
   
//     return view('job.showJobs',compact('jobs','category','categories'));

      
       
//     }

public function showJob(Request $request)
{
    $categories = JobCategory::all();
    $cities=City::all();
    $category = $request->input('category');
    $city=$request->input('city');
    $job_type=$request->input('job_type');


    $search = $request->input('search');

 
    // if($request->has('category') && $request->has('city') ) 
    // {
    //     if( $request->has('job_type')){
    //         $jobs = Job::where('category_id', $category)->where('city',$city)->where('job_type',$job_type)
    //         ->whereDate('end_job', '>', Carbon::today()->toDateString())
    //         ->Where('status','=','accepted')
    //         ->join('job_categories', 'jobs.category_id', '=', 'job_categories.cat_id')
    //         ->orderBy('created_at', 'desc')
    //         ->paginate(10);
    //     }
    //     else{
    //         $jobs = Job::where('category_id', $category)->where('city',$city)
    //         ->whereDate('end_job', '>', Carbon::today()->toDateString())
    //         ->Where('status','=','accepted')
    //         ->join('job_categories', 'jobs.category_id', '=', 'job_categories.cat_id')
    //         ->orderBy('created_at', 'desc')
    //         ->paginate(10);
    //     }
        
    // }


    // if($request->has('category')){
    //     if($request->has('city'))
    //     {
    //         if($request->has('job_type'))
    //         {
    //             $jobs = Job::where('category_id', $category)->where('city', $city)->where('job_type', $job_type)
    //             ->whereDate('end_job', '>', Carbon::today()->toDateString())
    //             ->Where('status','=','accepted')
    //             ->join('job_categories', 'jobs.category_id', '=', 'job_categories.cat_id')
    //             ->orderBy('created_at', 'desc')
    //             ->paginate(10);
    //         }else{
    //             $jobs = Job::where('category_id', $category)->where('city', $city)
    //             ->whereDate('end_job', '>', Carbon::today()->toDateString())
    //             ->Where('status','=','accepted')
    //             ->join('job_categories', 'jobs.category_id', '=', 'job_categories.cat_id')
    //             ->orderBy('created_at', 'desc')
    //             ->paginate(10);
    //         }
           
  

        
    // }
    // elseif($request->has('city')){

    //     $jobs = Job::where('city', $city)
    //     ->whereDate('end_job', '>', Carbon::today()->toDateString())
    //     ->Where('status','=','accepted')
    //     ->join('job_categories', 'jobs.category_id', '=', 'job_categories.cat_id')
    //     ->orderBy('created_at', 'desc')
    //     ->paginate(10);
    // }
    // elseif($request->has('job_type')){

    //     $jobs = Job::where('job_type', $job_type)
    //     ->whereDate('end_job', '>', Carbon::today()->toDateString())
    //     ->Where('status','=','accepted')
    //     ->join('job_categories', 'jobs.category_id', '=', 'job_categories.cat_id')
    //     ->orderBy('created_at', 'desc')
    //     ->paginate(10);
    // }
 
    
    
    // elseif($request->has('city') && $category == NULL && $job_type == NULL){
        
    //     $jobs = Job::where('city', $city)
    //     ->whereDate('end_job', '>', Carbon::today()->toDateString())
    //     ->Where('status','=','accepted')
    //     ->join('job_categories', 'jobs.category_id', '=', 'job_categories.cat_id')
    //     ->orderBy('created_at', 'desc')
    //     ->paginate(10);
    // }
    

   
        if($request->has('category') && $job_type == NULL && $city == NULL){
        
        $jobs = Job::where('category_id', $category)
        ->whereDate('end_job', '>', Carbon::today()->toDateString())
        ->Where('status','=','accepted')
        ->join('job_categories', 'jobs.category_id', '=', 'job_categories.cat_id')
        ->orderBy('created_at', 'desc')
        ->paginate(10);
    }
         elseif($request->has('category') && $request->has('city') && $job_type == NULL){
        $jobs = Job::where('category_id', $category)->where('city', $city)
        ->whereDate('end_job', '>', Carbon::today()->toDateString())
        ->Where('status','=','accepted')
        ->join('job_categories', 'jobs.category_id', '=', 'job_categories.cat_id')
        ->orderBy('created_at', 'desc')
        ->paginate(10);

    }
    elseif($request->has('job_type') && $category == NULL && $city == NULL){
        
        $jobs = Job::where('job_type', $job_type)
        ->whereDate('end_job', '>', Carbon::today()->toDateString())
        ->Where('status','=','accepted')
        ->join('job_categories', 'jobs.category_id', '=', 'job_categories.cat_id')
        ->orderBy('created_at', 'desc')
        ->paginate(10);
    }
       elseif($request->has('city') && $category == NULL && $job_type == NULL){
        
        $jobs = Job::where('city', $city)
        ->whereDate('end_job', '>', Carbon::today()->toDateString())
        ->Where('status','=','accepted')
        ->join('job_categories', 'jobs.category_id', '=', 'job_categories.cat_id')
        ->orderBy('created_at', 'desc')
        ->paginate(10);
    }
    elseif($request->has('category') && $request->has('city') && $request->has('job_type')){
        $jobs = Job::where('category_id', $category)->where('city', $city)->where('job_type', $job_type)
        ->whereDate('end_job', '>', Carbon::today()->toDateString())
        ->Where('status','=','accepted')
        ->join('job_categories', 'jobs.category_id', '=', 'job_categories.cat_id')
        ->orderBy('created_at', 'desc')
        ->paginate(10);

    }
else{
    $jobs = Job::Where('status','=','accepted')->join('job_categories', 'jobs.category_id', '=', 'job_categories.cat_id')
    ->orderBy("created_at", "desc")->paginate(10);

    // $jobs = Job::whereDate('end_job', '>', Carbon::today()->toDateString())->Where('status','=','accepted')->join('job_categories', 'jobs.category_id', '=', 'job_categories.cat_id')
    // ->orderBy("created_at", "desc")->paginate(10);
}

    // if($category !=NULL && $city !=NULL && $job_type !=NULL){
    //    if($request->has('category')){

    //    }else{
    //    $jobs = Job::where('category_id', $category)
    //     ->whereDate('end_job', '>', Carbon::today()->toDateString())
    //     ->Where('status','=','accepted')
    //     ->join('job_categories', 'jobs.category_id', '=', 'job_categories.cat_id')
    //     ->orderBy('created_at', 'desc')
    //     ->paginate(10);
    //    }




   


    // if($request->has('category')) 
    // {
    //     if($request->has('city') )
    //     {
    //         if($request->has('job_type'))
    //         {
    //             $jobs = Job::where('category_id', $category)->where('city',$city)->where('job_type',$job_type)
    //             ->whereDate('end_job', '>', Carbon::today()->toDateString())
    //             ->Where('status','=','accepted')
    //             ->join('job_categories', 'jobs.category_id', '=', 'job_categories.cat_id')
    //             ->orderBy('created_at', 'desc')
    //             ->paginate(10);
    //         }
    //         else
    //         {
    //             $jobs = Job::where('category_id', $category)->where('city',$city)
    //             ->whereDate('end_job', '>', Carbon::today()->toDateString())
    //             ->Where('status','=','accepted')
    //             ->join('job_categories', 'jobs.category_id', '=', 'job_categories.cat_id')
    //             ->orderBy('created_at', 'desc')
    //             ->paginate(10);
    //         }
    //     }
    //     else
    //     {
    //         $jobs = Job::where('category_id', $category)
    //         ->whereDate('end_job', '>', Carbon::today()->toDateString())
    //         ->Where('status','=','accepted')
    //         ->join('job_categories', 'jobs.category_id', '=', 'job_categories.cat_id')
    //         ->orderBy('created_at', 'desc')
    //         ->paginate(10);
    //     }
    // }
    // else
    // {
    //     $jobs = Job::whereDate('end_job', '>', Carbon::today()->toDateString())->Where('status','=','accepted')->join('job_categories', 'jobs.category_id', '=', 'job_categories.cat_id')
    //     ->orderBy("created_at", "desc")->paginate(15);
    // }

    // if($request->has('category') && $category != 'NULL')
    // {
    //     $jobs=Job::select("*")->where('category_id','category')
    //     ->whereDate('end_job', '>', Carbon::today()->toDateString())->Where('status','=','accepted')
    //     ->join('job_categories', 'jobs.category_id', '=', 'job_categories.cat_id')
    //     ->orderBy("created_at", "desc")->paginate(15);
    // }
    // else
    // {
    //     $jobs=Job::select("*")
    //     ->whereDate('end_job', '>', Carbon::today()->toDateString())->Where('status','=','accepted')
    //     ->join('job_categories', 'jobs.category_id', '=', 'job_categories.cat_id')
    //     ->orderBy("created_at", "desc")->paginate(15);
    // }
    
//  if($request->has('title') && $title != 'NULL') 
// {
//     if($request->has('category') && $category != 'NULL') {
//         if($request->has('category') && $category != 'NULL') {

//             $jobs = DB::table('jobs')->where('job_title' , $title)->where('category_id', $category)->where('city', $city)

//             ->join('cities' , 'jobs.city_id' , '=', 'cities.city_id')
//             ->whereDate('end_job', '>', Carbon::today()->toDateString())
//             ->orderBy('created_at', 'desc')
//             ->paginate(10);
//         }
//         else{
//             $jobs = DB::table('jobs')->where('job_title' , $title)->where('category_id', $category)
//             ->join('job_categories', 'jobs.category_id', '=', 'job_categories.cat_id')
//             ->whereDate('end_job', '>', Carbon::today()->toDateString())
//             ->orderBy('created_at', 'desc')
//             ->paginate(10);
//         }
          

        
//     }
//     else{
//         $jobs=Job::where('job_title' , $title)->paginate(5);
//     }
  
// }
//  else{
    
       

//     $jobs=Job::select("*")
//     ->whereDate('end_job', '>', Carbon::today()->toDateString())->Where('status','=','accepted')
//     ->join('job_categories', 'jobs.category_id', '=', 'job_categories.cat_id')
//     ->orderBy("created_at", "desc")->paginate(10);

// }


    // if($request->has('category') && $category != 'NULL') 
    // {
    //     if($request->has('city') && $city != null) {
    //         $jobs = Job::where('category_id', $category)
    //         ->where(function ($query) use ($city) {
    //                 $query->where('title', 'like', '%'.$search.'%')
    //                       ->orWhere('body', 'like', '%'.$search.'%');
    //         })->orderBy('created_at', 'desc')
    //         ->paginate(5)
    //         ->appends([
    //             'category' => request('category'),
    //             'city' => request('city')
    //         ]);
    //     }
       
        
        
       
    // }
    // else{
    //     $jobs = DB::table('jobs')->where('category_id', $category)
    //     ->join('job_categories', 'jobs.category_id', '=', 'job_categories.cat_id')
    //     ->whereDate('end_job', '>', Carbon::today()->toDateString())
    //     ->orderBy('created_at', 'desc')
    //     ->paginate(10);
    // }






    // if($request->has('category') && $cat != 'all') {
    //     if($request->has('search') && $search != null) {
    //         $jobs = Job::where('category_id', $cat)
    //         ->where(function ($query) use ($search) {
    //                 $query->where('job_title', 'like', '%'.$search.'%')
    //                       ;
    //         })->orderBy('created_at', 'desc')
    //         ->paginate(5)
    //         ->appends([
    //             'cat' => request('cat'),
    //             'search' => request('search')
    //         ]);
    //     } else {
    //         $jobs = Job::where('category_id', $cat)
    //         ->orderBy('created_at', 'desc')
    //         ->paginate(5)
    //         ->appends([
    //             'cat' => request('cat')
    //         ]);
    //     } 
    // else {
    //     $jobs = Job::where('job_title', 'like', '%'.$search.'%')
     
    //     ->orderby('created_at', 'desc')
    //     ->paginate(5)
    //     ->appends([
    //         'search' => request('search')
    //     ]);
    // }
    
    return view('job.showJobs', compact('categories', 'jobs', 'category', 'search','cities','city'));
}

    public function records(Request $request)
    {
        if ($request->ajax()) 
        {
            $categories = JobCategory::all();
            $category = $request->input('category');
            $jobs = DB::table('jobs')
            ->join('job_categories', 'jobs.category_id', '=', 'job_categories.id')
            // $jobs = DB::table('jobs')
            ->whereDate('end_job', '>', Carbon::today()->toDateString())->Where('status','=','accepted')->get();
         
            return response()->json([
                'jobs' => $jobs
            ]);
        } 
        else 
        {
            return response()->json([
                'jobs' => $jobs
            ]);
        }
    }



     /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

     
    public function storeJob(Request $Request)
    { 
        $Request->validate([
            // 'category'=>'required',
            'job_title'=>'required',
            // 'number_of_employess'=>'required',
            // 'budget'=>'required',
            // 'job_requirement'=>'required',
            // 'functional_tasks'=>'required',
            // 'end_job'=>'required',
           
            // 'city'=>'required',
            'gender'=>'required',
            'military_service'=>'required',
            'degree'=>'required',
            'job_type'=>'required',
            
        ],[
            'job_title.required'=>'يجب ادخال المسمى الوظيفي لفرصة العمل',
            'category.required'=>'يجب اختيار اختصاص العمل المطلوب',
            'number_of_employess.required'=>'يجب اختيار اختصاص العمل المطلوب',
            'budget.required'=>'يجب  ادخال الراتب المطلوب لهذه الوظيفة او الفوائد',
            'job_requirement.required'=>'يجب  ادخال  المؤهلات المطلوبة لهذه الوظيفة  ',
            'functional_tasks.required'=>'يجب  ادخال  المؤهلات المطلوبة لهذه الوظيفة  ',
            'end_job.required'=>'يجب  اختيار المدة المعينة لعرض فرصة العمل  ',
            
            'city.required'=>'يجب  اختيار المدينة  ',
            'gender.required'=>'يجب  اختيار الجنس المطلوب للعمل  ',
            'military_service.required'=>'يجب  اختيار  طبيعة خدمة العلم  ',
            'degree.required'=>'يجب  اختيار  الحد الادنى المطلوب لفرصة العمل  ',
            
            'job_type.required'=>'يجب  اختيار   طبيعة فرصة العمل  ',
        ]);

        $selected=30;

        $job =new Job ;
        $job->company_name = $Request->input("company_name");
        $job->job_title =  $Request->input("job_title");
        // $job->number_of_employess= $Request->input("number_of_employess");
        $job->budget= $Request->input("budget");
        $job->job_requirement = $Request->input("job_requirement");
        $job->functional_tasks = $Request->input("functional_tasks");
        // $job->end_job=$Request->input("end_job");
        $job->end_job = Carbon::now()->addDays($selected);
        // $job->country= $Request->input("country");
        $job->city= $Request->input("city");
        $job->gender= $Request->input("gender");
        $job->military_service= $Request->input("military_service");
        $job->degree= $Request->input("degree");
        $job->job_type= $Request->input("job_type");
        $job->category_id = $Request->input('category');
        $job->company_id= auth()->user()->GetCompany->id;

       if($job){
            $job->save();
            return redirect()->route('CompanyJob')->with('success',' تمّ تسجيل طلبكم بالنشر يرجى الانتظار لحين قبول المنشور');
        }else{
            return back()->withInput()->with('fail','هناك خطأ ما');
        }

    }


    
}

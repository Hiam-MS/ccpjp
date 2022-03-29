<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\JobCategory;


class JobCategoryController extends Controller
{
    
    public function index()
    {
        return view('welcome');
    }

    public function showJobJobCategory()
    {
        $Categories =JobCategory::all();

        return dd($Categories);
        //return view('welcome',compact('Categories'));
    }

    public function show($id)

    {
        
        $joJobCategory= JobCategory::find($id);
        return view('test',compact('joJobCategory'));
       

        
    }
}

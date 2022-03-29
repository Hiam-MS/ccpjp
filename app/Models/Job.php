<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use tiagomichaelsousa\LaravelFilters\Traits\Filterable;
class Job extends Model
{
    use HasFactory;
    // use Filterable;

    //Job belongs to one Company
    function Company() 
    {
    	return $this->belongsTo(Company::class);
    }

    //Jobs has one Job category
    function jobCategory() 
    {
    	return $this->belongsTo(JobCategory::class,'category_id');
    }

    //Job has many Person 
    public function PersonTOThisJobs()
    
    {
  
        return $this->belongsToMany(Person::class,'applyed_jobs');
    }

    //Job has one city
   function City()
    {
        return $this->belongsTo(City::class);
    }




}

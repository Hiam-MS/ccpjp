<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Crypt;

class Person extends Model
{
    use HasFactory;

    protected $table = 'people';

    protected $primaryKey = 'id';

    protected $casts = [
        'lang' => 'json'
    ];

    //protected $fillable = ['name'];

    // public function setNationalNumberAttribute($value)
    // {
    //      $this->attributes['national_number'] = Crypt::encryptString($value);
    // }

    //     public function getNationalNumberAttribute($value)
    //     {
    //         try{

    //              return Crypt::decryptString($value);
    //            }catch(DecryptException $e) {
    //                 return $value;
    // }
    //     }




    public function City()
    {
        return $this->belongsTo(City::class,'ci_id');
    }


    //Person has one or more  Skill
    public function PersonSkill()
    {
        return $this->hasMany(PersonSkill::class);
    }

    //Person has one or more Course
    public function PersonCousre()
    {
        return $this->hasMany(PersonCourse::class);
    }

    //Person has one or more Experience
    public function PersonExperience()
    {
        return $this->hasMany(PersonExperience::class);
    }

    //Person has one or more Education
    public function PersonEducation()
    {
        return $this->hasMany(PersonEducation::class);
    }

    //Person has many Job Category
    public function JobCategory()

    {
        return $this->belongsToMany(JobCategory::class,'person_categories');

    }

    //Person has manyJob
    public function PersonApplyedJobs()
    
    {
        return $this->belongsToMany(Job::class,'applyed_jobs');
    }

   
    public function getNextAttribute(){

        return static::where('id', '>', $this->id)->orderBy('id','asc')->first();

    }
    public  function getPreviousAttribute(){

        return static::where('id', '<', $this->id)->orderBy('id','desc')->first();

    }
    public function users()
    {
        return $this->belongsTo(User::class,'user_id');
    }



}

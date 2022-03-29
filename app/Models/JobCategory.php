<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobCategory extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';


    // Job Category belongs to many Person
    // Job has many person --> one to many relation 

    public function Person()
    {
        return $this->belongsToMany(Person::class);
    }

    // Job Category belongs to many Job
    // Job Category has many Job --> one to many relation 
    public function Job()
    {
        return $this->hasMany(Job::class);
    }

}

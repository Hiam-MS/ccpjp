<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';
    
    //Company has many job
    public function Job()
    {
        return $this->hasMany(Job::class);
    }
    function Activity() 
    {
    	return $this->belongsTo(CompanyActivity::class,'act_id');
    }
    public function City()
    {
        return $this->belongsTo(City::class,'cci_id');
    }
    public function users()
    {
        return $this->belongsTo(User::class,'user_id');
    }
    
}

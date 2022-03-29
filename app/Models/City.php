<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory;
    
    protected $primaryKey ='city_id';

    //City belongs to a country
    public function Governorate()
    {
        return $this->belongsTo(Governorate::class,'gove_id');
    }
    public function People()
    {
        return $this->hasMany(People::class);
    }
    public function Company()
    {
        return $this->hasMany(Company::class);
    }
}

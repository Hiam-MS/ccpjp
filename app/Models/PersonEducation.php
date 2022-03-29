<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PersonEducation extends Model
{
    use HasFactory;
    protected $primaryKey = 'edu_id';


    //Education belongs to one Person
    public function Person()
    {
        return $this->belongTo(Person::class);
    }
}

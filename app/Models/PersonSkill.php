<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PersonSkill extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';


    //Skill belongs to one Person
    public function Person()
    {
        return $this->belongTo(Person::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PersonExperience extends Model
{
    use HasFactory;
    //protected $table = 'people';

    protected $primaryKey = 'id';

   

    //protected $fillable = ['name'];


    //Experience Belongs to one Person
    public function Person()
    {
        return $this->belongTo(Person::class);
    }
}

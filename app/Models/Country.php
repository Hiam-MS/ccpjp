<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    use HasFactory;

    protected $primaryKey ='id';

    // protected $fillable =['country_name'];

    public function cities()
    {
        return $this->hasMany(City::class);
    }


    public function peoples()
    {
        return $this->hasMany(Person::class);
    }
}

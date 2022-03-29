<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Governorate extends Model
{
    use HasFactory;
    protected $primaryKey = 'governorate_id';
    
    public function City()
    {
        return $this->hasMany(City::class);
    }
}

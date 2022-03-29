<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompanyActivity extends Model
{
    use HasFactory;
    protected $primaryKey = 'activity_id';
    
    public function Company()
    {
        return $this->hasMany(Company::class);
    }

}

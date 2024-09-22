<?php

namespace App\Models;

use App\Models\Semester;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class AcademicYear extends Model
{
    use HasFactory;

    protected $fillable = ['academic_year','status','user_id'];

    
    public function semesters() :HasMany
    {
        return $this->hasMany(Semester::class, 'academic_year_id');
    }

    

}

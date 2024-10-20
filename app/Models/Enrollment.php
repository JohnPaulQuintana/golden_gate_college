<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Enrollment extends Model
{
    use HasFactory;
    protected $fillable = ['student_no', 'program_id','course_id', 'semester_id', 'user_id', 'academic_year_id','year_level_with_subject_id', 'fullname', 'gender', 'contact_number', 'civil_status', 'nationality', 'date_of_birth', 'place_of_birth', 'age', 'guardian_fullname', 'address', 'elementary', 'elementary_year', 'secondary', 'secondary_year', 'senior_high', 'senior_high_year', 'status'];
}

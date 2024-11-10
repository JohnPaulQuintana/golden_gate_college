<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TeacherSubject extends Model
{
    use HasFactory;
    protected $fillable = ['user_id','subject_id','college_level_number','college_level_name','subject_name','subject_code'];
}

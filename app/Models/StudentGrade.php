<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentGrade extends Model
{
    use HasFactory;
    protected $fillable = ['student_id','teacher_id','subject_id','semester','student_grade'];
}

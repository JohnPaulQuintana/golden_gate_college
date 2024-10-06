<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class YearLevelWithSubjects extends Model
{
    use HasFactory;
    protected $fillable = ['user_id','program_id','year_level','selected_subject_ids'];
}

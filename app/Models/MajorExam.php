<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MajorExam extends Model
{
    use HasFactory;
    protected $fillable = ['grade_id','semis','finals'];
}
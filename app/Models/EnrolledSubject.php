<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EnrolledSubject extends Model
{
    use HasFactory;

    protected $fillable = ['enrollment_id', 'subject_id'];
}

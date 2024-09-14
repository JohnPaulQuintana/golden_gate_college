<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Teacher extends Model
{
    use HasFactory;

    protected $fillable = ['teacher_id','department_id'];

    //belong to department
    public function department() :BelongsTo
    {
        return $this->belongsTo(Department::class, 'department_id');
    }

    //belongs to users table
    public function users() :BelongsTo
    {
        return $this->belongsTo(User::class, 'teacher_id');
    }
}

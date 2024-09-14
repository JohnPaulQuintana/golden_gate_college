<?php

namespace App\Models;

use App\Models\Teacher;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Department extends Model
{
    use HasFactory;

    protected $fillable = ['department_name','department_code','dean_id'];

    public function dean() :BelongsTo
    {
        return $this->belongsTo(User::class, 'dean_id');
    }

    public function teachers() :HasMany
    {
        return $this->hasMany(Teacher::class, 'department_id');
    }
}

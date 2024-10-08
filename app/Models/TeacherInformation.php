<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class TeacherInformation extends Model
{
    use HasFactory;
    protected $fillable = ['user_id','birthdate','address'];

    public function users() :BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Liabilities extends Model
{
    use HasFactory;
    protected $fillable = ['user_id','liabilities_description','status', 'academic_year_id', 'semester_id', 'ammount'];

    public function user() :BelongsTo{
        return $this->belongsTo(User::class, 'user_id');
    }
}

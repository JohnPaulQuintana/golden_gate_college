<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Information extends Model
{
    use HasFactory;
    protected $fillable = ['user_id','firstname','lastname','middlename','email','birthdate','address','guardian_firstname','guardian_lastname','guardian_middlename','guardian_contact_number'];

    public function user() :BelongsTo{
        return $this->belongsTo(User::class, 'user_id');
    }
}

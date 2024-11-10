<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Models\Information;
use App\Models\Teacher;
use App\Models\TeacherInformation;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'role',
        'name',
        'email',
        'password',
        'profile'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    // Constants for dashboard routes
    public const ADMIN = 'admin.dashboard';
    public const STUDENT = 'student.dashboard';
    public const TEACHER = 'teacher.dashboard';

    public function information() :HasOne{
        return $this->hasOne(Information::class, 'user_id');
    }

    /**
     * Relationship to the Department.
     * A user (like a teacher, dean, or student) belongs to a department.
     */
    public function department()
    {
        return $this->belongsTo(Department::class, 'dean_id');
    }
    /**
     * Relationship to the Department.
     * A user (like a teacher, dean, or student) belongs to a department.
     */
    public function teachers()
    {
        return $this->belongsTo(Teacher::class, 'teacher_id');
    }

    public function teacherInformation() :HasOne
    {
        return $this->hasOne(TeacherInformation::class, 'user_id');
    }

    public function liabilities() :HasMany
    {
        return $this->hasMany(Liabilities::class, 'user_id');
    }

  
}

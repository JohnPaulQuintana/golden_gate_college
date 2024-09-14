<?php

namespace App\Services;

use App\Models\Department;
use App\Models\Teacher;
use App\Models\User;

class TeacherService
{
    /**
     * Generate initials from a name.
     *
     * @param string $name
     * @return string
     */
    public function getTeachers()
    {
        $teachers = User::where('role','teacher')->get();
        return $teachers; // Output: JD
    }
    /**
     * Generate teacher role.
     *
     * @param string $name
     * @return string
     */
    public function getRoleTeachers()
    {
        $teachers = User::whereIn('role',['dean','teacher'])->paginate(10);
        return $teachers; // Output: JD
    }

    /**
     * Generate all department.
     *
     * @param string $name
     * @return string
     */
    public function getDesignatedTeachers($dept_id)
    {
        $designatedTeachers = Teacher::with('users')->where('department_id',$dept_id)->latest()->paginate(10);
        return $designatedTeachers; // Output: JD
    }
}

<?php

namespace App\Services;

use App\Models\Department;
use App\Models\User;

class DepartmentService
{
    /**
     * Generate all department.
     *
     * @param string $name
     * @return string
     */
    public function getDepartments()
    {
        $departments = Department::with(['dean', 'teachers.users'])->latest()->paginate(10);
        return $departments; // Output: JD
    }
}

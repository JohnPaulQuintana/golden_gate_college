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
    public function getTeachersRole()
    {
        $staticRoles = ['dean','registrar','cashier'];
        return $staticRoles; // Output: JD
    }
    
}

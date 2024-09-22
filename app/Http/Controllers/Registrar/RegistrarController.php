<?php

namespace App\Http\Controllers\Registrar;

use App\Http\Controllers\Controller;
use App\Models\Department;
use App\Models\Teacher;
use App\Models\TeacherInformation;
use App\Models\User;
use App\Services\InitialService;
use App\Services\TeacherService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Validation\ValidationException;

class RegistrarController extends Controller
{
    protected $initialService;
    protected $teacherService;
    public function __construct(InitialService $initialService, TeacherService $teacherService)
    {
        $this->initialService = $initialService;
        $this->teacherService = $teacherService;
    }
    public function registrar()
    {
        $dept_id = Department::where('dean_id',Auth::user()->id)->first();
        $initial = $this->initialService->getInitials(Auth::user()->name); 
        $teachers = $this->teacherService->getDesignatedTeachers($dept_id->id);
        // dd($teachers);
        return view('registrar.users.add', compact('initial', 'teachers'));
    }

}

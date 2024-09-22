<?php

namespace App\Http\Controllers\Department;

use App\Http\Controllers\Controller;
use App\Models\Department;
use App\Models\User;
use App\Services\InitialService;
use App\Services\TeacherService;
use App\Services\DepartmentService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Validation\ValidationException;

class DepartmentController extends Controller
{
    protected $initialService;
    protected $teacherService;
    protected $departmentService;
    // Inject the InitialService into the controller
    public function __construct(
        InitialService $initialService, TeacherService $teacherService,
        DepartmentService $departmentService)
    {
        $this->initialService = $initialService;
        $this->teacherService = $teacherService;
        $this->departmentService = $departmentService;
    }
    //display forms
    public function department()
    {
        $role = Auth::user()->role;
        $initial = $this->initialService->getInitials(Auth::user()->name);
        //used for select dropdown
        $teachers = $this->teacherService->getTeachers();
        $teachersRole = $this->teacherService->getTeachersRole();
        //return department with dean and associated teachers
        $departments = $this->departmentService->getDepartments();
        // dd($departments);
        return view('admin.department.add', compact('initial','teachers','departments','teachersRole'));
    }
    //insert department
    public function addDepartment(Request $request)
    {
        // dd($request);
        $validatedDepartment = $request->validate([
            'department_name' => 'required|string|max:255',
            'dean_id' => 'required|exists:users,id',
            'role' => 'required|string|',
        ], [
            'role.required' => 'The role is required.',
            'department_name.required' => 'The department name is required.',
            'department_name.string' => 'The department name must be a valid string.',
            'department_name.max' => 'The department name may not be greater than 255 characters.',
            'dean_id.required' => 'The dean ID is required.',
            'dean_id.exists' => 'The selected dean ID is invalid. Please select a valid user.',
        ]);

        //department code
        $department_code = $this->initialService->generateDepartmentCode($validatedDepartment['department_name']); 
        //check if the department is already created based on code
        $existing_department = Department::where('department_code',$department_code)->first();

        // Assuming $existing_department is a boolean or a condition that checks for the existence of a department
        if ($existing_department) {
            throw ValidationException::withMessages([
                'department_name' => 'The department name already exists. Please choose a different name.',
            ]);
        }

        // Create a new Department
        $department = Department::create([
            'department_name' => $validatedDepartment['department_name'],
            'department_code' => $department_code,
            'dean_id' => $validatedDepartment['dean_id'],
        ]);

        // Check if the department was created successfully
        if ($department) {
            // Update the user's role to 'dean'
            User::find($validatedDepartment['dean_id'])->update([
                'role' => $validatedDepartment['role'],
            ]);
        }

        return Redirect::route('admin.department')->with(['status'=>'success','message'=>'You added '.$validatedDepartment['department_name'].' on our record!']);
    }
}

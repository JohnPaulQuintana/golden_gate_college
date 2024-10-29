<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Information;
use App\Models\User;
use App\Services\InitialService;
use App\Services\TeacherService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Validation\ValidationException;

class AdminController extends Controller
{
    //
    protected $initialService;
    protected $teacherService;
    public function __construct(InitialService $initialService, TeacherService $teacherService)
    {
        $this->initialService = $initialService;
        $this->teacherService = $teacherService;
    }
    public function teacher()
    {
        // $dept_id = Department::where('dean_id',Auth::user()->id)->first();
        // dd($dept_id);
        $initial = $this->initialService->getInitials(Auth::user()->name); 
        $teachers = $this->teacherService->getRoleTeachers();
        // dd($teachers);
        return view('admin.teachers.add', compact('initial','teachers'));
    }

    //add teacher
    public function addTeacher(Request $request)
    {
        // $dept_id = Department::where('dean_id',Auth::user()->id)->first();
        // // dd($dept_id->id);
        $validatedTeacher = $request->validate([
            'firstname' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'birthdate' => 'required|date|date_format:Y-m-d',
            'address' => 'required|string|max:255',
        ], [
            'firstname.required' => 'The first name is required.',
            'lastname.required' => 'The last name is required.',
            'email.required' => 'The email is required.',
            'email.email' => 'The email must be a valid email address.',
            'email.unique' => 'The email address is already taken.',
            'birthdate.required' => 'The birthdate is required.',
            'birthdate.date' => 'The birthdate must be a valid date.',
            'birthdate.date_format' => 'The birthdate must be in YYYY-MM-DD format.',
            'address.required' => 'The address is required.',
            'address.string' => 'The address must be a string.',
            'address.max' => 'The address may not be greater than 255 characters.',
        ]);

        //check if the department is already created based on code
        $existing_teacher = User::where('name',$validatedTeacher['firstname']. ' '.$validatedTeacher['lastname'])->first();

        // Assuming $existing_department is a boolean or a condition that checks for the existence of a department
        if ($existing_teacher) {
            throw ValidationException::withMessages([
                'firstname' => 'The firstname already exists. Please choose a firstname.',
                'lastname' => 'The lastname already exists. Please choose a lastname.',
            ]);
        }

        $user = User::create([
            'role' => 'teacher',
            'name' => $validatedTeacher['firstname']. ' '.$validatedTeacher['lastname'],
            'email' => $validatedTeacher['email'],
            'password' => Hash::make('password'),
            
        ]);

        return Redirect::route('admin.teacher')->with(['status'=>'success','message'=>'You added '.$validatedTeacher['firstname'].' '.$validatedTeacher['lastname'].' on our record!']);
    }

    public function teacherList() {
        $teachers = User::where('role', 'teacher')->paginate(10);
        $role = Auth::user()->role;
        $initial = $this->initialService->getInitials(Auth::user()->name);
        return view($role.'.teachers.list', compact('initial', 'teachers'));
    }

    public function teacherEdit($id) {
        $teacher = User::find($id);
        $role = Auth::user()->role;
        $initial = $this->initialService->getInitials(Auth::user()->name);

        if (!$teacher) return Redirect::back();

        return view($role.'.teachers.edit', compact('initial', 'teacher'));
    }

    public function updateTeacherInfo(Request $request, $id) {
        $validatedRequest = $request->validate([
            'firstname' => 'required',
            'lastname' => 'required',
            'email' => 'required',
            'birthdate' => 'required',
            'address' => 'required',
            'middlename' => 'required'
        ]);

        $user = User::find($id);
        $information = Information::where('user_id', $id);
        $emailExists = User::where('email', $validatedRequest['email'])->first();

        if ($emailExists && $emailExists->id != $user->id) {
            return Redirect::route('admin.teacher.edit.page', ['id' => $user->id])->withErrors(['email' => 'Email address is already in use!']);;
        }

        if($user){
            $user->update([
                'name' => $validatedRequest['firstname'].' '.$validatedRequest['lastname'],
                'email' => $validatedRequest['email'],
                'password' => Hash::make($validatedRequest['birthdate']),
            ]);

            $information->update([
                'user_id' => $user->id,
                'firstname' => $validatedRequest['firstname'],
                'lastname' => $validatedRequest['lastname'],
                'middlename' => $request->middlename,
                'email' => $validatedRequest['email'],
                'birthdate' => $validatedRequest['birthdate'],
                'address' => $validatedRequest['address'],
                'guardian_firstname' => $validatedRequest['guardian_firstname'],
                'guardian_lastname' => $validatedRequest['guardian_lastname'],
                'guardian_middlename' => $request->guardian_middlename,
                'guardian_contact_number' => $validatedRequest['guardian_contact_number'],
            ]);

        } else {
            return Redirect::back();
        }

        return Redirect::route('admin.teacher.list')->with(['status'=>'success','message'=>'You updated '.$user->name.' on our record!']);
    }
}

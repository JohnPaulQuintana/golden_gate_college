<?php

namespace App\Http\Controllers\Dean;

use App\Http\Controllers\Controller;
use App\Models\AcademicYear;
use App\Models\Department;
use App\Models\Program;
use App\Models\Semester;
use App\Models\Teacher;
use App\Models\TeacherInformation;
use App\Models\User;
use App\Rules\YearDifference;
use App\Services\AbbreviationService;
use App\Services\InitialService;
use App\Services\TeacherService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Validation\ValidationException;

class DeanController extends Controller
{
    //
    protected $initialService;
    protected $teacherService;
    protected $abbreviationService;
    public function __construct(InitialService $initialService, TeacherService $teacherService, AbbreviationService $abbreviationService)
    {
        $this->initialService = $initialService;
        $this->teacherService = $teacherService;
        $this->abbreviationService = $abbreviationService;
    }

    public function teacher()
    {
        $dept_id = Department::where('dean_id',Auth::user()->id)->first();
        // dd($dept_id);
        $initial = $this->initialService->getInitials(Auth::user()->name); 
        $teachers = $this->teacherService->getDesignatedTeachers($dept_id->id);
        // dd($teachers);
        return view('dean.teachers.add', compact('initial', 'teachers'));
    }

    //display academic
    public function academic()
    {
        $dept_id = Department::where('dean_id',Auth::user()->id)->first();
        // dd($dept_id);
        $initial = $this->initialService->getInitials(Auth::user()->name);
        $academicYears = AcademicYear::with('semesters')->where('user_id', Auth::user()->id)->paginate(10);
        
        // dd($academicYears);
        $programs = Program::where('user_id',Auth::user()->id)->get();
        return view('dean.academic.manage', compact('initial', 'academicYears', 'programs'));
    }

    
    

    //add teacher
    public function addTeacher(Request $request)
    {
        $dept_id = Department::where('dean_id',Auth::user()->id)->first();
        // dd($dept_id->id);
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

        if($user){
            $tech_info = TeacherInformation::create([
                'user_id' => $user->id,
                'birthdate' => $validatedTeacher['birthdate'],
                'address' => $validatedTeacher['address'],
            ]);

            if($tech_info){
                Teacher::create([
                    'department_id' => $dept_id->id,
                    'teacher_id' => $user->id,
                ]);

                return Redirect::route('dean.teacher')->with(['status'=>'success','message'=>'You added '.$validatedTeacher['firstname'].' '.$validatedTeacher['lastname'].' on our record!']);
            }
        }
    }

    //add semester
    public function semester(Request $request)
    {
        // dd($request);
        $validatedAcademicYear = $request->validate([
            'starting_year' => 'required|integer',
            'end_year' => ['required', 'integer', new YearDifference],
            'semester' => 'required',
            'program' => 'required',
            'status' => 'required',
        ]);

        if($validatedAcademicYear)
        {
            $existing_academic_year = AcademicYear::where('academic_year', $validatedAcademicYear['starting_year'].'-'.$validatedAcademicYear['end_year'])->first();
            // dd($existing_academic_year);
            if(!$existing_academic_year){
                $ay = AcademicYear::create([
                    'user_id' => Auth::user()->id,
                    'academic_year' => $validatedAcademicYear['starting_year'].'-'.$validatedAcademicYear['end_year'],
                    'status' => $validatedAcademicYear['status'],
                ]);
                if($ay){
                    Semester::create([
                        'academic_year_id' => $ay->id,
                        'name' => $validatedAcademicYear['semester'],
                        'abbrev' => $validatedAcademicYear['program']
                    ]);
                }
            }else{
                //check if has already has a semester
                $existing_semester = Semester::where('academic_year_id',$existing_academic_year->id)->where('name',$validatedAcademicYear['semester'])->where('abbrev', $validatedAcademicYear['program'])->first();
                if(!$existing_semester){
                    Semester::create([
                        'academic_year_id' => $existing_academic_year->id,
                        'name' => $validatedAcademicYear['semester'],
                        'abbrev' => $validatedAcademicYear['program']
                    ]);
                }else{
                    throw ValidationException::withMessages([
                        'semester' => 'The semester for '.$validatedAcademicYear['program'].' already exists. Please choose a semester.',
                    ]);
                }
                // throw ValidationException::withMessages([
                //     'starting_year' => 'The starting year already exists. Please choose a starting year.',
                //     'end_year' => 'The end year already exists. Please choose a end year.',
                // ]);
            }
        }

        return Redirect::route('dean.academic')->with(['status'=>'success','message'=>'You added academic year '.$validatedAcademicYear['starting_year'].'-'.$validatedAcademicYear['end_year'].' - '.$validatedAcademicYear['semester'].'semester on our record!']);
    }
}

<?php

namespace App\Http\Controllers\Dean;

use App\Http\Controllers\Controller;
use App\Models\Department;
use App\Models\Program;
use App\Services\AbbreviationService;
use App\Services\InitialService;
use App\Services\TeacherService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class ProgramController extends Controller
{
    protected $initialService;
    protected $teacherService;
    protected $abbreviationService;
    public function __construct(InitialService $initialService, TeacherService $teacherService, AbbreviationService $abbreviationService)
    {
        $this->initialService = $initialService;
        $this->teacherService = $teacherService;
        $this->abbreviationService = $abbreviationService;
    }

    //program
    public function program()
    {
        $dept_id = Department::where('dean_id',Auth::user()->id)->first();
        // dd($dept_id);
        $initial = $this->initialService->getInitials(Auth::user()->name);

        $programs = Program::where('programs.user_id', Auth::user()->id)->paginate(10);
        // $programs = Program::leftjoin('enrollments','programs.id','=','enrollments.program_id')
        //     ->leftjoin('year_level_with_subjects', 'enrollments.year_level_with_subject_id','=','year_level_with_subjects.id')
        //     ->leftjoin('semesters','enrollments.semester_id','=','semesters.id')
        //     ->leftjoin('academic_years','enrollments.academic_year_id','=','academic_years.id')
        //     ->select(
        //         'programs.*', 
        //         'enrollments.student_no','enrollments.year_level_with_subject_id as year_level_id', 
        //         'enrollments.fullname', 'enrollments.gender','enrollments.contact_number','enrollments.civil_status',
        //         'enrollments.nationality','enrollments.date_of_birth','enrollments.place_of_birth','enrollments.age',
        //         'enrollments.guardian_fullname','enrollments.address','enrollments.status','enrollments.department','enrollments.created_at as enrollment_date',
        //         'year_level_with_subjects.year_level',
        //         'semesters.name as semester','academic_years.academic_year')
        //     ->where('programs.user_id', Auth::user()->id)->paginate(10);

        $programOptions = Program::where('user_id',Auth::user()->id)->get();
        // dd($programs);
        // $academicYears = AcademicYear::with(['semesters'])->where()
        return view('dean.program.manage', compact('initial','programs','programOptions'));
    }

    //add program
    public function addProgram(Request $request)
    {
        // dd($request);
        $validatedProgram = $request->validate([
            'program' => 'required|unique:programs,program',
            'description' => 'required',
            'status' => 'required',
        ]);

        if($validatedProgram){
            Program::create([
                'user_id' => Auth::user()->id,
                'program' => $validatedProgram['program'],
                'description' => $validatedProgram['description'],
                'abbrev' => $this->abbreviationService->generateAbbreviation($validatedProgram['program']),
                'is_open' => $validatedProgram['status'] 
            ]);
        }
        return Redirect::route('dean.program')->with(['status'=>'success','message'=>'You added program '.$validatedProgram['program'].' - '.$validatedProgram['status'].' on our record!']);
    }

    //update program
    public function updateProgram(Request $request)
    {
        // dd($request);
        $program = Program::find($request->program_id);
        // $programParts = explode('|', $request->program);
        // dd($program);
        if($program){
           
            $program->update([
                'program' => $request->program,
                'description' => $request->description,
                'abbrev' => $this->abbreviationService->generateAbbreviation($request->program),
            ]);
            return Redirect::route('dean.program')->with(['status'=>'success','message'=>'You updated a program '.$request->program.' on our record!']);
        }
    }
}

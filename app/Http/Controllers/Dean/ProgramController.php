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
        $programs = Program::where('user_id', Auth::user()->id)->paginate(10);
        // dd($academicYears);
        // $academicYears = AcademicYear::with(['semesters'])->where()
        return view('dean.program.manage', compact('initial','programs'));
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
}

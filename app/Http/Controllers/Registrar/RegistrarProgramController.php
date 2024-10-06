<?php

namespace App\Http\Controllers\Registrar;

use App\Http\Controllers\Controller;
use App\Models\AcademicYear;
use App\Models\Program;
use App\Models\Semester;
use App\Models\subjects;
use App\Models\YearLevelWithSubjects;
use App\Services\AbbreviationService;
use App\Services\InitialService;
use App\Services\TeacherService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RegistrarProgramController extends Controller
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

    //index
    public function program()
    {
        $initial = $this->initialService->getInitials(Auth::user()->name);
        $programs = Program::get();
        if($programs){
            foreach ($programs as $prog) {
                // dd($prog);
                $semester = Semester::with('academic_year')->where('abbrev', $prog->abbrev)->first();
                // dd($semester);
                $prog->semester = $semester;
            }
            
        }
        // dd($programs);
        return view('registrar.program.manage', compact('initial', 'programs'));
    }

    //enroll student
    public function enroll(Request $request)
    {
        // dd($request->id);
        $initial = $this->initialService->getInitials(Auth::user()->name);

        // $year_levels
        $year_levels = YearLevelWithSubjects::where('program_id',$request->id)->orderBy('year_level','asc')->get();
        foreach ($year_levels as $key => $yl) {
            // dd($yl->selected_subject_ids);
            // Decode the selected_subject_ids JSON string
            $selectedSubjectIds = json_decode($yl->selected_subject_ids, true);
            $selectedSubjects = subjects::whereIn('id',$selectedSubjectIds)->get();
            $program = Program::where('id',$yl->program_id)->first();
            // dd($program);
            $yl->formatted_level = $this->getFormattedYearLevelAttribute($yl->year_level);
            // dd($selectedSubjects);
            $yl->subjects = $selectedSubjects;
            $yl->program = $program->program;
        }
        // dd($year_levels);
        return view('registrar.enroll.enroll', compact('initial', 'year_levels'));
    }

    private function getFormattedYearLevelAttribute($year_level)
    {
        switch ($year_level) {
            case 1:
                return '1st Year';
            case 2:
                return '2nd Year';
            case 3:
                return '3rd Year';
            default:
                return "{$year_level}th Year"; // Fallback for 4 and above
        }
    }
}

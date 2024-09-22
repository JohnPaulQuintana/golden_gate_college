<?php

namespace App\Http\Controllers\Registrar;

use App\Http\Controllers\Controller;
use App\Models\AcademicYear;
use App\Models\Program;
use App\Models\Semester;
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
}

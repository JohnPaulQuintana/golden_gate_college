<?php

namespace App\Http\Controllers\StudentRecord;

use App\Http\Controllers\Controller;
use App\Models\AcademicYear;
use App\Models\Enrollment;
use App\Models\Liabilities;
use App\Models\Program;
use App\Models\Semester;
use App\Models\Tag;
use App\Services\AbbreviationService;
use App\Services\InitialService;
use App\Services\TeacherService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class StudentRecordController extends Controller
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
    
    public function studentRecord()
    {
        // dd("student records...");
        $initial = $this->initialService->getInitials(Auth::user()->name); 
        $students = Enrollment::join('programs', 'enrollments.program_id', '=', 'programs.id')
            ->join('users','enrollments.user_id','=','users.id')
            // ->join('tags','users.id','')
            ->join('semesters', 'enrollments.semester_id','=','semesters.id')
            ->join('academic_years', 'enrollments.academic_year_id','=','academic_years.id')
            ->join('year_level_with_subjects', 'enrollments.year_level_with_subject_id','=','year_level_with_subjects.id')
            ->select('enrollments.*', 'users.profile','programs.program', 'semesters.name as semester', 'academic_years.academic_year', 'year_level_with_subjects.year_level')
            ->get();
        $liabilities = Liabilities::join('academic_years','liabilities.academic_year_id','=','academic_years.id')
            ->join('semesters','liabilities.semester_id','=','semesters.id')
            ->join('users','liabilities.user_id','=','users.id')
            ->select('liabilities.*','academic_years.academic_year', 'semesters.name as semester','semesters.abbrev', 'users.name as fullname', 'users.role')
            ->where('liabilities.user_id',Auth::user()->id)->get();

        // dd($liabilities);
        foreach ($liabilities as $value) {
            $tags = Tag::where('liability_id', $value->id)->get();
                $value->tags = $tags;
            // foreach ($students as $s) {
               
            //     $tags = Tag::where('liability_id', $value->id)->where('user_id', $s->user_id)->get();
            //     $value->tags = $tags;
            //     dd($tags);
            // }
        }
        // dd($liabilities);
        $degrees = Program::get();
        return view('student-records.pages.student-records', compact('initial', 'students', 'degrees', 'liabilities'));
    }
}

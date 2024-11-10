<?php

namespace App\Http\Controllers\Roles;

use App\Http\Controllers\Controller;
use App\Models\EnrolledStudentOnSubject;
use App\Models\Enrollment;
use App\Models\Liabilities;
use App\Models\Tag;
use App\Models\User;

use App\Services\InitialService;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoleController extends Controller
{
    protected $initialService;

    public function __construct(
        InitialService $initialService)
    {
        $this->initialService = $initialService;
    }
    //dashboard riedirect
    public function index(){
        // dd('dwadwa');
        $role = Auth::user()->role;
        $initial = $this->initialService->getInitials(Auth::user()->name);
        $information = User::with('information')->where('id',Auth::user()->id)->first();
        $existingEnrollmentForm = Enrollment::join('semesters', 'enrollments.semester_id', '=','semesters.id')
        ->join('academic_years', 'enrollments.academic_year_id','=','academic_years.id')
        ->join('programs', 'enrollments.program_id','=','programs.id')
        ->join('year_level_with_subjects','enrollments.year_level_with_subject_id','=','year_level_with_subjects.id')
        ->select('enrollments.*', 'semesters.name as semester', 'academic_years.academic_year', 'programs.program','programs.abbrev','year_level_with_subjects.year_level')
        ->where('enrollments.user_id',Auth::user()->id)->first();
        // dd($information);
        $today = Carbon::today()->toDateString(); // Get today's date

        $liabilities = Liabilities::with('user')->whereDate('created_at', $today)->get();

        $tags = Tag::join('liabilities', 'tags.liability_id', '=', 'liabilities.id')
        ->join('users','liabilities.user_id', '=','users.id')
        ->join('academic_years','liabilities.academic_year_id', '=','academic_years.id')
        ->join('semesters', 'liabilities.semester_id', '=','semesters.id')
        ->select('tags.*','liabilities.liabilities_description','users.role','users.name','academic_years.academic_year', 'semesters.name as semester')
        ->where('tags.user_id', Auth::user()->id)->where('tags.status', 'unpaid')
        ->orderBy('liabilities.created_at', 'desc') // Order by the created_at column in descending order
        ->get();

        $total = Tag::join('liabilities', 'tags.liability_id','=','liabilities.id')
            ->select('tags.*','liabilities.ammount')
            ->where('tags.user_id', Auth::user()->id)->get();
        // dd($total);
        // Initialize variables to store the total for paid and unpaid
        $totalPaid = 0;
        $totalPayable = 0;

        if($total){
            

            // Iterate through each tag and accumulate totals based on status
            foreach ($total as $tag) {
                $totalPayable += $tag->ammount;
                if ($tag->status === 'paid') {
                    $totalPaid += $tag->ammount;
                }
            }
        }


        $subjects = EnrolledStudentOnSubject::join('subjects','enrolled_student_on_subjects.subject_id','=','subjects.id')
            ->join('users','enrolled_student_on_subjects.teacher_id','=','users.id')
            ->select(
                'enrolled_student_on_subjects.*',
                'subjects.subject_name', 'subjects.subject_code', 'subjects.credits',
                'users.name as teacher_name'
            )
            ->where('enrolled_student_on_subjects.student_id', Auth::user()->id)
            ->get();

        // dd($subjects);
        return view($role.'.dashboard', compact('initial','information','liabilities','tags','existingEnrollmentForm', 'totalPaid', 'totalPayable', 'subjects'));
    }
    
}

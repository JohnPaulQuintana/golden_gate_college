<?php

namespace App\Http\Controllers\Registrar;

use App\Http\Controllers\Controller;
use App\Models\AcademicYear;
use App\Models\EnrolledSubject;
use App\Models\Enrollment;
use App\Models\Liabilities;
use App\Models\Notification;
use App\Models\Program;
use App\Models\Semester;
use App\Models\subjects;
use App\Models\Tag;
use App\Models\YearLevelWithSubjects;
use App\Services\AbbreviationService;
use App\Services\InitialService;
use App\Services\TeacherService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

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

        // get all registration
        $students = Enrollment::join('semesters', 'enrollments.semester_id', '=','semesters.id')
            ->join('users', 'enrollments.user_id','=', 'users.id')
            ->join('academic_years', 'enrollments.academic_year_id','=','academic_years.id')
            ->join('programs', 'enrollments.program_id','=','programs.id')
            ->select('enrollments.*', 'users.profile','semesters.name as semester', 'academic_years.academic_year', 'programs.program')
            ->where('enrollments.status','in-process')->latest()->paginate(10);
        // dd($students);

        if($students){
            foreach ($students as $key => $value) {
                $enrolled_subjects = EnrolledSubject::join('subjects','enrolled_subjects.subject_id','=','subjects.id')
                    ->select('enrolled_subjects.*','subjects.subject_code','subjects.subject_name','subjects.credits')
                    ->where('enrollment_id',$value->id)->get();
                $value->enrolled_subjects = $enrolled_subjects;
            }
        }
        // dd($students);
        return view('registrar.program.manage', compact('initial', 'programs','students'));
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

    //proccedd
    public function proceed($id)
    {
        // dd($id);
        $student = Enrollment::find($id);
        // dd($student);
        if($student){
            $student->update([
                'status' => 'processed'
            ]);
            Notification::create([
                'user_id' => $student->user_id,
                'type' => "Application Approved - ".Auth::user()->role,
                'message' => "Your application has been approved by the registrar and is now with the cashier. Please proceed to the cashier for further processing...",
                'status' => false,
            ]);

            return Redirect::route('registrar.program')->with(['status'=>'success', 'message' => 'Enrollment status is now updated...']);
        }
    }

    //notify student
    public function notify(Request $request)
    {
        // dd($request);
        $student = Enrollment::where('id', $request->student_id)->where('status','in-process')->first();
        if($student){
            //we can chage the status or remove it skipped for now
            $student->update([
                'status' => 'resubmit'
            ]);
            Notification::create([
                'user_id' => $student->user_id,
                'type' => "Application Need To Resubmit - ".Auth::user()->role,
                'message' => $request->notify_message,
                'status' => false,
            ]);

            return Redirect::route('registrar.program')->with(['status'=>'success', 'message' => 'Call to Action is now submitted to the student...']);
        }
    }
    //untag
    public function untag($liability_id, $user_id)
    {
        // dd($liability_id, $user_id);
        $tag = Tag::where('liability_id', $liability_id)->where('user_id', $user_id)->first();

        // Check if a tag record exists
        if ($tag) {
            // Update the tag's status to "paid"
            $tag->update([
                'status' => 'paid'
            ]);

            $liability = Liabilities::where('id',$liability_id)->first();

            // Create a payment notification for the user
            Notification::create([
                'user_id' => $user_id,
                'type' => "Payment Notification - ".Auth::user()->role,
                'message' => "Your payment has been completed, amounting to Php " . number_format($liability->ammount, 2) . ". Please check your liabilities list for any remaining payments.",
                'status' => false,
            ]);

            // Redirect to the student records page with a success message
            return Redirect::route('student.records')->with([
                'status' => 'success',
                'message' => 'This student is no longer tagged on this payment.'
            ]);
        }


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

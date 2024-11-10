<?php

namespace App\Http\Controllers\Cashier;

use App\Http\Controllers\Controller;
use App\Models\AcademicYear;
use App\Models\Enrollment;
use App\Models\Liabilities;
use App\Models\Notification;
use App\Models\Program;
use App\Models\Semester;
use App\Services\AbbreviationService;
use App\Services\InitialService;
use App\Services\TeacherService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class CashierController extends Controller
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
    
    //enroll student
    public function enroll($id)
    {
        // dd($id);
        $student = Enrollment::where('user_id',$id)->first();
        if($student){

            $department = Program::join('departments','programs.user_id', '=', 'departments.dean_id')
                ->select('programs.*','departments.department_name')
                ->where('programs.id', $student->program_id)->first();
            $student->update([
               'status' => 'enrolled',
               'department' => $department->department_name
            ]);

            Notification::create([
                'user_id' => $student->user_id,
                'type' => "Application Approved - ".Auth::user()->role,
                'message' => "Congratulations! You are now officially enrolled. We’re excited to have you with us!",
                'status' => false,
            ]);

            return Redirect::route('student.records')->with(['status'=>'enrolled', 'message'=>"Congratulations! You are now officially enrolled. We’re excited to have you with us!"]);
        }
    }
}

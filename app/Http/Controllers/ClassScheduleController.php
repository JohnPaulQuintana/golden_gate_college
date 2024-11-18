<?php

namespace App\Http\Controllers;

use App\Models\ClassSchedule;
use App\Models\Notification;
use App\Models\Program;
use App\Models\User;
use App\Services\AbbreviationService;
use App\Services\InitialService;
use App\Services\TeacherService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;

class ClassScheduleController extends Controller
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
    
    //schedule public
    public function schedule()
    {
        $initial = $this->initialService->getInitials(Auth::user()->name);
        $infos = Program::where('user_id',Auth::user()->id)->get();
        $uploadedScheduled = ClassSchedule::join('programs','class_schedules.program_id','=','programs.id')
            ->select('class_schedules.*', 'programs.program')
            ->get();
        return view('scheduled.scheduled',compact('initial','infos','uploadedScheduled'));
    }

    //upload scheduled
    public function uploadSchedule(Request $request)
    {
        // dd($request);
        $existingSchedule = ClassSchedule::where('dean_id',Auth::user()->id)
            ->where('program_id', $request->degree)
            ->where('college_level',$request->college_level)
            ->where('semester',$request->semester)
            ->first();
         // Check if a file is uploaded
         if ($request->hasFile('schedule') && !$existingSchedule) {
            // Define the directory inside 'public'
            $directory = 'schedules';

            // Generate a unique file name with the original extension
            $file = $request->file('schedule');
            $uniqueFileName = Str::uuid() . '.' . $file->getClientOriginalExtension();

            // Store the file in the 'public' disk (storage/app/public)
            $filePath = $file->storeAs($directory, $uniqueFileName, 'public');

            ClassSchedule::create([
                'dean_id' => Auth::user()->id,
                'program_id' => $request->degree,
                'college_level' => $request->college_level,
                'semester' => $request->semester,
                'descriptions' => $request->description,
                'class_schedule' => 'storage/' .$filePath,
                'section' => $request->college_section
            ]);

            //notify all the student
            $users = User::where('role','student')->get();
            foreach ($users as $user) {
                // add notification message
                Notification::create([
                    'user_id' => $user->id,
                    'type' => "Class Schedule for ".$request->semester." semester - ".$request->college_section." is now posted",
                    'message' => "The class schedule is now posted. Please check here for any updates regarding your enrolled classes. Thank you for your patience and welcome to the new term!",
                    'status' => false,
                ]);
            }

            return Redirect::route('schedule')->with(['status' => 'success', 'message'=>'The Class schedule is now posted successfully.']);
         }
    }
}

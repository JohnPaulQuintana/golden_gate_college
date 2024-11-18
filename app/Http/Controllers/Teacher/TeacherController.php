<?php

namespace App\Http\Controllers\Teacher;

// use \DB;
use App\Http\Controllers\Controller;
use App\Models\EnrolledStudentOnSubject;
use App\Models\Enrollment;
use App\Models\StudentGrade;
use App\Models\subjects;
use App\Models\Teacher;
use App\Models\TeacherSubject;
use App\Models\YearLevelWithSubjects;
use App\Services\AbbreviationService;
use App\Services\InitialService;
use App\Services\TeacherService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Redis;

class TeacherController extends Controller
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

    //subjects
    public function subjects()
    {
        $teacher = Teacher::with('department')
            ->where('teacher_id', Auth::user()->id)
            ->first();

        // dd($teacher);
        if ($teacher->department) {
            // Retrieve subjects and year levels for the dean associated with the teacher's department
            // $subjects = subjects::where('user_id', $teacher->department->dean_id)->get();
            $yearLevels = YearLevelWithSubjects::where('user_id', $teacher->department->dean_id)->get();

            // Add subjects and year level groups to the teacher's data
            // $teacher->subjects = $subjects;

            foreach ($yearLevels as $key => $item) {
                // Decode the selected_subject_ids JSON string into an array
                $selectedSubjectIds = json_decode($item->selected_subject_ids, true);
                // Based on the year_level, add the item to the corresponding year level collection
                // If there are valid subject IDs, we fetch the corresponding subject models
                if (is_array($selectedSubjectIds)) {
                    $subjects = subjects::whereIn('subjects.id', $selectedSubjectIds)
                        ->leftJoin('teacher_subjects', function($join) use ($item) {
                            $join->on('subjects.id', '=', 'teacher_subjects.subject_id')
                                ->where('teacher_subjects.college_level_number', '=', $item->year_level); // Additional condition
                        })
                        ->leftJoin('users', 'teacher_subjects.user_id', '=', 'users.id') // Join with users table
                        ->select('subjects.*', \DB::raw('COALESCE(teacher_subjects.user_id, 0) as teacher_id'), 'users.name as teacher_name')
                        ->get();
                    // dd($subjects);
                    switch ($item->year_level) {
                        case 1:
                            $item->subjects = $subjects;
                            break;
                        case 2:
                            $item->subjects = $subjects;
                            break;
                        case 3:
                            $item->subjects = $subjects;
                            break;
                        case 4:
                            $item->subjects = $subjects;
                            break;
                    }
                }
            }
            $teacher->year_level_groups = $yearLevels;
            // dd($teacher);
        } else {
            // Handle case where no teacher record is found
            return response()->json(['error' => 'Teacher not found.'], 404);
        }

        // dd($teacherWithSubjects);
        $initial = $this->initialService->getInitials(Auth::user()->name);
        return view('teacher.pages.subjects', compact('initial', 'teacher'));
    }

    //my subjects
    public function mySubjects()
    {
        $initial = $this->initialService->getInitials(Auth::user()->name);
        $my_subjects = TeacherSubject::join('subjects', 'teacher_subjects.subject_id', '=', 'subjects.id')
            ->leftJoin(
                \DB::raw('(SELECT subject_id, COUNT(student_id) as enrolled_students_count
                        FROM enrolled_student_on_subjects
                        GROUP BY subject_id) AS student_count'), 
                'subjects.id', '=', 'student_count.subject_id'
            )
            ->select('teacher_subjects.*', 'subjects.credits', 'subjects.user_id as dean_id', 'student_count.enrolled_students_count')
            // ->where('enrolled_student_on_subjects.teacher_id', Auth::user()->id)
            ->where('teacher_subjects.user_id', Auth::user()->id)
            ->get();

        // dd($my_subjects);
        $department_info = Teacher::join('departments','teachers.department_id', '=', 'departments.id')
            ->select(
                'teachers.department_id', 'teachers.teacher_id',
                'departments.department_name', 'departments.department_code', 'departments.dean_id')
            ->where('teacher_id',Auth::user()->id)->first();

        // dd($department_info);
        if($department_info){
            $enrolled_students = Enrollment::join('programs', 'enrollments.program_id','=','programs.id')
            ->join('semesters', 'enrollments.semester_id', '=','semesters.id')
            ->join('academic_years', 'enrollments.academic_year_id', '=','academic_years.id')
            ->join('year_level_with_subjects', 'enrollments.year_level_with_subject_id','=','year_level_with_subjects.id')
            ->select(
                'enrollments.*',
                'programs.program','programs.abbrev',
                'semesters.name as semester',
                'academic_years.academic_year',
                'year_level_with_subjects.year_level'
                )
            ->where('enrollments.department',strtolower(($department_info->department_name)))
            ->where('enrollments.status','enrolled')->get();

            $department_info->enrolled = $enrolled_students;
        }
        
        // dd($department_info);
        return view('teacher.pages.my-subjects', compact('initial','my_subjects', 'department_info'));
    }

    //my student list
    public function myStudents($id)
    {
        $initial = $this->initialService->getInitials(Auth::user()->name);
        $subject = subjects::find($id);
        // dd($subject);
        $students = EnrolledStudentOnSubject::join('enrollments', 'enrolled_student_on_subjects.student_id','=','enrollments.user_id')
            ->join('semesters', 'enrollments.semester_id','=','semesters.id')
            ->join('academic_years','enrollments.academic_year_id','=','academic_years.id')
            ->select(
                'enrolled_student_on_subjects.*',
                'enrollments.student_no', 'enrollments.fullname','enrollments.age','enrollments.address','enrollments.contact_number',
                'semesters.name as semester',
                'academic_years.academic_year'
                )
            ->where('enrolled_student_on_subjects.subject_id', $id)
            ->where('enrolled_student_on_subjects.teacher_id',Auth::user()->id)
            ->paginate(10);
        // dd($students);
        foreach ($students as $key => $value) {
            $student_grade = StudentGrade::where('semester',$value->semester." semester")
            ->where('student_id',$value->student_id)
            ->where('teacher_id',Auth::user()->id)
            ->first();
            $value->semester_grade = $student_grade;
            // dd($student_grade);
        }
        // dd($students);
        return view('teacher.pages.my-student', compact('initial','subject','students'));
        // dd($id);
        
    }


    //save selected subjects
    public function addSubjects(Request $request)
    {
        // dd($request->selectedSubjects);
        foreach ($request->selectedSubjects as $key => $value) {
            TeacherSubject::create([
                'user_id' => Auth::user()->id,
                'subject_id' => $value['id'],
                'college_level_number' => $value['college_level'][0],
                'college_level_name' => $value['college_level'][1],
                'subject_name' => $value['subject_name'],
                'subject_code' => $value['subject_code'],
            ]);

            
        }
        return response()->json([
            'status' => 'success',
            'message' => 'Your selected subjects is now marked as your subjects...'
        ]);
    }

    //enrolled student to subjects
    public function enrolledStudent(Request $request)
    {
        // dd($request);
        EnrolledStudentOnSubject::create([
            'student_id' => $request->selectedStudents[0]['student_id'],
            'subject_id' => $request->selectedStudents[0]['subject_id'],
            'teacher_id' => Auth::user()->id,
        ]);

        return response()->json([
            'status' => 'success',
            'message' => "Students is now enrolled to this subjects..."
        ]);
    }

    //student grade
    public function studentGrade(Request $request)
    {
        // dd($request);
        $existingRecord = StudentGrade::where('student_id',$request->student_id)
        ->where('subject_id',$request->subject_id)
        ->where('teacher_id',$request->teacher_id)
        ->where('semester',$request->semester)
        ->first();

        if(!$existingRecord)
        {
            StudentGrade::create([
                'student_id' => $request->student_id,
                'subject_id' => $request->subject_id,
                'teacher_id' => Auth::user()->id,
                'semester' => $request->semester,
                'student_grade' => $request->student_grade
            ]);

            return Redirect::route('teacher.my.student', $request->subject_id)->with(['status'=>"grade",'message'=>'successfully submitted grade!.']);
        }
    }

    //edit grade
    public function studentGradeEdit(Request $request)
    {
        // dd($request);
        $record = StudentGrade::find($request->grade_id);
        if($record){
            $record->update([
                'student_id' => $request->student_id,
                'subject_id' => $request->subject_id,
                'teacher_id' => Auth::user()->id,
                'semester' => $request->semester,
                'student_grade' => $request->student_grade
            ]);
            return Redirect::route('teacher.my.student', $request->subject_id)->with(['status'=>"grade.edited",'message'=>'successfully submitted grade!.']);
        }
    }
    // delete the my subjects
    public function deleteSubject(Request $request)
    {
        // dd($request);
        TeacherSubject::where('id', $request->subject_id)->delete();
        return response()->json([
            'status' => 'success',
            'message' => "Subject is no longer be marked as your, and available to all teachers..."
        ]);
    }
}

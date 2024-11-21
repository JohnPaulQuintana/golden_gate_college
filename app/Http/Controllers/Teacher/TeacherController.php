<?php

namespace App\Http\Controllers\Teacher;

// use \DB;
use App\Http\Controllers\Controller;
use App\Models\Attendance;
use App\Models\EnrolledStudentOnSubject;
use App\Models\Enrollment;
use App\Models\MajorExam;
use App\Models\Quize;
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
            // dd(true);
            // Retrieve subjects and year levels for the dean associated with the teacher's department
            // $subjects = subjects::where('user_id', $teacher->department->dean_id)->get();
            $yearLevels = YearLevelWithSubjects::where('user_id', $teacher->department->dean_id)->get();

            // dd($teacher->department->dean_id);
            // Add subjects and year level groups to the teacher's data
            // $teacher->subjects = $subjects;

            foreach ($yearLevels as $key => $item) {
                // Decode the selected_subject_ids JSON string into an array
                $selectedSubjectIds = json_decode($item->selected_subject_ids, true);
                // Based on the year_level, add the item to the corresponding year level collection
                // If there are valid subject IDs, we fetch the corresponding subject models
                if (is_array($selectedSubjectIds)) {
                    $subjects = subjects::whereIn('subjects.id', $selectedSubjectIds)
                        ->leftJoin('teacher_subjects', function ($join) use ($item) {
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
                'subjects.id',
                '=',
                'student_count.subject_id'
            )
            ->select('teacher_subjects.*', 'subjects.credits', 'subjects.user_id as dean_id', 'student_count.enrolled_students_count')
            // ->where('enrolled_student_on_subjects.teacher_id', Auth::user()->id)
            ->where('teacher_subjects.user_id', Auth::user()->id)
            ->get();

        // dd($my_subjects);
        $department_info = Teacher::join('departments', 'teachers.department_id', '=', 'departments.id')
            ->select(
                'teachers.department_id',
                'teachers.teacher_id',
                'departments.department_name',
                'departments.department_code',
                'departments.dean_id'
            )
            ->where('teacher_id', Auth::user()->id)->first();

        // dd($department_info);
        if ($department_info) {
            $enrolled_students = Enrollment::join('programs', 'enrollments.program_id', '=', 'programs.id')
                ->join('semesters', 'enrollments.semester_id', '=', 'semesters.id')
                ->join('academic_years', 'enrollments.academic_year_id', '=', 'academic_years.id')
                ->join('year_level_with_subjects', 'enrollments.year_level_with_subject_id', '=', 'year_level_with_subjects.id')
                ->select(
                    'enrollments.*',
                    'programs.program',
                    'programs.abbrev',
                    'semesters.name as semester',
                    'academic_years.academic_year',
                    'year_level_with_subjects.year_level'
                )
                ->where('enrollments.department', strtolower(($department_info->department_name)))
                ->where('enrollments.status', 'enrolled')->get();

            $department_info->enrolled = $enrolled_students;
        }

        // dd($department_info);
        return view('teacher.pages.my-subjects', compact('initial', 'my_subjects', 'department_info'));
    }

    //my student list
    public function myStudents($subject_id)
    {
        $initial = $this->initialService->getInitials(Auth::user()->name);
        $subject = subjects::find($subject_id);
        // dd($subject);
        $students = EnrolledStudentOnSubject::join('enrollments', 'enrolled_student_on_subjects.student_id', '=', 'enrollments.user_id')
            ->join('semesters', 'enrollments.semester_id', '=', 'semesters.id')
            ->join('academic_years', 'enrollments.academic_year_id', '=', 'academic_years.id')
            ->select(
                'enrolled_student_on_subjects.*',
                'enrollments.student_no',
                'enrollments.fullname',
                'enrollments.age',
                'enrollments.address',
                'enrollments.contact_number',
                'semesters.name as semester',
                'academic_years.academic_year'
            )
            ->where('enrolled_student_on_subjects.subject_id', $subject_id)
            ->where('enrolled_student_on_subjects.teacher_id', Auth::user()->id)
            ->paginate(10);
        // dd($students);
        foreach ($students as $key => $value) {
            $student_grade = StudentGrade::where('semester', $value->semester . " semester")
                ->where('student_id', $value->student_id)
                ->where('teacher_id', Auth::user()->id)
                ->first();
            $value->semester_grade = $student_grade;
            // dd($student_grade);
        }
        // dd($students);
        return view('teacher.pages.my-student', compact('initial', 'subject', 'students', 'subject_id'));
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
        // Check if a record already exists
        // $studentGrade = StudentGrade::firstOrCreate(
        //     [
        //         'student_id' => $request->student_id,
        //         'subject_id' => $request->subject_id,
        //         'activities' => 0,
        //         'teacher_id' => Auth::user()->id,
        //         'semester' => $request->semester,
        //     ],
        //     [
        //         'student_grade' => 0,
        //         'quiz_grade' => 0,
        //     ]
        // );

        $studentGrade = StudentGrade::firstOrNew(
            [
                'student_id' => $request->student_id,
                'subject_id' => $request->subject_id,
                'teacher_id' => Auth::user()->id,
                'semester' => $request->semester,
            ]
        );
        
        // If the record doesn't exist, set default values
        if (!$studentGrade->exists) {
            $studentGrade->activities = 0;
            $studentGrade->student_grade = 0;
            $studentGrade->quiz_grade = 0;
            $studentGrade->save();
        }

        // $studentGrade = StudentGrade::where();
        // dd();

        switch ($request->grade_type) {
            case 'quiz':
                // Insert new quiz record
                $quiz = Quize::create([
                    'grade_id' => $studentGrade->id,
                    'score' => $request->student_score,
                    'lp' => 50,
                    'type' => $request->grade_type
                ]);
                // Update the student's grade
                $grades = $this->finalTerm($studentGrade->id);
                $studentGrade->update([
                    'quiz_grade' => $this->average($studentGrade->id, $request->grade_type),
                    'student_grade' => $grades[0], // Update overall grade if needed
                    'final_term' => $grades[1], // Update overall grade if needed
                ]);
                break;
            case 'activity':
                // Insert new quiz record
                $quiz = Quize::create([
                    'grade_id' => $studentGrade->id,
                    'score' => $request->student_score,
                    'lp' => 50,
                    'type' => $request->grade_type
                ]);
                // Update the student's grade
                $grades = $this->finalTerm($studentGrade->id);
                $studentGrade->update([
                    'activities' => $this->average($studentGrade->id, $request->grade_type),
                    'student_grade' => $grades[0], // Update overall grade if needed
                    'final_term' => $grades[1], // Update overall grade if needed// 'student_grade' => $this->average($studentGrade->id, $request->grade_type), // Update overall grade if needed
                ]);
                break;
            case 'attendance':
                $attend = Attendance::create([
                    'grade_id' => $studentGrade->id,
                    'attendance' => $request->student_score,
                    'type' => $request->grade_type
                ]);

                //attendance calculation

                $grades = $this->finalTerm($studentGrade->id);
                $studentGrade->update([
                    'cscp' => $this->attendanceAverage($studentGrade->id, $request->student_score),
                    'student_grade' => $grades[0], // Update overall grade if needed
                    'final_term' => $grades[1],
                ]);
                break;

            case "exam":
                // Find if data exists for the given studentGrade ID
                $majorData = MajorExam::where('grade_id', $studentGrade->id)->first();

                if (!$majorData) {
                    // If no data exists, insert a new record
                    $major = MajorExam::create([
                        'grade_id' => $studentGrade->id, // Link to the studentGrade ID
                        'semis' => $request->student_score // Insert the value into the semis field
                    ]);

                    // return response()->json(['message' => 'New data inserted for semis'], 201);
                } else {
                    // If data exists, update the finals column
                    $majorData->update([
                        'finals' => $request->student_score // Update the finals field
                    ]);
                    // Optional: Handle the case where data already exists
                    // return response()->json(['message' => 'Data already exists, no insertion made'], 200);
                }
                $grades = $this->finalTerm($studentGrade->id);
                // dd($grades);
                $studentGrade->update([
                    'major_exam' => $this->majorAverage($studentGrade->id),
                    // 'student_grade' => $this->average($studentGrade->id, $request->grade_type), // Update overall grade if needed
                    'student_grade' => $grades[0], // Update overall grade if needed
                    'final_term' => $grades[1],
                ]);
                break;
            default:
                // Update the student's grade
                $studentGrade->update([
                    'quiz_grade' => 0,
                    'student_grade' => 0
                ]);
                break;
        }


        // Redirect with success message
        return Redirect::route('teacher.student.grade.table', [
            'student_id' => $request->student_id,
            'subject_id' => $request->subject_id,
        ])->with([
            'status' => 'grade',
            'message' => 'Successfully submitted grade!',
        ]);
    }


    //edit grade
    public function studentGradeEdit(Request $request)
    {
        // dd($request);

        switch ($request->grade_type) {
            case 'quiz':
                $record = Quize::join('student_grades', 'quizes.grade_id', '=', 'student_grades.id')
                    ->select(
                        'quizes.*',
                        'student_grades.id as grade_id',
                        'student_grades.subject_id'
                    )
                    ->where('quizes.id', $request->grade_id)
                    ->first(); //quiz id
                $record->update([
                    'score' => $request->student_grade,
                ]);

                $studentGrade = StudentGrade::where('id', $record->grade_id)->first();
                // Update the student's grade
                $studentGrade->update([
                    'quiz_grade' => $this->average($studentGrade->id, $request->grade_type),
                    // 'student_grade' => $this->average($studentGrade->id, $request->grade_type), // Update overall grade if needed
                ]);
                break;
            case 'activity':
                $record = Quize::join('student_grades', 'quizes.grade_id', '=', 'student_grades.id')
                    ->select(
                        'quizes.*',
                        'student_grades.id as grade_id',
                        'student_grades.subject_id'
                    )
                    ->where('quizes.id', $request->grade_id)
                    ->first(); //quiz id
                $record->update([
                    'score' => $request->student_grade,
                ]);

                $studentGrade = StudentGrade::where('id', $record->grade_id)->first();
                // Update the student's grade
                $studentGrade->update([
                    'activities' => $this->average($studentGrade->id, $request->grade_type),
                    // 'student_grade' => $this->average($studentGrade->id, $request->grade_type), // Update overall grade if needed
                ]);
                break;

            case 'attendace':
                $record = Attendance::join('student_grades', 'attendances.grade_id', '=', 'student_grades.id')
                    ->select(
                        'attendances.*',
                        'student_grades.id as grade_id',
                        'student_grades.subject_id'
                    )
                    ->where('attendances.id', $request->grade_id)
                    ->first(); //quiz id
                break;

            default:
                // Update the student's grade
                // $studentGrade->update([
                //     'quiz_grade' => 0,
                //     'student_grade' => 0
                // ]);
                break;
        }
        // Redirect with success message
        return Redirect::route('teacher.student.grade.table', [
            'student_id' => $request->student_id,
            'subject_id' => $record->subject_id,
        ])->with([
            'status' => 'grade.edit',
            'message' => 'Successfully submitted grade!',
        ]);
    }

    //calculate final term grade
    private function finalTerm($grade_id)
    {
        $student_grade = StudentGrade::where('id', $grade_id)->first();
        // dd($student_grade);
        // Calculate the weighted sum
        $result = ($student_grade->quiz_grade * 0.2) + ($student_grade->cscp * 0.4) + ($student_grade->major_exam * 0.4);
        // Reference table for grade mapping
        $referenceTable = [
            ['min' => 97.5, 'grade' => 1.00],
            ['min' => 94.5, 'grade' => 1.25],
            ['min' => 91.5, 'grade' => 1.50],
            ['min' => 88.5, 'grade' => 1.75],
            ['min' => 85.5, 'grade' => 2.00],
            ['min' => 82.5, 'grade' => 2.25],
            ['min' => 79.5, 'grade' => 2.50],
            ['min' => 76.5, 'grade' => 2.75],
            ['min' => 74.5, 'grade' => 3.00],
        ];

        // Map the result to a grade and threshold
        $grade = null;
        $threshold = null;

        foreach ($referenceTable as $range) {
            if ($result >= $range['min']) {
                $grade = $range['grade'];
                $threshold = $range['min'];
                break; // Stop checking once the appropriate grade and threshold are found
            }
        }

        // dd($result, $grade);
        // Return the result, grade, and threshold
        return [$result ?? 0, $grade ?? 0, $threshold ?? 0];
    }

    //private function calculate average
    private function average($grade_id, $type)
    {
        // Calculate the average quiz grade
        $totalQuizScore = Quize::where('grade_id', $grade_id)->where('type', $type)->sum('score');
        $totalQuizCount = Quize::where('grade_id', $grade_id)->where('type', $type)->count();
        $averageQuizGrade = $totalQuizCount > 0
            ? ($totalQuizScore) / ($totalQuizCount)
            : 0;
        return $averageQuizGrade;
    }

    //major calculation
    private function majorAverage($grade_id)
    {
        $majorData = MajorExam::where('grade_id', $grade_id)->first();
        // Calculate the total of semis and finals
        $total = $majorData->semis + $majorData->finals;
        return $total / 2;
    }

    //attendance calculcation
    private function attendanceAverage($grade_id, $attend)
    {
        $total = StudentGrade::find($grade_id);

        //calculation
        $sum = ($total->activities * 0.8) + ($attend * 0.2);

        return $sum;
    }

    //grade table
    public function grade($student_id, $subject_id)
    {
        // dd($student_id,$subject_id);
        $initial = $this->initialService->getInitials(Auth::user()->name);
        $subject = subjects::find($subject_id);
        $students = EnrolledStudentOnSubject::join('enrollments', 'enrolled_student_on_subjects.student_id', '=', 'enrollments.user_id')
            ->join('semesters', 'enrollments.semester_id', '=', 'semesters.id')
            ->join('academic_years', 'enrollments.academic_year_id', '=', 'academic_years.id')

            ->select(
                'enrolled_student_on_subjects.*',
                'enrollments.student_no',
                'enrollments.fullname',
                'enrollments.age',
                'enrollments.address',
                'enrollments.contact_number',
                'semesters.name as semester',
                'academic_years.academic_year'
            )
            ->where('enrolled_student_on_subjects.subject_id', $subject_id)
            ->where('enrolled_student_on_subjects.teacher_id', Auth::user()->id)
            ->paginate(10);
        // dd($students);
        foreach ($students as $key => $value) {
            $student_grade = StudentGrade::join('quizes', 'student_grades.id', '=', 'quizes.grade_id')
                // ->leftJoin('attendances', 'student_grades.id', '=', 'attendances.grade_id')
                ->select(
                    'student_grades.*',
                    'quizes.score as quiz_score',
                    'quizes.lp',
                    'quizes.created_at as date',
                    // 'attendances.id as attendance_id',
                    // 'attendances.attendance',
                    // 'attendances.type'
                )
                ->where('semester', $value->semester . " semester")
                ->where('student_id', $value->student_id)
                ->where('teacher_id', Auth::user()->id)
                ->first();
            $value->semester_grade = $student_grade;
            // dd($student_grade);
        }
        // dd($students);
        $student_grade = StudentGrade::join('quizes', 'student_grades.id', '=', 'quizes.grade_id')
            // ->leftJoin('attendances', 'student_grades.id', '=', 'attendances.grade_id')
            ->select(
                'student_grades.*',
                'quizes.id as quiz_id',
                'quizes.score as quiz_score',
                'quizes.lp',
                'quizes.created_at as dateString',
                'quizes.type',
                // 'attendances.id as attendance_id',
                // 'attendances.attendance',
                // 'attendances.type as attend_type'
            )
            ->where('student_grades.student_id', $student_id)->paginate(10);
        // dd($student_grade);
        return view('teacher.pages.student-grade', compact('initial', 'student_grade', 'students', 'student_id'));
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

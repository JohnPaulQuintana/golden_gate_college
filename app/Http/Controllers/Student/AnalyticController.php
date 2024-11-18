<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\StudentGrade;
use App\Services\InitialService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use function Laravel\Prompts\select;

class AnalyticController extends Controller
{
    protected $initialService;
    // Inject the InitialService into the controller
    public function __construct(InitialService $initialService)
    {
        $this->initialService = $initialService;
    }

    //ana;ytics
    public function analytics()
    {
        $initial = $this->initialService->getInitials(Auth::user()->name);

        $analytics = StudentGrade::join('subjects', 'student_grades.subject_id', '=', 'subjects.id')
            ->select('student_grades.*', 'subjects.subject_code', 'subjects.subject_name', 'subjects.credits')
            ->where('student_id', Auth::user()->id)->get();

        // Initialize an empty array to hold the formatted subject data
        $subjectDatas = [];
        // Loop through the analytics data and format it
        foreach ($analytics as $grade) {
            // Find the subject in the result array, or create a new one if not found
            $subjectKey = array_search($grade->subject_name, array_column($subjectDatas, 'subject'));

            if ($subjectKey === false) {
                // If the subject doesn't exist, add it with an empty grade array
                $subjectDatas[] = [
                    'subject' => $grade->subject_name,
                    'grade' => [
                        "First Semester" => null, // Default value for each semester
                        "Second Semester" => null,
                        "Summer" => null,
                        "Summer 1" => null, // Added Summer 1
                        "Summer 2" => null  // Added Summer 2
                    ]
                ];
                $subjectKey = count($subjectDatas) - 1; // Get the newly added index
            }

            // Map the grade to the corresponding semester
            if (strtolower($grade->semester) == 'first semester') {
                $subjectDatas[$subjectKey]['grade']["First Semester"] = $grade->student_grade;
            } elseif (strtolower($grade->semester) == 'second semester') {
                $subjectDatas[$subjectKey]['grade']["Second Semester"] = $grade->student_grade;
            } elseif (strtolower($grade->semester) == 'summer') {
                $subjectDatas[$subjectKey]['grade']["Summer"] = $grade->student_grade;
            } elseif (strtolower($grade->semester) == 'summer 1') {
                $subjectDatas[$subjectKey]['grade']["Summer 1"] = $grade->student_grade;
            } elseif (strtolower($grade->semester) == 'summer 2') {
                $subjectDatas[$subjectKey]['grade']["Summer 2"] = $grade->student_grade;
            }
        }
        // dd($subjectDatas);
        return view('student.analytics.analytic', compact('initial', 'subjectDatas'));
    }
}

<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreStudentRequest;
use App\Models\EnrolledSubject;
use App\Models\Enrollment;
use App\Models\Information;
use App\Models\Liabilities;
use App\Models\Notification;
use App\Models\Program;
use App\Models\subjects;
use App\Models\Tag;
use App\Models\User;
use App\Models\YearLevelWithSubjects;
use App\Services\InitialService;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EnrollmentController extends Controller
{
    protected $initialService;
    // Inject the InitialService into the controller
    public function __construct(InitialService $initialService)
    {
        $this->initialService = $initialService;
    }

    //enrollemnt form
    public function enrollment()
    {
        $enrollmentStatus = Enrollment::where('user_id',Auth::user()->id)->first();
        $existingEnrollmentForm = Enrollment::join('semesters', 'enrollments.semester_id', '=','semesters.id')
        ->join('academic_years', 'enrollments.academic_year_id','=','academic_years.id')
        ->join('programs', 'enrollments.program_id','=','programs.id')
        ->join('year_level_with_subjects','enrollments.year_level_with_subject_id','=','year_level_with_subjects.id')
        ->select('enrollments.*', 'semesters.name as semester', 'academic_years.academic_year', 'programs.program','programs.abbrev','year_level_with_subjects.year_level')
        ->where('enrollments.user_id',Auth::user()->id)->first();

        $information = User::with('information')->where('id', Auth::user()->id)->first();
        $initial = $this->initialService->getInitials(Auth::user()->name);

        $student_information = Information::where('user_id', Auth::user()->id)
            ->selectRaw('*, YEAR(CURDATE()) - YEAR(birthdate) - (DATE_FORMAT(CURDATE(), "%m%d") < DATE_FORMAT(birthdate, "%m%d")) AS age')
            ->first();
        // Fetch courses and include related subjects
        $courses = Program::join('semesters', 'programs.abbrev', '=', 'semesters.abbrev')
            ->join('academic_years', 'semesters.academic_year_id', '=', 'academic_years.id')
            ->leftJoin('year_level_with_subjects', 'programs.id', '=', 'year_level_with_subjects.program_id') // Adjust the column name as per your actual table structure
            ->select(
                'programs.id',
                'programs.program',
                'programs.abbrev',
                'semesters.id as semester_id',
                'semesters.name as semester_name',
                'semesters.academic_year_id as acad_year_id',
                'academic_years.academic_year as acad_year',
                'year_level_with_subjects.year_level', // Include the specific columns you need
                'year_level_with_subjects.selected_subject_ids' // Include subject IDs
            )
            ->get()
            ->groupBy('id')
            ->map(function ($programGroup) {
                $firstProgram = $programGroup->first(); // Get the program's common data

                // Initialize semesters and year_levels arrays
                $semesters = [];
                $yearLevels = collect();

                // Populate semesters and year levels from the program group
                foreach ($programGroup as $item) {
                    // Add semester details
                    $semesters[$item->semester_id] = [
                        'semester_id' => $item->semester_id,
                        'semester_name' => $item->semester_name,
                        'academic_year_id' => $item->academic_year_id,
                        'academic_year' => [
                            'academic_id' => $item->academic_year_id,
                            'academic_year' => $item->academic_year,
                        ],
                    ];

                    // Collect year levels only if not already added
                    if ($item->year_level) {
                        // Decode and collect selected subject IDs
                        $selectedSubjectIds = !empty($item->selected_subject_ids)
                            ? collect(array_map('intval', json_decode($item->selected_subject_ids)))
                            : collect([]);

                        // Fetch subjects based on selected IDs
                        $subjects = subjects::whereIn('id', $selectedSubjectIds)->get();

                        $yearLevels->push([
                            'year_level' => $item->year_level,
                            'subjects' => $subjects // Add fetched subjects
                        ]);
                    }
                }

                $firstProgram->semesters = array_values($semesters);
                $firstProgram->year_levels = $yearLevels->unique('year_level')->toArray();
                unset($firstProgram->semester_id, $firstProgram->semester_name, $firstProgram->academic_year_id, $firstProgram->academic_year);

                return $firstProgram;
            });


            foreach ($courses as $key => $value) {
                // Fetch all YearLevelWithSubjects entries associated with the current program
                $yearLevelSubjects = YearLevelWithSubjects::where('program_id', $value->id)->get();
                
                // Add the year levels to the current value (course)
                $value['year_level'] = $yearLevelSubjects;
            
                // Initialize an empty collection to store subjects
                $subjectCollection = collect();
            
                // Loop through each YearLevelWithSubjects entry
                foreach ($yearLevelSubjects as $yearLevelSubject) {
                    // Map year_level to year level name (e.g., "1st Year College")
                    $yearLevelName = $this->getYearLevelName($yearLevelSubject->year_level);
                    $yearLevelSubject['year_level_name'] = $yearLevelName; // Add year level name
            
                    // Decode the selected_subject_ids JSON string to an array
                    $selectedSubjectIds = !empty($yearLevelSubject->selected_subject_ids)
                        ? array_map('intval', json_decode($yearLevelSubject->selected_subject_ids, true))
                        : [];
            
                    if (!empty($selectedSubjectIds)) {
                        // Fetch subjects from the subjects table based on the selected subject IDs
                        $subjects = subjects::whereIn('id', $selectedSubjectIds)->get();
            
                        // Add these subjects to the subject collection
                        $subjectCollection = $subjectCollection->merge($subjects);
                        $yearLevelSubject['subs'] = $subjects; // Store subjects in the year level data
                    }
                }
            
                // Remove duplicate subjects (if necessary) by their IDs
                $subjectCollection = $subjectCollection->unique('id');
                
                // Now, each year level has its name and subjects
                $yearLevelSubjects = $yearLevelSubjects->merge($subjectCollection);
            
                // Further processing or return as needed
                // dd($subjectCollection);
            }
            

        // dd($courses);

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
        
        return view('student.enrollment.enrollment', compact('information', 'initial', 'student_information', 'courses', 'existingEnrollmentForm','enrollmentStatus', 'liabilities','tags'));
    }

    protected function getYearLevelName($yearLevel)
    {
        $names = [
            1 => '1st Year College',
            2 => '2nd Year College',
            3 => '3rd Year College',
            4 => '4th Year College',
        ];

        return $names[$yearLevel] ?? "{$yearLevel}th Year College"; // Default case if needed
    }


    //insert
    public function insert(StoreStudentRequest $request)
    {
        // dd($request);
        // The request is already validated at this point
        $validatedData = $request->validated();
        // Continue with your logic (e.g., saving the data)
        // Create a new student record
        // dd($validatedData);
        $existingEnrollmentForm = Enrollment::where('student_no', $validatedData['std_no'])->where('status', '!=','enrolled')->first();
        if($existingEnrollmentForm){
            $existingEnrollmentForm->update([
                'student_no' => $validatedData['std_no'],
                'program_id' => $validatedData['course'],
                'semester_id' => $validatedData['semester'],
                'user_id' => Auth::user()->id,
                'academic_year_id' => $validatedData['academic_id'],
                'year_level_with_subject_id' => $validatedData['year_level'],
                'fullname' => $validatedData['name'],
                'gender' => $validatedData['gender'],
                'contact_number' => $validatedData['contact_number'],
                'civil_status' => $validatedData['civil_status'],
                'nationality' => $validatedData['nationality'],
                'date_of_birth' => $validatedData['date_of_birth'],
                'place_of_birth' => $validatedData['place_of_birth'],
                'age' => $validatedData['age'],
                'guardian_fullname' => $validatedData['guardian'],
                'address' => $validatedData['address'],
                'elementary' => $validatedData['elementary'],
                'elementary_year' => $validatedData['elementary_graduated'],
                'secondary' => $validatedData['secondary'],
                'secondary_year' => $validatedData['secondary_graduated'],
                'senior_high' => $validatedData['senior_high_school'],
                'senior_high_year' => $validatedData['senior_high_school_graduated'],
                'status' => 'in-process', // Assuming you're setting the status to "enrolled" upon creation
            ]);
            if($existingEnrollmentForm){
                EnrolledSubject::where('enrollment_id', $existingEnrollmentForm->id)->delete();
                foreach ($validatedData['selected_subjects'] as $s) {
                    EnrolledSubject::create([
                        'enrollment_id' => $existingEnrollmentForm->id,
                        'subject_id' => $s
                    ]);
                }
               
                // add notification message
                Notification::create([
                    'user_id' => Auth::user()->id,
                    'message' => "Your enrollment application has been successfully submitted. We will notify you here as soon as possible with any updates.",
                    'status' => false,
                ]);
            }
            return redirect()->back()->with(['status' => 'in-process', 'message' => 'Your enrollment form is in process right now...']);
        }
        $studentInformation = Enrollment::create([
            'student_no' => $validatedData['std_no'],
            'program_id' => $validatedData['course'],
            'semester_id' => $validatedData['semester'],
            'user_id' => Auth::user()->id,
            'academic_year_id' => $validatedData['academic_id'],
            'year_level_with_subject_id' => $validatedData['year_level'],
            'fullname' => $validatedData['name'],
            'gender' => $validatedData['gender'],
            'contact_number' => $validatedData['contact_number'],
            'civil_status' => $validatedData['civil_status'],
            'nationality' => $validatedData['nationality'],
            'date_of_birth' => $validatedData['date_of_birth'],
            'place_of_birth' => $validatedData['place_of_birth'],
            'age' => $validatedData['age'],
            'guardian_fullname' => $validatedData['guardian'],
            'address' => $validatedData['address'],
            'elementary' => $validatedData['elementary'],
            'elementary_year' => $validatedData['elementary_graduated'],
            'secondary' => $validatedData['secondary'],
            'secondary_year' => $validatedData['secondary_graduated'],
            'senior_high' => $validatedData['senior_high_school'],
            'senior_high_year' => $validatedData['senior_high_school_graduated'],
            'status' => 'in-process', // Assuming you're setting the status to "enrolled" upon creation
        ]);
        // dd($studentInformation);
        if($studentInformation){
            foreach ($validatedData['selected_subjects'] as $s) {
                EnrolledSubject::create([
                    'enrollment_id' => $studentInformation->id,
                    'subject_id' => $s
                ]);
            }
           
            // add notification message
            Notification::create([
                'user_id' => Auth::user()->id,
                'message' => "Your enrollment application has been successfully submitted. We will notify you here as soon as possible with any updates.",
                'status' => false,
            ]);
        }


        // Redirect or return response
        return redirect()->back()->with(['status' => 'submitted', 'message' => 'Your enrollment form is submitted successfully.']);
    }
}

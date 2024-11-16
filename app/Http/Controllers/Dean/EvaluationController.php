<?php

namespace App\Http\Controllers\Dean;

use App\Http\Controllers\Controller;
use App\Models\AcademicYear;
use App\Models\Department;
use App\Models\EnrolledStudentOnSubject;
use App\Models\Evaluation;
use App\Models\QuestionCategory;
use App\Models\Rating;
use App\Services\AbbreviationService;
use App\Services\InitialService;
use App\Services\TeacherService;
use Carbon\Carbon;
use function Laravel\Prompts\select;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class EvaluationController extends Controller
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
    //create
    public function create()
    {
        $currentYear = Carbon::now()->year;       // Current year
        $nextYear = $currentYear + 1;             // Current year + 1

        $academic_year = AcademicYear::where('academic_year', $currentYear . "-" . $nextYear)->where('user_id', Auth::user()->id)->first();
        $lastCategoryInserted = QuestionCategory::latest()->first();

        $evaluationForm = Evaluation::join('question_categories', 'evaluations.id', '=', 'question_categories.evaluation_id')
            ->select('evaluations.*', 'question_categories.id as category_id', 'question_categories.category')
            ->where('dean_id', Auth::user()->id)->where('academic_id', $academic_year->id)
            ->paginate(10);
        // dd($academic_year);
        $initial = $this->initialService->getInitials(Auth::user()->name);
        return view('dean.evaluation.create', compact('initial', 'academic_year', 'lastCategoryInserted', 'evaluationForm'));
    }

    //store
    public function store(Request $request)
    {
        // dd($request);
        $validatedEvaluation = $request->validate([
            '_token' => 'required',
            'question' => 'required',
            'rating' => 'required',
            'academic_id' => 'required',
            'category' => 'required'
        ], [
            '_token.required' => 'Token is required to make this request.',
            'question.required' => 'Question is required to make this request',
            'rating.required' => 'Ratings is required to make this request',
            'category.required' => 'Category is required to make this request',
        ]);

        //store
        $storedSuccess = Evaluation::create([
            'dean_id' => Auth::user()->id,
            'academic_id' => $validatedEvaluation['academic_id'],
            'question' => $validatedEvaluation['question'],
            'ratings' => $validatedEvaluation['rating']
        ]);

        if ($storedSuccess) {
            QuestionCategory::create([
                'evaluation_id' => $storedSuccess->id,
                'category' => $validatedEvaluation['category']
            ]);
            return Redirect::route('dean.evaluation')->with(['status' => 'success', 'message' => 'Added a new evaluation question|ratings|comments']);
        } else {
            return Redirect::route('dean.evaluation')->with(['status' => 'error', 'message' => 'Failed to create a new evaluation question|ratings|comments']);
        }
    }

    public function updateEvaluation(Request $request)
    {

        // Start a transaction to ensure both updates happen together
        DB::beginTransaction();

        try {
            // Find and update evaluation
            $evaluation = Evaluation::where('id', $request->evaluation_id)->first();
            if ($evaluation) {
                $evaluation->update([
                    'question' => $request->question,
                    'ratings' => $request->ratings
                ]);
            } else {
                // If evaluation not found, throw exception
                throw new \Exception('Evaluation not found');
            }

            // Find and update question category
            $category = QuestionCategory::where('id', $request->category_id)->first();
            if ($category) {
                $category->update([
                    'category' => $request->category
                ]);
            } else {
                // If category not found, throw exception
                throw new \Exception('Category not found');
            }

            // Commit the transaction
            DB::commit();

            // Redirect with success message
            return Redirect::route('dean.evaluation')->with([
                'status' => 'success',
                'message' => 'Updated evaluation question, ratings, and comments.'
            ]);
        } catch (\Exception $e) {
            // Rollback transaction if there is any error
            DB::rollback();

            // Redirect with error message
            return Redirect::route('dean.evaluation')->with([
                'status' => 'error',
                'message' => 'Failed to update evaluation. ' . $e->getMessage()
            ]);
        }
    }

    public function deleteEvaluation($id)
    {
        // Start a transaction to ensure both deletions happen together
        DB::beginTransaction();

        try {
            // Find the evaluation by ID and delete it
            $evaluation = Evaluation::find($id);
            if ($evaluation) {
                // Delete related records if necessary (for example, deleting the question or other associations)
                // $evaluation->questions()->delete();  // if there are related questions to delete

                $evaluation->delete();
            } else {
                // If evaluation not found, throw exception
                throw new \Exception('Evaluation not found');
            }

            // Optionally, delete associated categories or related data (if applicable)
            // For example:
            // $category = QuestionCategory::where('evaluation_id', $id)->first();
            // if ($category) {
            //     $category->delete();
            // }

            // Commit the transaction if everything goes well
            DB::commit();

            // Redirect with success message
            return Redirect::route('dean.evaluation')->with([
                'status' => 'success',
                'message' => 'Evaluation successfully deleted.'
            ]);
        } catch (\Exception $e) {
            // Rollback the transaction if any errors occur
            DB::rollback();

            // Redirect with error message
            return Redirect::route('dean.evaluation')->with([
                'status' => 'error',
                'message' => 'Failed to delete evaluation. ' . $e->getMessage()
            ]);
        }
    }

    //form
    public function form()
    {
        $activeYear = AcademicYear::where('status', 'active')->first();
        if ($activeYear) {
            // Get the unique EnrolledStudentOnSubject records based on subject_id
            $teachers = EnrolledStudentOnSubject::join('subjects', 'enrolled_student_on_subjects.subject_id', '=', 'subjects.id')
                ->join('users', 'enrolled_student_on_subjects.teacher_id', '=', 'users.id')
                ->leftJoin('ratings', function ($join) {
                    $join->on('ratings.teacher_id', '=', 'enrolled_student_on_subjects.teacher_id')
                        ->where('ratings.student_id', '=', Auth::user()->id); // Assuming evaluations are student-specific
                })
                // ->join('evaluations','subjects.user_id','=','evaluations.dean_id')
                // ->join('question_categories', 'evaluations.id','=','question_categories.evaluation_id')
                ->select(
                    'enrolled_student_on_subjects.*',
                    'subjects.subject_name',
                    'subjects.user_id as dean_id',
                    // 'evaluations.id as evaluation_id', 'evaluations.question', 'evaluations.ratings',
                    // 'question_categories.category',
                    'users.name',
                    'users.email',
                    DB::raw('CASE WHEN ratings.id IS NOT NULL THEN true ELSE false END as has_ratings') // Dynamic boolean flag
                )
                ->where('enrolled_student_on_subjects.student_id', Auth::user()->id)
                ->get()
                ->unique('enrolled_student_on_subjects.subject_id');

            // dd($teachers);
            foreach ($teachers as $key => $value) {
                // dd($value);
                $evaluations = Evaluation::join('question_categories', 'evaluations.id', '=', 'question_categories.evaluation_id')
                    ->where('dean_id', $value->dean_id)
                    ->where('academic_id', $activeYear->id)
                    ->get();

                $value->categories = $evaluations;
            }
            // dd($teachers);
            $initial = $this->initialService->getInitials(Auth::user()->name);
            return view('student.evaluation.evaluation', compact('initial', 'teachers'));
        } else {
            return Redirect::route('student.dashboard');
        }
    }

    //student response save
    public function submitRatings(Request $request)
    {
        $data = $request->all();
        // dd($data);
        // Extract comments dynamically
        $comments = collect($data)
            ->filter(fn($value, $key) => str_starts_with($key, 'comments_'))
            ->filter(); // Removes null or empty values

        // Extract ratings dynamically
        $ratings = collect($data)
            ->filter(fn($value, $key) => str_starts_with($key, 'rating_'))
            ->filter(); // Removes null or empty values

        // Check if comments or ratings are empty
        if ($comments->isEmpty() || $ratings->isEmpty()) {
            return Redirect::route('student.form')->with(['status' => 'error', 'message' => "Missing input to continue, all the credentials is required."]);
        }

        // dd($ratings);
        // Process and Save Data
        foreach ($ratings as $key => $value) {
            // dd($ratings);
            [$categoryId, $ratingValue] = explode('|', $value);
            $commentKey = "comments_$categoryId";
            $comment = $data[$commentKey] ?? '';
            // dd($comment, $ratingValue);
            // Save the data (example)
            Rating::create([
                'evaluation_id' => $categoryId,
                'student_id' => Auth::user()->id,
                'subject_id' => $data['subject_id'],
                'teacher_id' => $data['teacher_id'],
                'ratings' => $ratingValue,
                'comments' => $comment,
            ]);
        }

        return redirect()->back()->with(['status' => 'success', 'message' => 'Ratings submitted successfully!']);
    }

    //evaluation result
    public function evaluationResults()
    {
        $year = now()->year; // Get the current year dynamically
        // dd($year);
        $initial = $this->initialService->getInitials(Auth::user()->name);
        $categories = QuestionCategory::join('evaluations', 'question_categories.evaluation_id', '=', 'evaluations.id')
            ->join('ratings', 'evaluations.id', '=', 'ratings.evaluation_id')
            // ->join('departments','evaluations.dean_id', '=', 'departments.dean_id')
            // ->join('teachers','departments.id', '=', 'teachers.department_id')
            // ->join('users', 'teachers.teacher_id','=','users.id')
            ->select(
                'question_categories.*',
                'evaluations.id as evaluation_id',
                'evaluations.dean_id',
                'ratings.ratings',
                // 'departments.id as department_id',
                // 'teachers.teacher_id',
                // 'users.name'
            )
            ->whereYear('question_categories.created_at', $year)->get();

        // Initialize an array to store the summarized ratings
        $teacherRatings = [];
        $categoriesArray = [];
        foreach ($categories as $value) {
            $teacher = Department::join('teachers', 'departments.id', '=', 'teachers.department_id')
                ->join('users', 'teachers.teacher_id', '=', 'users.id')
                ->select('departments.*', 'teachers.teacher_id', 'users.name')
                ->where('dean_id', $value['dean_id'])->first();

            // $value->teacher = $teacher->name;
            $teacherName = $teacher ? $teacher->name : 'Unknown Teacher'; // Handle case if no teacher is found
            $categoryName = $value->category;
            
            $rating = $value->ratings;
            // If the teacher is already in the array, add the rating to the corresponding category
            if (isset($teacherRatings[$teacherName])) {
                // If the category is already there, add the rating
                if (isset($teacherRatings[$teacherName]['ratings'][$categoryName])) {
                    $teacherRatings[$teacherName]['ratings'][$categoryName] += $rating;
                } else {
                    // Otherwise, initialize the category rating
                    $teacherRatings[$teacherName]['ratings'][$categoryName] = $rating;
                    // $categoriesArray[] = $categoryName;
                }
            } else {
                // Otherwise, initialize the teacher's ratings
                $teacherRatings[$teacherName] = [
                    'teacher' => $teacherName,
                    'ratings' => [
                        $categoryName => $rating
                    ]
                ];
                
            }

            // Attach teacher name to each category result
            $value->teacher = $teacherName;
            $categoriesArray[] = $categoryName;
            // dd($teacher);
        }
        // Now $teacherRatings contains each teacher's ratings per category
        // Format the result as required
        $result = [];

        foreach ($teacherRatings as $teacherName => $data) {
            $result[] = [
                'teacher' => $data['teacher'],
                'ratings' => $data['ratings']
            ];
        }

        // dd($categoriesArray);
        // Removing duplicates
        $filteredCategoriesArray = array_unique($categoriesArray);

        return view('dean.evaluation.result', compact('initial','filteredCategoriesArray','result'));
    }
}

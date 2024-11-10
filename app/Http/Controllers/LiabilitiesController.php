<?php

namespace App\Http\Controllers;
use App\Models\AcademicYear;
use App\Models\Liabilities;
use App\Models\Semester;
use App\Models\Tag;
use App\Models\User;
use App\Services\AbbreviationService;
use App\Services\InitialService;
use App\Services\TeacherService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class LiabilitiesController extends Controller
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

    //liabilities
    public function liabilities()
    {
        $initial = $this->initialService->getInitials(Auth::user()->name);
        $liabilities = Liabilities::with('user')
            ->join('academic_years', 'liabilities.academic_year_id', '=', 'academic_years.id')
            ->join('semesters', 'liabilities.semester_id', '=', 'semesters.id')
            ->select('liabilities.*', 'academic_years.academic_year', 'semesters.name')
            ->where('liabilities.user_id', Auth::user()->id)
            ->latest()
            ->paginate(5);
        // dd($liabilities);
        $academic_years = AcademicYear::orderBy('academic_year', 'desc')->get();
        $semesters = Semester::orderBy('name', 'asc')->get()->unique('name');


        return view('liabilities.pages.liabilities', compact('initial', 'liabilities', 'academic_years', 'semesters'));
    }

    //liabilities update
    public function update(Request $request)
    {
      $existingLiability = Liabilities::find($request->liability_id);
      if($existingLiability){
        $semester = Semester::where('name',$request->semester)->first();
        $existingLiability->update([
            'semester_id' => $semester->id,
            'ammount' => $request->ammount,
            'liabilities_description' => $request->description,
        ]);

        return Redirect::route('liabilities')->with(['status'=>'success','message'=>'You successfully updated the liability']);
      }
    }
    //create
    public function create(Request $request)
    {
        // dd($request);
        // Define validation rules
        $rules = [
            '_token' => 'required|string',
            'academic_year' => 'required|integer',
            'semester' => 'required|integer',
            'amount' => 'required|integer',
            'liabilities_description' => 'required|string|max:255',
        ];

        // Perform validation
        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            // Return validation errors as JSON
            return Redirect::route('liabilities')->with([
                'status' => 'error',
                'errors' => $validator->errors(),
            ], 422);
        }

        $liability = Liabilities::create([
            'user_id' => Auth::user()->id,
            'academic_year_id' => $request->academic_year,
            'semester_id' => $request->semester,
            'ammount' => $request->amount,
            'liabilities_description' => $request->liabilities_description,
        ]);

        if ($liability) {
            // Retrieve only the IDs of users who have the 'student' role
            $studentIds = User::where('role', 'student')->pluck('id');

            if ($studentIds->isNotEmpty()) {
                foreach ($studentIds as $studentId) {
                    Tag::create([
                        'liability_id' => $liability->id,
                        'user_id' => $studentId
                    ]);
                }
            }
        }
        

        return Redirect::route('liabilities')->with(['status' => 'success', 'message' => 'You successfully created a new liabilities.']);
    }
    
}

<?php

namespace App\Http\Controllers\Dean;

use App\Http\Controllers\Controller;
use App\Models\subjects;
use App\Services\AbbreviationService;
use App\Services\InitialService;
use App\Services\TeacherService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Validation\ValidationException;

class SubjectController extends Controller
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
    public function subject()
    {
        $initial = $this->initialService->getInitials(Auth::user()->name);
        //get all the subjects
        $subjects = subjects::paginate(10);
        return view('dean.subject.manage', compact('initial','subjects'));
    }
    //store
    public function store(Request $request)
    {
        // Define validation rules
        $rules = [
            'subject_code' => 'required|string|max:10',
            'subject_name' => 'required|string|max:255',
            'credits' => 'required|integer|min:1',
        ];

        // Define custom error messages
        $messages = [
            'subject_code.required' => 'The subject code is required.',
            'subject_code.string' => 'The subject code must be a valid string.',
            'subject_code.max' => 'The subject code may not be greater than 10 characters.',

            'subject_name.required' => 'The subject name is required.',
            'subject_name.string' => 'The subject name must be a valid string.',
            'subject_name.max' => 'The subject name may not be greater than 255 characters.',

            'credits.required' => 'The credits field is required.',
            'credits.integer' => 'The credits must be a valid integer.',
            'credits.min' => 'The credits must be at least 1.',
        ];

        // Perform validation with custom messages
        $validatedData = $request->validate($rules, $messages);

        if($validatedData){
            $existingSubjects = subjects::where('subject_name', $validatedData['subject_name'])->first();
            if($existingSubjects){
                throw ValidationException::withMessages([
                    'subject_name' => 'The subject name is already stored.',
                ]);
            }

            subjects::create([
                'user_id' => Auth::user()->id,
                'subject_code' => $validatedData['subject_code'],
                'subject_name' => $validatedData['subject_name'],
                'credits' => $validatedData['credits'],
            ]);

            return Redirect::route('dean.subjects')->with(['status'=>'success','message'=>'You added a new subject: '.$validatedData['subject_name']]);
        }
        // Store the subject after validation
        // Subject::create($validatedData);

        return back()->with('success', 'Subject has been successfully created.');
    }
    //update
    public function update(Request $request)
    {
        // Define validation rules
        $rules = [
            'subject_code' => 'required|string|max:10',
            'subject_name' => 'required|string|max:255',
            'credits' => 'required|integer|min:1',
        ];

        // Define custom error messages
        $messages = [
            'subject_code.required' => 'The subject code is required.',
            'subject_code.string' => 'The subject code must be a valid string.',
            'subject_code.max' => 'The subject code may not be greater than 10 characters.',

            'subject_name.required' => 'The subject name is required.',
            'subject_name.string' => 'The subject name must be a valid string.',
            'subject_name.max' => 'The subject name may not be greater than 255 characters.',

            'credits.required' => 'The credits field is required.',
            'credits.integer' => 'The credits must be a valid integer.',
            'credits.min' => 'The credits must be at least 1.',
        ];

        // Perform validation with custom messages
        $validatedData = $request->validate($rules, $messages);

        if($validatedData){
            $existingSubjects = subjects::find($request->subject_id);
            if($existingSubjects){
                $existingSubjects->update([
                    'subject_code' => $validatedData['subject_code'],
                    'subject_name' => $validatedData['subject_name'],
                    'credits' => $validatedData['credits'],
                ]);
                return Redirect::route('dean.subjects')->with(['status'=>'success','message'=>'You update this subject: '.$validatedData['subject_name']]);
            }else{
                throw ValidationException::withMessages([
                    'subject_name' => 'The subject code is not stored.',
                    'subject_code' => 'The subject name is not stored.',
                    'credits' => 'The credits is not stored.',
                ]);
            }

            
        }
        // Store the subject after validation
        // Subject::create($validatedData);

        return back()->with('success', 'Subject has been successfully created.');
    }
}

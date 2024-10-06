<?php

namespace App\Http\Controllers\Dean;

use App\Http\Controllers\Controller;
use App\Models\Program;
use App\Models\YearLevelWithSubjects;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class YearLevelController extends Controller
{
    public function store(Request $request)
    {
        // Define validation rules
        $rules = [
            'year_level' => 'required|integer|min:1|max:10', // Assuming year levels are between 1 and 10
            'selected_subject_ids' => 'required|array',
            'selected_subject_ids.*' => 'integer|exists:subjects,id', // Validate each subject ID
        ];

        // Define custom validation messages
        $customMessages = [
            'year_level.required' => 'The year level is required.',
            'year_level.integer' => 'The year level must be an integer.',
            'year_level.min' => 'The year level must be at least 1.',
            'year_level.max' => 'The year level cannot exceed 10.',
            'selected_subject_ids.required' => 'You must select at least one subject.',
            'selected_subject_ids.array' => 'The selected subjects must be an array.',
            'selected_subject_ids.*.integer' => 'Each selected subject ID must be an integer.',
            'selected_subject_ids.*.exists' => 'The selected subject ID is invalid.',
        ];

        // Validate the request
        $validated = $request->validate($rules, $customMessages);
        if($validated){
            // Join YearLevelWithSubjects with Program
            $existingYearLevel = YearLevelWithSubjects::join('programs', 'year_level_with_subjects.program_id', '=', 'programs.id')
            ->where('year_level_with_subjects.program_id', $request->program_id)
            ->where('year_level_with_subjects.year_level', $validated['year_level'])
            ->select('year_level_with_subjects.*', 'programs.program', 'programs.id as program_id') // Get program_id as well
            ->first();
            // Check if the year level exists and if the program_id matches
            if ($existingYearLevel) {
                // The year level exists and matches the program_id\\
                throw ValidationException::withMessages([
                    'year_level' => 'The year level is already been created!.',
                ]);
            } else {
                // The year level does not exist or program_id does not match
                // If validation passes, proceed with storing the data
                YearLevelWithSubjects::create([
                    'user_id' => Auth::user()->id,
                    'program_id' => $request->program_id,
                    'year_level' => $request->year_level,
                    'selected_subject_ids' => json_encode($request->selected_subject_ids), // Store selected subjects as JSON
                ]);
            }
            

            

            // Redirect or return response
            return redirect()->back()->with(['status'=>'success','message'=>'You created a year level successfully.']);

        }
        
    }

    //update
    public function update(Request $request)
    {
        // dd($request);
        // Define validation rules
        $rules = [
            'year_level' => 'required|integer|min:1|max:10', // Assuming year levels are between 1 and 10
            'selected_subject_ids' => 'required|array',
            'selected_subject_ids.*' => 'integer|exists:subjects,id', // Validate each subject ID
        ];

        // Define custom validation messages
        $customMessages = [
            'year_level.required' => 'The year level is required.',
            'year_level.integer' => 'The year level must be an integer.',
            'year_level.min' => 'The year level must be at least 1.',
            'year_level.max' => 'The year level cannot exceed 10.',
            'selected_subject_ids.required' => 'You must select at least one subject.',
            'selected_subject_ids.array' => 'The selected subjects must be an array.',
            'selected_subject_ids.*.integer' => 'Each selected subject ID must be an integer.',
            'selected_subject_ids.*.exists' => 'The selected subject ID is invalid.',
        ];

        // Validate the request
        $validated = $request->validate($rules, $customMessages);
        if($validated){
            $existingYearLevel = YearLevelWithSubjects::where('id', $request->level_id)->first();
            if(!$existingYearLevel){
                throw ValidationException::withMessages([
                    'year_level' => 'The year level is not been created!.',
                ]);
            }

            $existingYearLevel->update([
                'year_level' => $request->year_level,
                'selected_subject_ids' => json_encode($request->selected_subject_ids),
            ]);
            return redirect()->back()->with(['status'=>'success','message'=>'You updated a year level successfully.']);
        }
    }

    //$destroy
    public function destroy($id)
    {
        // dd($id);
        $destroy = YearLevelWithSubjects::find($id);
        if($destroy){
            $destroy->delete();
            return redirect()->back()->with(['status'=>'success','message'=>'You deleted a year level successfully.']);
        }
    }
}

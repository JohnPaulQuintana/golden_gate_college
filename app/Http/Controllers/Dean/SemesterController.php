<?php

namespace App\Http\Controllers\Dean;

use App\Http\Controllers\Controller;
use App\Models\AcademicYear;
use App\Models\Program;
use App\Models\Semester;
use App\Models\subjects;
use App\Models\YearLevelWithSubjects;
use App\Rules\YearDifference;
use App\Services\AbbreviationService;
use App\Services\InitialService;
use App\Services\TeacherService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class SemesterController extends Controller
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
    
    //manage academic year
    public function manageAcademicYear(Request $request, $abbrev, $semester)
    {
        // dd($abbrev);
        $initial = $this->initialService->getInitials(Auth::user()->name);
        // dd($abbrev);
        $semesterWithAcadYear = Semester::with('academic_year')->where('name', $semester)->where('abbrev',$abbrev)->first();
        // dd($semesterWithAcadYear);
        //collection of program
        $programs = Program::where('user_id',Auth::user()->id)->get();

        // subjects 
        $subjects = subjects::get();

        $year_levels = YearLevelWithSubjects::where('user_id',Auth::user()->id)->latest()->get();
        // dd($year_levels);
        foreach ($year_levels as $key => $yl) {
            // dd($yl->selected_subject_ids);
            // Decode the selected_subject_ids JSON string
            $selectedSubjectIds = json_decode($yl->selected_subject_ids, true);
            $selectedSubjects = subjects::whereIn('id',$selectedSubjectIds)->get();
            $program = Program::where('id',$yl->program_id)->first();
            // dd($program);
            $yl->formatted_level = $this->getFormattedYearLevelAttribute($yl->year_level);
            // dd($selectedSubjects);
            $yl->subjects = $selectedSubjects;
            $yl->program = $program->program;
        }
        // dd($year_levels);
        if($semesterWithAcadYear){
            // Get the program that matches the semester's abbreviation
            $program = Program::where('abbrev', $semesterWithAcadYear->abbrev)->first();
            
            // Add the program information as a custom attribute on the semester object
            $semesterWithAcadYear->program = $program;

            // Explode the academic year into start and end year
            $years = explode('-', $semesterWithAcadYear->academic_year->academic_year);
            $startYear = $years[0];
            $endYear = $years[1];
            // dd($years);
        }
        // dd($semesterWithAcadYear);
        return view('dean.academic.edit', compact('initial','semesterWithAcadYear','startYear','endYear','programs','subjects', 'year_levels'));
    }

    //update semester and others
    public function updateAcademicYear(Request $request)
    {
        // dd($request);
        // dd($request);
        $validatedAcademicYear = $request->validate([
            'starting_year' => 'required|integer',
            'end_year' => ['required', 'integer', new YearDifference],
            'semester' => 'required',
            'semester_id' => 'required',
            'program' => 'required',
            'status' => 'required',
        ]);

        if($validatedAcademicYear){
            $updateSemester = Semester::find($validatedAcademicYear['semester_id']);
            if($updateSemester){
                
                $updateSemester->update([
                    'name' => $validatedAcademicYear['semester'],
                    'abbrev' => $validatedAcademicYear['program'],
                ]);

                // update the academic table
                AcademicYear::where('id', $updateSemester->academic_year_id)->update(
                    [
                        'academic_year' => $validatedAcademicYear['starting_year'].'-'.$validatedAcademicYear['end_year'],
                        'status' => $validatedAcademicYear['status'],
                    ]
                    );

                return Redirect::route('dean.semester.manage', $validatedAcademicYear['program'])->with(['status'=>'success','message'=>'You updated academic year '.$validatedAcademicYear['starting_year'].'-'.$validatedAcademicYear['end_year'].' - '.$validatedAcademicYear['semester'].'semester on our record!']);
            }
        }
    }

    //delete
    public function delete(Request $request, $id)
    {
        // dd($id);
        $semester = Semester::find($id);
        if($semester){
            $semester->delete();
        }

        return Redirect::route('dean.academic')->with(['status'=>'success','message'=>'You successfully deleted a semester on our record!']);
       
    }

    private function getFormattedYearLevelAttribute($year_level)
    {
        switch ($year_level) {
            case 1:
                return '1st Year';
            case 2:
                return '2nd Year';
            case 3:
                return '3rd Year';
            default:
                return "{$year_level}th Year"; // Fallback for 4 and above
        }
    }
}

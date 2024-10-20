<?php

namespace App\Http\Requests;

use App\Models\Enrollment;
use App\Models\subjects;
use Illuminate\Foundation\Http\FormRequest;

class StoreStudentRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'academic_id' => 'required',
            'std_no' => 'required',
            'course' => 'required',
            'semester' => 'required',
            'year_level' => 'required',
            'name' => 'required|string|max:255',
            'gender' => 'required|in:male,female,other',
            'contact_number' => 'required',
            'civil_status' => 'required|in:single,married,divorced,widowed',
            'nationality' => 'required|in:american,filipino,canadian,british,australian,indian',
            'date_of_birth' => 'required|date',
            'place_of_birth' => 'required|string|max:500',
            'age' => 'required|int|max:255',
            'guardian' => 'required|string|max:255',
            'address' => 'required|string|max:500',
            'elementary' => 'required|string|max:255',
            'elementary_graduated' => 'required|string|max:255',
            'secondary' => 'required|string|max:255',
            'secondary_graduated' => 'required|string|max:255',
            'senior_high_school' => 'required|string|max:255',
            'senior_high_school_graduated' => 'required|string|max:255',
            'selected_subjects' => 'required|array',
            'selected_subjects.*' => 'exists:subjects,id',
        ];
    }

    public function messages()
    {
        return [
            'std_no.required' => 'The student number field is required.',
            'course.required' => 'Please select a course.',
            'semester.required' => 'Please select a semester.',
            'year_level.required' => 'The year level field is required.',
            'name.required' => 'Please enter the full name.',
            'gender.in' => 'Please select a valid gender.',
            'contact_number.required' => 'The contact number field is required.',
            'civil_status.in' => 'Please select a valid civil status.',
            'nationality.in' => 'Please select a valid nationality status.',
            'date_of_birth.date' => 'Please provide a valid date of birth.',
            'place_of_birth.required' => 'Please provide a valid place of birth.',
            'guardian.required' => 'Please enter the guardians name.',
            'age.required' => 'Please enter the age.',
            'address.required' => 'The address field is required.',
            'elementary.required' => 'Please enter the elementary school attended.',
            'elementary_graduated.required' => 'Please enter the year attended.',
            'secondary.required' => 'Please enter the secondary school attended.',
            'secondary_graduated.required' => 'Please enter the year attended.',
            'senior_high_school.required' => 'Please enter the senior high school attended.',
            'senior_high_school_graduated.required' => 'Please enter the year attended.',
            'selected_subjects.required' => 'Please select at least one subject.',
            'selected_subjects.*.exists' => 'Selected subject does not exist.',
        ];
    }

    public function withValidator($validator)
    {
        $validator->after(function ($validator) {
            // Check if student_no already exists with status "enrolled"
            $existingStudent = Enrollment::where('student_no', $this->std_no)
                ->where('status', 'enrolled')
                ->first();

            if ($existingStudent) {
                $validator->errors()->add('std_no', 'The student number already exists and is enrolled.');
            }

            // Ensure selected_subjects is an array
            if (is_array($this->selected_subjects) && !empty($this->selected_subjects)) {
                // Custom validation to check the total credits of selected subjects
                $totalCredits = subjects::whereIn('id', $this->selected_subjects)
                    ->sum('credits');
                // dd($totalCredits);
                if ($totalCredits < 11 || $totalCredits > 23) {
                    $validator->errors()->add('selected_subjects', 'The total credits must be between 11 and 23.');
                }
            } else {
                // If no subjects are selected, add an error message
                $validator->errors()->add('selected_subjects', 'Please select at least one subject.');
            }
        });
    }
}

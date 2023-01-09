<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Course;

class CourseRegistrationRequest extends FormRequest
{

    private array $validation_rules;

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return $this->validation_rules;
    }

    protected function prepareForValidation()
    {
        $course = Course::where('slug', $this->route('course_slug'))->first();

        if(null === $course){
            throw \Illuminate\Validation\ValidationException::withMessages([
                'Курс' => ['Курс не найден'],
            ]);
        }

        $this->validation_rules = $this->fetchValidationRules($course);
    }

    private function fetchValidationRules(Course $course): array
    {
        $rules = [];

        foreach($course->registrationInputs as $registrationInput){

            $input = $registrationInput->userDataField;
            $rules[$input['slug']] = $registrationInput['validation_rule'];
        }

        return $rules;
    }
    
}

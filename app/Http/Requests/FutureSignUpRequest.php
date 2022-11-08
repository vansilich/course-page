<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FutureSignUpRequest extends FormRequest
{
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
        return [
            'name'          => 'required|string|max:255',
            'email'         => 'required|string|max:255',
            'telephone'     => 'required|string|min:5|max:25',
            'job'           => 'required|string|max:255',
            'company'       => 'required|string|max:255',
        ];
    }
}

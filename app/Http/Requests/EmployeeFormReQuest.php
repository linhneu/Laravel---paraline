<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmployeeFormReQuest extends FormRequest
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
            'email' => ['required','email','unique'],
            'first_name' => 'required',
            'last_name' => 'required',
            'birthday' => ['required','date'],
            'address' => 'required',
            'avatar' => 'required',
            'salary' => ['required','numberic','min:6'],
        ];
    }
}

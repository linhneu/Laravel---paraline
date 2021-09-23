<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

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
            'email' => ['required','email','max:128', 
            //Rule::unique('m_employees')->ignore($this->id)
        ],
            'first_name' => ['required','max:128'],
            'last_name' => ['required','max:128'],
            'birthday' => ['required','date'],
            'address' => ['required','max:256'],
            'avatar' => ['mimes:jpeg,jpg,png','max:10000' ],
            'salary' => ['required','numeric','min:6'],
        ];
    }
}

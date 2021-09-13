<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserFormRequest extends FormRequest
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
            'email' => 'required|email',
            'password' => 'required|min:5'
        ];
    }
    public function message()
    {
        return [
            'email.required' => 'You must fill email',
            'email.email' => 'email is not in correct format',
            'password.required' => 'You must fill password',
            'password.min' => 'password must have at least 8 characters',
        ];
    }
}

<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginCustomerRequest extends FormRequest
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
            'email'       => 'required|max:80|min:8',
            'password'    => 'required|max:64|min:5',
        ];
    }

    public function messages()
    {
        return [
            'email.max'              => 'Enter invalid email.',
            'email.min'              => 'Enter invalid email.',
            'email.required'         => 'Email is required.',
            'password.max'           => 'Enter invalid password.',
            'password.min'           => 'Enter invalid password.',
            'password.required'      => 'Enter is required.',
        ];
    }
}
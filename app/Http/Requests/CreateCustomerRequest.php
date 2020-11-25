<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateCustomerRequest extends FormRequest
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
            'email'                   => 'required|max:80|min:8',
            'address'                 => 'min:10|max:200',
            'password'                => 'required|max:64|min:8|confirmed',
            'password_confirmation'   => 'required',
        ];
    }

    public function messages()
    {
        return [
            'email.max'                        => 'Email cannot be larger than 80 characters',
            'email.min'                        => 'Email must not be less than 8 characters',
            'email.required'                   => 'Email is required',
            'password.max'                     => 'Password cannot be larger than 80 characters',
            'password.min'                     => 'Email must not be less than 8 characters',
            'password.required'                => 'Password is required',
            'password_confirmation.required'   => 'Passwords Comfirm is required',
            'password.confirmed'               => 'Passwords do not match',
        ];
    }
}
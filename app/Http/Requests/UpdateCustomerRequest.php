<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCustomerRequest extends FormRequest
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
            'address'                 => 'max:200',
        ];
    }

    public function messages()
    {
        return [
            'email.max'                        => 'Email cannot be larger than 80 characters',
            'email.min'                        => 'Email must not be less than 8 characters',
            'email.required'                   => 'Email is required',
        ];
    }
}
<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactRegisterRequest extends FormRequest
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
            'name'       => 'required|min:5|max:100',
            'email'      => 'required|email|min:5|max:100',
            'address'    => 'max:300',
        ];
    }

    public function messages()
    {
        return [
            'name.required'                   => 'Your name is required',
            'name.regex'                      => 'Your name is invalid',
            'email.required'                  => 'Your email is required',
            'email.email'                     => 'Your email is invalid',
            'address.max'                     => 'Your address is too long',
        ];
    }
}
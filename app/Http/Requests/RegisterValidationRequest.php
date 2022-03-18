<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;

class RegisterValidationRequest extends FormRequest
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

    protected function failedValidation(Validator $validator)
    {
        $this->merge(['errors' => $validator->errors()]);
        // throw new HttpResponseException(response()->json($validator->errors(), 422));
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name'      => 'required',
            'number'    => 'required|digits:10',
            'email'     => 'required|email|unique:users',
            'password'  => 'required|confirmed|min:6',
        ];
    }

    public function messages()
    {
        return [
            'name.required'         =>  'Name is required',
            'cpassword.same'        =>  'Password does not match.',
            'number.required'       =>  'Mobile Number is required',
            'email.unique'          =>  'Email already registered.',
            'password.required'     =>  'Password is required.',
            'password.confirmed'    =>  'Confirm Password and Password does not match.',
        ];
    }
}

<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class RegisterRequest extends Request
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
            'name' => 'required',
            'email' => 'required|unique:users,email',
            'password' => 'required',
            'address' => 'required',
            'phone' => 'required',
            'birthday' => 'required'
        ];
    }
    public function messages () {
        return [
            'name.required' => 'The name field is required.',
            'email.required' => 'The email field is required.',
            'address.required' => 'The address field is required.',
            'phone.required' => 'The phone field is required.',
            'birthday.required' => 'The birthday field is required.',
            'email.unique' => 'The email is exited.',

        ];
    }
}

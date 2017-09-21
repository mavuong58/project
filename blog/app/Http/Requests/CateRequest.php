<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class CateRequest extends Request
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
            "txtName" => "required|unique:categories,name"
        ];
    }
    public function messages(){
        return [
            'txtName.required' => 'please enter name category',
            'txtName.unique' => 'this name category is exist'
        ];
    }
}

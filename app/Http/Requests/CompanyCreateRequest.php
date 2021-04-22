<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CompanyCreateRequest extends FormRequest
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
            'com_name' => 'required|max:255|unique:companies,com_name',
            'com_email' => 'required|max:255|unique:companies,com_email',
            'com_phone' => 'required|max:255|unique:companies,com_phone',
        ];
    }
    public function messages()
    {
        return [
            'com_name.required' => 'Please enter a name',
            'com_name.max' => 'Too large name',
            'com_name.unique' => 'Name should be unique',
            'com_email.unique' => 'Email should be unique',
            'com_phone.unique' => 'Phone should be unique',
        ];
    }
}

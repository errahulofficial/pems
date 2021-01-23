<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class InterviewerStoreRequest extends FormRequest
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
            'employeeName' => 'required|unique:addinterviewer',
            'intervieweremail' => 'required'
        ];
    }
    public function messages()
    {
        return [
            'employeeName.required' => 'Employee name email is required!',
            'employeeName.unique' => 'Employee name is already registred!',
            'intervieweremail.required' => 'Intervieweremail email is required!',
        ];
    }
}

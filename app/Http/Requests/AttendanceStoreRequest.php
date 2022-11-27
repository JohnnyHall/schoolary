<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AttendanceStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->user()->can('take attendances');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'course_id'             => 'integer',
            'class_id'              => 'integer',
            'section_id'            => 'integer',
            'aluno_ids'           => 'required|array|min:1',
            'aluno_ids.*'         => 'integer',
            'status'                => 'required|array|min:1',
            'session_id'            => 'required',
        ];
    }
}

<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TeacherStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->user()->can('create users');
    }
    
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'primeiro_nome'    => 'required|string',
            'sobrenome'     => 'required|string',
            'email'         => 'required|string|email|max:255|unique:users',
            'Sexo'        => 'required|string',
            'nacionalidade'   => 'required|string',
            'phone'         => 'required|string',
            'address'       => 'required|string',
            'city'          => 'required|string',
            'zip'           => 'required|string',
            'Foto'         => 'nullable|string',
            'password'      => 'required|string|min:8',
        ];
    }
}

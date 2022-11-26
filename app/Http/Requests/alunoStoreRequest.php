<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class alunoStoreRequest extends FormRequest
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
            'first_name'        => 'required|string',
            'last_name'         => 'required|string',
            'email'             => 'required|string|email|max:255|unique:users',
            'gender'            => 'required|string',
            'nationality'       => 'required|string',
            'phone'             => 'required|string',
            'address'           => 'required|string',
            'city'              => 'required|string',
            'zip'               => 'required|string',
            'photo'             => 'nullable|string',
            'Aniversario'          => 'required|date',
            'lista_filmes'        => 'required|string',
            'password'          => 'required|string|min:8',

            // informacoes academicas
            'class_id'          => 'required',
            'section_id'        => 'required',
            'session_id'        => 'required',
            'RA'    => 'required',
        ];
    }
}

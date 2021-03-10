<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmpleadoRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'nombre' => 'required|max:255|regex:/^[a-zA-Z ]+$/u',
            'email' => 'required|max:255|regex:/^.+@.+$/i',
            'sexo' => 'required',
            'area' => 'required',
            'descripcion' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'nombre.required' => 'El nombre es requerido.',
            'nombre.max' => 'El nombre excede el limite de :max caracteres.',
            'nombre.regex' => 'El nombre no debe contener números ni caracteres especiales',
            'email.required' => 'El correo electrónico es requerida.',
            'email.max' => 'El correo electrónico excede el limite de :max caracteres.',
            'email.regex' => 'Escriba un correo elctrónico válido',
            'sexo.required' => 'El sexo es requerido',
            'area' => 'El area es requerida',
            'descripcion' => 'La descripcion es requerida'
        ];
    }
}

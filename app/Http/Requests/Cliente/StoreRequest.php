<?php

namespace App\Http\Requests\Cliente;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'nombre' => 'string|required|max:255',
            'dni' => 'required|string|unique:clientes|min:9|max:9',
            'direccion' => 'nullable|string|max:255',
            'telefono' => 'nullable|string|unique:clientes|min:9|max:9',
            'email' => 'nullable|string|unique:clientes|max:255|email:rfc,dns',
        ];
    }
    public function messages()
    {
        return[
            'nombre.required' => 'Este campo es requerido',
            'nombre.string' => 'El valor tiene que ser una cadena de caracteres',
            'nombre.max' => 'El máximo de caracteres es 255',

            'dni.string' => 'El valor tiene que ser una cadena de caracteres',
            'dni.required' => 'Este campo es requerido',
            'dni.unique' => 'Este DNI ya esta registrado',
            'dni.min' => 'El mínimo de caracteres es 9',
            'dni.max' => 'El máximo de caracteres es 9',

            'direccion.string' => 'El valor tiene que ser una cadena de caracteres',
            'direccion.max' => 'El máximo de caracteres es 255',

            'telefono.string' => 'El valor tiene que ser una cadena de caracteres',
            'telefono.unique' => 'Este teléfono ya esta registrado',
            'telefono.min' => 'El mínimo de caracteres es 9',
            'telefono.max' => 'El máximo de caracteres es 9',

            'email.string' => 'El valor tiene que ser una cadena de caracteres',
            'email.unique' => 'Este email ya esta registrado',
            'email.max' => 'El máximo de caracteres es 255',
            'email.email' => 'Este campo tiene que tener formato de email'

        ];
    }
}
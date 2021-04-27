<?php

namespace App\Http\Requests\Proveedor;

use Illuminate\Foundation\Http\FormRequest;
class UpdateRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [

            'nombre'=>'required|string|max:255',
            'apellidos'=>'required|string|max:255',

            'email'=>'required|email|string|unique:proveedors,email,'. $this->route
            ('proveedor')->id.'|max:255',

            'direccion'=>'nullable|string|max:255',
            'telefono'=>'required|string|max:9|unique:proveedors,telefono,'. $this->route
            ('proveedor')->id.'|min:9',
        ];
    }
    public function messages()
    {
        return[
            'nombre.required' => 'Este campo es requerido',
            'nombre.string' => 'El valor tiene que ser una cadena de caracteres',
            'nombre.max' => 'El máximo de caracteres es 255',

            'apellidos.required' => 'Este campo es requerido',
            'apellidos.string' => 'El valor tiene que ser una cadena de caracteres',
            'apellidos.max' => 'El máximo de caracteres es 255',

            'email.required' => 'Este campo es requerido',
            'email.email' => 'Este campo tiene que tener formato de email',
            'email.string' => 'El valor tiene que ser una cadena de caracteres',
            'email.max' => 'El máximo de caracteres es 255',
            'email.unique' => 'Este email ya esta en el sistema',

            'direccion.string' => 'El valor tiene que ser una cadena de caracteres',
            'direccion.max' => 'El máximo de caracteres es 255',

            'telefono.required' => 'Este campo es requerido',
            'telefono.string' => 'El valor tiene que ser una cadena de caracteres',
            'telefono.max' => 'El máximo es de 9 números',
            'telefono.min' => 'El mínimo es de 9 números',
            'telefono.unique' => 'Este teléfono ya esta en el sistema',
        ];
    }
}

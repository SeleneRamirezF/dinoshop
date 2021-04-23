<?php

namespace App\Http\Requests\Proveedor;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
            'nombre'=>'required|string|max:255',
            'apellidos'=>'required|string|max:255',
            'email'=>'required|email|string|max:255|unique:proveedors',
            'direccion'=>'nullable|string|max:255',
            'telefono'=>'required|string|max:9|min:9'
        ];
    }
    public function messages()
    {
        return[
            'nombre.require' => 'Este campo es requerido',
            'nombre.string' => 'El valor tiene que ser una cadena de caracteres',
            'nombre.max' => 'El máximo de caracteres es 255',

            'apellidos.require' => 'Este campo es requerido',
            'apellidos.string' => 'El valor tiene que ser una cadena de caracteres',
            'apellidos.max' => 'El máximo de caracteres es 255',

            'email.require' => 'Este campo es requerido',
            'email.email' => 'Este campo tiene que tener formato de email',
            'email.string' => 'El valor tiene que ser una cadena de caracteres',
            'email.max' => 'El máximo de caracteres es 255',
            'email.unique' => 'Este email ya esta en el sistema',

            'direccion.string' => 'El valor tiene que ser una cadena de caracteres',
            'direccion.max' => 'El máximo de caracteres es 255',

            'telefono.require' => 'Este campo es requerido',
            'telefono.string' => 'El valor tiene que ser una cadena de caracteres',
            'telefono.max' => 'El máximo es de 9 números',
            'telefono.min' => 'El mínimo es de 9 números',
            'telefono.unique' => 'Este teléfono ya esta en el sistema',
        ];
    }
}

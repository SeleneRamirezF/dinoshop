<?php

namespace App\Http\Requests\Categoria;

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
            'nombre' => 'required|string|max:50',
            'desc' => 'nullable|string|max:255'
        ];
    }
    public function messages()
    {
        return[
            'nombre.required' => 'Este campo es requerido',
            'nombre.string' => 'El valor tiene que ser una cadena de caracteres',
            'nombre.max' => 'El máximo de caracteres es 50',
            'desc.string' => 'El valor tiene que ser una cadena de caracteres',
            'desc.max' => 'El máximo de caracteres es 255'
        ];
    }
}

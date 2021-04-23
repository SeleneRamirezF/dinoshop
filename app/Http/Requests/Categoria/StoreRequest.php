<?php

namespace App\Http\Requests\Categoria;

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
            'nombre' => 'required|string|max:50',
            'desc' => 'nullable|string|max:255'
        ];
    }
    public function messages()
    {
        return[
            'nombre.require' => 'Este campo es requerido',
            'nombre.string' => 'El valor tiene que ser una cadena de caracteres',
            'nombre.max' => 'El máximo de caracteres es 50',
            'desc.string' => 'El valor tiene que ser una cadena de caracteres',
            'desc.max' => 'El máximo de caracteres es 255'
        ];
    }
}

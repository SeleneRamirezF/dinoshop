<?php

namespace App\Http\Requests\Producto;

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

            'nombre' => 'string|required|unique:productos|max:255',
            'descripcion' => 'required|string|max:255',
            'pvp' => 'required',
            'imagen' => 'required|dimensions:min_width=100,min_height=100',
            'categoria_id' => 'integer|required|exists:App\Categoria,id',
            'proveedor_id' => 'integer|required|exists:App\Proveedor,id',
        ];
    }
    public function messages()
    {
        return[
            'nombre.require' => 'Este campo es requerido',
            'nombre.string' => 'El valor tiene que ser una cadena de caracteres',
            'nombre.unique' => 'Este producto ya esta registrado',
            'nombre.max' => 'El máximo de caracteres es 255',

            'imagen.required' => 'Este campo es requerido',
            'imagen.dimensions' => 'Solo se permiten imagenes de 100x100 px',

            'pvp.required' => 'Este campo es requerido',

            'categoria_id.integer' => 'El valor tiene que ser un número entero',
            'categoria_id.required' => 'Este campo es requerido',
            'categoria_id.exists' => 'La categoría no existe',

            'proveedor_id.integer' => 'El valor tiene que ser un número entero',
            'proveedor_id.required' => 'Este campo es requerido',
            'proveedor_id.exists' => 'El proveedor no existe'
        ];
    }
}

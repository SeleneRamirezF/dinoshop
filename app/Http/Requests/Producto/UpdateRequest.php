<?php

namespace App\Http\Requests\Producto;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class UpdateRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function prepareForValidation(){
        // tratamos el fichero
        //si hemos subido fichero
        if(is_uploaded_file($this->imagen)){
            //nombre unico
            $nombreI='img/productos'.uniqid()."_".$this->imagen->getClientOriginalName();
            //lo guardamos en la carpeta que queremos
            Storage::disk('public')->put($nombreI, File::get($this->imagen));
            //creamos un campo nuevo en el request con el nombre del fichero
            $this->merge(['nombre_imagen'=>"storage/$nombreI"]);
        }
    }

    public function rules()
    {
        return [
            //$this.... es para que no se busque a si mismo
            'nombre' => 'string|required|unique:productos,nombre,'. $this->route
            ('producto')->id.'|max:255|min:5',

            'descripcion' => 'required|string|max:255|min:10',
            'pvp' => 'required|min:0|numeric',
            'stock' => 'required|min:0|max:100',
            'imagen' => 'nullable|image',
            'nombre_imagen'=> 'nullable',
            'categoria_id' => 'integer|required',
            'proveedor_id' => 'integer|required',
        ];
    }
    public function messages()
    {
        return[
            'nombre.required' => 'Este campo es requerido',
            'nombre.string' => 'El valor tiene que ser una cadena de caracteres',
            'nombre.unique' => 'Este producto ya esta registrado',
            'nombre.max' => 'El máximo de caracteres es 255',

            'pvp.required' => 'Este campo es requerido',

            'stock.required' => 'Este campo es requerido',

            'imagen.require'=>"El fichero bede ser un fichero de imagen",

            'categoria_id.integer' => 'El valor tiene que ser un número entero',
            'categoria_id.required' => 'Este campo es requerido',
            'categoria_id.exists' => 'La categoría no existe',

            'proveedor_id.integer' => 'El valor tiene que ser un número entero',
            'proveedor_id.required' => 'Este campo es requerido',
            'proveedor_id.exists' => 'El proveedor no existe'
        ];
    }
}

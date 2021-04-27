<?php

namespace Database\Seeders;

use App\Models\Categoria;
use Illuminate\Database\Seeder;

class CategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Categoria::create([
            'nombre'=>"Moda",
            'descripcion'=>"Ropa jurásica para todas las edades."
        ]);
        Categoria::create([
            'nombre'=>"Juegos de mesa",
            'descripcion'=>"Entretenimiento con nuestros pasatienpos jurásicos."
        ]);
        Categoria::create([
            'nombre'=>"Jugetes",
            'descripcion'=>"Jugetes y miniaturas de todas las épocas."
        ]);
        Categoria::create([
            'nombre'=>"Muñecos",
            'descripcion'=>"Pon un muñeco jurásico en tu vida y será genial."
        ]);
        Categoria::create([
            'nombre'=>"Biblioteca",
            'descripcion'=>"Libros de accion, suspense, fantasia, educativos y mucho más."
        ]);
        Categoria::create([
            'nombre'=>"Filmografia",
            'descripcion'=>"Películas jurásicas de todas las épocas."
        ]);
        Categoria::create([
            'nombre'=>"Completmentos",
            'descripcion'=>"Cualquier cosa que imagines puedes encontrarla aquí."
        ]);
        Categoria::create([
            'nombre'=>"Oficina",
            'descripcion'=>"Organiza tu despacho, escritorio o zona de trabajo con tods estos productos."
        ]);
        Categoria::create([
            'nombre'=>"Electrónica",
            'descripcion'=>"Audio, video, movil y mucho más."
        ]);
    }
}

<?php

namespace Database\Seeders;

use App\Models\Proveedor;
use Illuminate\Database\Seeder;

class ProveedorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Proveedor::create([
            'nombre'=>"PrehistoricArts",
            'apellidos'=>"S.A.",
            'email'=>"prehistoricsarts@correo.com",
            'direccion'=>"Carrer Lorem, 97 5ºC",
            'telefono'=>"652485565"
            ]);
        Proveedor::create([
            'nombre'=>"Rex&Estilo",
            'apellidos'=>"S.L.",
            'email'=>"rexyestilo@correo.com",
            'direccion'=>"Pasaje Lorem ipsum dolor sit, 156 6ºE",
            'telefono'=>"6308012663"
        ]);
        Proveedor::create([
            'nombre'=>"Pacoxjugetes",
            'apellidos'=>"S.L.",
            'email'=>"pacoxjugetes@correo.com",
            'direccion'=>"Paseo Lorem, 59",
            'telefono'=>"6749016590"
        ]);
        Proveedor::create([
            'nombre'=>"TodoCosas",
            'apellidos'=>"S.L.",
            'email'=>"todocosas@correo.com",
            'direccion'=>"C. Comercial Lorem, 58",
            'telefono'=>"7992977615"
        ]);
        Proveedor::create([
            'nombre'=>"CarmenDistribucion",
            'apellidos'=>"S.L.",
            'email'=>"carmendistribucion@correo.com",
            'direccion'=>"Pasaje Lorem, 146B 14ºC",
            'telefono'=>"7308507585"
        ]);
    }
}

<?php

namespace Database\Factories;

use App\Models\Producto;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Producto::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nombre'=>ucwords($this->faker->unique()->word()),
            'descripcion'=>ucfirst($this->faker->text(250)),
            'pvp'=>$this->faker->randomFloat($nbMaxDecimals = 2, $min = 0, $max = 500),
            'stock'=>$this->faker->numberBetween($min=1, $max=100),
            //'imagen'=>$this->faker->imageUrl($width = 100, $height = 100),
            'categoria_id'=>$this->faker->numberBetween($min=1, $max=9),
            'proveedor_id'=>$this->faker->numberBetween($min=1, $max=5)
        ];
    }
}

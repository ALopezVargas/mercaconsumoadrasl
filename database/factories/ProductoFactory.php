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
        $precio1=100;
        $precio2=1000;

        return [
            'nombre'=>ucwords($this->faker->unique()->word()),
            'descripcion'=>ucfirst($this->faker->unique()->text(100)),
            'categoria_id'=>$this->faker->numberBetween($min=1,$max=13),
            'precio'=>mt_rand($precio1, $precio2)/100,
            'oferta'=>$this->faker->boolean(),
            'stock'=>$this->faker->numberBetween($min=0,$max=20)
        ];
    }
}

<?php

namespace Database\Factories;

use App\Models\Inventario;
use Illuminate\Database\Eloquent\Factories\Factory;

use App\Models\Producto;

class InventarioFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Inventario::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $producto = Producto::first();
        if (!$producto) {
            $producto = Producto::factory()->create();
        }

        return [
            'producto_id' => $this->faker->word,
            'stock' => $this->faker->numberBetween(0, 9223372036854775807),
            'stock_minimo' => $this->faker->numberBetween(0, 9223372036854775807),
            'stock_maximo' => $this->faker->numberBetween(0, 9223372036854775807),
            'costo_promedio' => $this->faker->numberBetween(0, 9223372036854775807),
            'ubicacion' => $this->faker->text($this->faker->numberBetween(5, 100)),
            'created_at' => $this->faker->date('Y-m-d H:i:s'),
            'updated_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}

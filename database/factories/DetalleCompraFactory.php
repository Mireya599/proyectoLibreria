<?php

namespace Database\Factories;

use App\Models\DetalleCompra;
use Illuminate\Database\Eloquent\Factories\Factory;

use App\Models\Compra;
use App\Models\Producto;

class DetalleCompraFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = DetalleCompra::class;

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
            'cantidad' => $this->faker->numberBetween(0, 9223372036854775807),
            'precio_unitario' => $this->faker->numberBetween(0, 9223372036854775807),
            'subtotal' => $this->faker->numberBetween(0, 9223372036854775807),
            'compras_id' => $this->faker->word,
            'productos_id' => $this->faker->word,
            'created_at' => $this->faker->date('Y-m-d H:i:s'),
            'update_at' => $this->faker->date('Y-m-d H:i:s'),
            'deleted_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}

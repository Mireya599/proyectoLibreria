<?php

namespace Database\Factories;

use App\Models\DetalleVenta;
use Illuminate\Database\Eloquent\Factories\Factory;

use App\Models\Venta;

class DetalleVentaFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = DetalleVenta::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $venta = Venta::first();
        if (!$venta) {
            $venta = Venta::factory()->create();
        }

        return [
            'cantidad' => $this->faker->word,
            'precio_unitario' => $this->faker->numberBetween(0, 9223372036854775807),
            'subtotal' => $this->faker->numberBetween(0, 9223372036854775807),
            'created_at' => $this->faker->date('Y-m-d H:i:s'),
            'updated_at' => $this->faker->date('Y-m-d H:i:s'),
            'deleted_at' => $this->faker->date('Y-m-d H:i:s'),
            'ventas_id' => $this->faker->word
        ];
    }
}

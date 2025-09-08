<?php

namespace Database\Factories;

use App\Models\Venta;
use Illuminate\Database\Eloquent\Factories\Factory;

use App\Models\Cliente;

class VentaFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Venta::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $cliente = Cliente::first();
        if (!$cliente) {
            $cliente = Cliente::factory()->create();
        }

        return [
            'codigo_factura' => $this->faker->text($this->faker->numberBetween(5, 50)),
            'total' => $this->faker->numberBetween(0, 9223372036854775807),
            'tipo_pago' => $this->faker->text($this->faker->numberBetween(5, 4096)),
            'fecha_venta' => $this->faker->date('Y-m-d H:i:s'),
            'clientes_id' => $this->faker->word,
            'created_at' => $this->faker->date('Y-m-d H:i:s'),
            'updated_at' => $this->faker->date('Y-m-d H:i:s'),
            'deleted_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}

<?php

namespace Database\Factories;

use App\Models\Producto;
use Illuminate\Database\Eloquent\Factories\Factory;

use App\Models\Categoria;
use App\Models\Proveedore;
use App\Models\UnidadMedida;

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
        
        $unidadMedida = UnidadMedida::first();
        if (!$unidadMedida) {
            $unidadMedida = UnidadMedida::factory()->create();
        }

        return [
            'codigo' => $this->faker->text($this->faker->numberBetween(5, 100)),
            'descripcion' => $this->faker->text($this->faker->numberBetween(5, 255)),
            'cantidad' => $this->faker->numberBetween(0, 9223372036854775807),
            'precio_fabrica' => $this->faker->numberBetween(0, 9223372036854775807),
            'total_fabrica' => $this->faker->numberBetween(0, 9223372036854775807),
            'precio_libreria' => $this->faker->numberBetween(0, 9223372036854775807),
            'total_libreria' => $this->faker->numberBetween(0, 9223372036854775807),
            'ganancia' => $this->faker->numberBetween(0, 9223372036854775807),
            'categorias_id' => $this->faker->word,
            'proveedores_id' => $this->faker->word,
            'unidad_medidas_id' => $this->faker->word,
            'created_at' => $this->faker->date('Y-m-d H:i:s'),
            'updated_at' => $this->faker->date('Y-m-d H:i:s'),
            'deleted_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}

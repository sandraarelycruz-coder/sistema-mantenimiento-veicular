<?php

namespace Database\Factories;

use App\Models\Taller;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Taller>
 */
class TallerFactory extends Factory
{
    public function definition(): array
    {
        return [
            'nombre' => fake()->company(),
            'telefono' => fake()->numerify('########'),
            'direccion' => fake()->address(),
            'esta_activo' => fake()->boolean(90),
        ];
    }
}
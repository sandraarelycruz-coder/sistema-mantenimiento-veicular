<?php

namespace Database\Factories;

use App\Models\Vehiculo;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Vehiculo>
 */
class VehiculoFactory extends Factory
{
    public function definition(): array
    {
        return [
            'numero_vin' => strtoupper(fake()->unique()->bothify('?????????????????')),
            'placa' => strtoupper(fake()->unique()->bothify('P###-###')),
            'marca' => fake()->randomElement([
                'Toyota',
                'Honda',
                'Mazda',
                'Chevrolet',
                'Ford',
                'Nissan',
                'Hyundai',
                'Kia'
            ]),
            'modelo' => fake()->randomElement([
                'Corolla',
                'Civic',
                'CX-30',
                'Tracker',
                'Ranger',
                'Sentra',
                'Elantra',
                'Sportage'
            ]),
            'anio' => fake()->numberBetween(2015, 2026),
            'kilometraje_actual' => fake()->numberBetween(0, 200000),
        ];
    }
}




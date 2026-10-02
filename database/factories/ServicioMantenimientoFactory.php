<?php

namespace Database\Factories;

use App\Models\ServicioMantenimiento;
use App\Models\Taller;
use App\Models\Vehiculo;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ServicioMantenimiento>
 */
class ServicioMantenimientoFactory extends Factory
{
    public function definition(): array
    {
        return [
            'vehiculo_id' => Vehiculo::inRandomOrder()->first()->id,
            'taller_id' => Taller::inRandomOrder()->first()->id,
            'fecha_servicio' => fake()->dateTimeBetween('-1 year', 'now'),
            'kilometraje_servicio' => fake()->numberBetween(1000, 200000),
            'costo_total' => fake()->randomFloat(2, 50, 2500),
            'estado' => fake()->randomElement([
                'pendiente',
                'en_proceso',
                'completado',
                'cancelado',
            ]),
        ];
    }
}
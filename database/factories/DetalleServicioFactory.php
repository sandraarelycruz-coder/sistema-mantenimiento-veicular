<?php

namespace Database\Factories;

use App\Models\DetalleServicio;
use App\Models\ServicioMantenimiento;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\DetalleServicio>
 */
class DetalleServicioFactory extends Factory
{
    public function definition(): array
    {
        $cantidad = fake()->numberBetween(1, 5);
        $costoUnitario = fake()->randomFloat(2, 5, 500);

        return [
            'servicio_mantenimiento_id' => ServicioMantenimiento::inRandomOrder()->first()->id,
            'descripcion' => fake()->sentence(4),
            'tipo' => fake()->randomElement([
                'mano_obra',
                'repuesto',
            ]),
            'cantidad' => $cantidad,
            'costo_unitario' => $costoUnitario,
            'subtotal' => $cantidad * $costoUnitario,
        ];
    }
}
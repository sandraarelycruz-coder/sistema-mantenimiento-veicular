<?php

namespace Database\Seeders;

use App\Models\ServicioMantenimiento;
use Illuminate\Database\Seeder;

class ServicioMantenimientoSeeder extends Seeder
{
    public function run(): void
    {
        ServicioMantenimiento::factory()->count(30)->create();
    }
}
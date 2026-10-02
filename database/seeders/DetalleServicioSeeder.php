<?php

namespace Database\Seeders;

use App\Models\DetalleServicio;
use Illuminate\Database\Seeder;

class DetalleServicioSeeder extends Seeder
{
    public function run(): void
    {
        DetalleServicio::factory()->count(60)->create();
    }
}
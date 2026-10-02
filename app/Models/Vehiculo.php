<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Vehiculo extends Model
{
    use HasFactory;

    protected $fillable = [
        'numero_vin',
        'placa',
        'marca',
        'modelo',
        'anio',
        'kilometraje_actual',
    ];

    public function serviciosMantenimiento(): HasMany
    {
        return $this->hasMany(ServicioMantenimiento::class);
    }
}
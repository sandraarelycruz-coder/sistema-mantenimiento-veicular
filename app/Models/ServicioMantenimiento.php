<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ServicioMantenimiento extends Model
{
    use HasFactory;

    protected $table = 'servicios_mantenimiento';

    protected $fillable = [
        'vehiculo_id',
        'taller_id',
        'fecha_servicio',
        'kilometraje_servicio',
        'costo_total',
        'estado',
    ];

    protected $casts = [
        'fecha_servicio' => 'datetime',
        'costo_total' => 'decimal:2',
    ];

    public function vehiculo(): BelongsTo
    {
        return $this->belongsTo(Vehiculo::class);
    }

    public function taller(): BelongsTo
    {
        return $this->belongsTo(Taller::class);
    }

    public function detalles(): HasMany
    {
        return $this->hasMany(DetalleServicio::class, 'servicio_mantenimiento_id');
    }
}
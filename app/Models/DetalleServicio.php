<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class DetalleServicio extends Model
{
    use HasFactory;

    protected $table = 'detalles_servicio';

    protected $fillable = [
        'servicio_mantenimiento_id',
        'descripcion',
        'tipo',
        'cantidad',
        'costo_unitario',
        'subtotal',
    ];

    protected $casts = [
        'costo_unitario' => 'decimal:2',
        'subtotal' => 'decimal:2',
    ];

    public function servicioMantenimiento(): BelongsTo
    {
        return $this->belongsTo(
            ServicioMantenimiento::class,
            'servicio_mantenimiento_id'
        );
    }
}
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Taller extends Model
{
    use HasFactory;

     protected $table = 'talleres';

    protected $fillable = [
        'nombre',
        'telefono',
        'direccion',
        'esta_activo',
    ];

    protected $casts = [
        'esta_activo' => 'boolean',
    ];

    public function serviciosMantenimiento(): HasMany
    {
        return $this->hasMany(ServicioMantenimiento::class);
    }
}
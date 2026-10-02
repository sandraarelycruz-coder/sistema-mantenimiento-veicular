<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\TallerController;
use App\Http\Controllers\VehiculoController;
use App\Http\Controllers\ServicioMantenimientoController;
use App\Http\Controllers\DetalleServicioController;

Route::apiResource('talleres', TallerController::class)
    ->only(['index', 'show', 'store', 'destroy']);

Route::apiResource('vehiculos', VehiculoController::class)
    ->only(['index', 'show', 'store', 'destroy']);

Route::apiResource('servicios', ServicioMantenimientoController::class)
    ->only(['index', 'show', 'store', 'destroy']);

Route::apiResource('detalles', DetalleServicioController::class)
    ->only(['index', 'show', 'store', 'destroy']);
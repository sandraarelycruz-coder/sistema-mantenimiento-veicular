<?php

namespace App\Http\Controllers;

use App\Models\ServicioMantenimiento;
use Illuminate\Http\Request;

class ServicioMantenimientoController extends Controller
{
    public function index()
    {
        $servicios = ServicioMantenimiento::with([
            'vehiculo',
            'taller',
            'detalles'
        ])->get();

        return response()->json($servicios);
    }

    public function show($id)
    {
        $servicio = ServicioMantenimiento::with([
            'vehiculo',
            'taller',
            'detalles'
        ])->findOrFail($id);

        return response()->json($servicio);
    }

    public function store(Request $request)
    {
        $datos = $request->validate([
            'vehiculo_id' => 'required|integer|exists:vehiculos,id',
            'taller_id' => 'required|integer|exists:talleres,id',
            'fecha_servicio' => 'required|date',
            'kilometraje_servicio' => 'required|integer|min:0',
            'costo_total' => 'required|numeric|min:0|max:99999999.99',
            'estado' => 'required|in:pendiente,en_proceso,completado,cancelado',
        ]);

        $servicio = ServicioMantenimiento::create($datos);

        return response()->json($servicio, 201);
    }

    public function destroy($id)
    {
        $servicio = ServicioMantenimiento::findOrFail($id);

        $servicio->delete();

        return response()->json([
            'mensaje' => 'Servicio de mantenimiento eliminado correctamente.'
        ]);
    }
}
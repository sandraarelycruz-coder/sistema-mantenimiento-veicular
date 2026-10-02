<?php

namespace App\Http\Controllers;

use App\Models\DetalleServicio;
use Illuminate\Http\Request;

class DetalleServicioController extends Controller
{
    public function index()
    {
        $detalles = DetalleServicio::with('servicioMantenimiento')->get();

        return response()->json($detalles);
    }

    public function show($id)
    {
        $detalle = DetalleServicio::with('servicioMantenimiento')
            ->findOrFail($id);

        return response()->json($detalle);
    }

    public function store(Request $request)
    {
        $datos = $request->validate([
            'servicio_mantenimiento_id' => 'required|integer|exists:servicios_mantenimiento,id',
            'descripcion' => 'required|string|max:255',
            'tipo' => 'required|in:mano_obra,repuesto',
            'cantidad' => 'required|integer|min:1',
            'costo_unitario' => 'required|numeric|min:0|max:999999.99',
        ]);

        $datos['subtotal'] =
            $datos['cantidad'] * $datos['costo_unitario'];

        $detalle = DetalleServicio::create($datos);

        return response()->json($detalle, 201);
    }

    public function destroy($id)
    {
        $detalle = DetalleServicio::findOrFail($id);

        $detalle->delete();

        return response()->json([
            'mensaje' => 'Detalle de servicio eliminado correctamente.'
        ]);
    }
}
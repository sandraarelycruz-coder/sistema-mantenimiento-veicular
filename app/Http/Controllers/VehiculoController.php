<?php

namespace App\Http\Controllers;

use App\Models\Vehiculo;
use Illuminate\Http\Request;

class VehiculoController extends Controller
{
    public function index()
    {
        return response()->json(Vehiculo::all());
    }

    public function show($id)
    {
        $vehiculo = Vehiculo::findOrFail($id);

        return response()->json($vehiculo);
    }

    public function store(Request $request)
    {
        $datos = $request->validate([
            'numero_vin' => 'required|string|size:17|unique:vehiculos,numero_vin',
            'placa' => 'required|string|max:20|unique:vehiculos,placa',
            'marca' => 'required|string|max:255',
            'modelo' => 'required|string|max:255',
            'anio' => 'required|integer|digits:4|min:1900|max:' . date('Y'),
            'kilometraje_actual' => 'required|integer|min:0',
        ]);

        $vehiculo = Vehiculo::create($datos);

        return response()->json($vehiculo, 201);
    }

    public function destroy($id)
    {
        $vehiculo = Vehiculo::findOrFail($id);

        if ($vehiculo->serviciosMantenimiento()->exists()) {
            return response()->json([
                'mensaje' => 'No se puede eliminar el vehículo porque tiene servicios de mantenimiento asociados.'
            ], 409);
        }

        $vehiculo->delete();

        return response()->json([
            'mensaje' => 'Vehículo eliminado correctamente.'
        ]);
    }
}
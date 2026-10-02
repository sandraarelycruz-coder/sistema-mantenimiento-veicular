<?php

namespace App\Http\Controllers;

use App\Models\Taller;
use Illuminate\Http\Request;

class TallerController extends Controller
{
    public function index()
    {
        return response()->json(Taller::all());
    }

    public function show($id)
    {
        $taller = Taller::findOrFail($id);

        return response()->json($taller);
    }

    public function store(Request $request)
    {
        $datos = $request->validate([
            'nombre' => 'required|string|max:255',
            'telefono' => 'required|string|max:50',
            'direccion' => 'nullable|string',
            'esta_activo' => 'sometimes|boolean',
        ]);

        $taller = Taller::create($datos);

        return response()->json($taller, 201);
    }

    public function destroy($id)
    {
        $taller = Taller::findOrFail($id);

        if ($taller->serviciosMantenimiento()->exists()) {
            return response()->json([
                'mensaje' => 'No se puede eliminar el taller porque tiene servicios de mantenimiento asociados.'
            ], 409);
        }

        $taller->delete();

        return response()->json([
            'mensaje' => 'Taller eliminado correctamente.'
        ]);
    }
}
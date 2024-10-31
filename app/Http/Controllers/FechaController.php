<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class FechaController extends Controller
{
    public function almacenar(Request $request)
    {
        // Validación
        $validator = Validator::make($request->all(), [
            'fecha_inicio' => 'required|date',
            'fecha_fin' => 'required|date|after_or_equal:fecha_inicio',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        // Si la validación pasa, puedes continuar con tu lógica
        // Por ejemplo, guardar las fechas en la base de datos

        return response()->json(['message' => 'Fechas válidas y almacenadas correctamente.']);
    }
}


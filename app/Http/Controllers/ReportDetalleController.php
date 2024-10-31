<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\pdf;
use App\Models\detalle_prestamo;

class ReportDetalleController extends Controller
{
    //

    public function report2()
{
 // Extraer todos los productos
 $data = detalle_prestamo::select(
            'prestamo_id' ,
            'libro_id',
            'cantidad',
            'estado_libro'
 )->get();
 $pdf = Pdf::loadView('/reports/report2', compact('data'));
 return $pdf->stream('detalleprestamos.pdf'); }

 public function Rango(Request $request)
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



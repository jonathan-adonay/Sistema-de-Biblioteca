<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\pdf;
use App\Models\recordatorio;

class ReportRecordatorioController extends Controller
{
    //

    public function report7()
{
 // Extraer todos los productos
 $data = recordatorio::select(
            'usuario_id',
            'libro_id',
            'mensaje',
            'fecha_recordatorio'
 )->get();
 $pdf = Pdf::loadView('/reports/report7', compact('data'));
 return $pdf->stream('recordatorios.pdf'); }

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

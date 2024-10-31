<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\pdf;
use App\Models\prestamo;

class ReportPrestamoController extends Controller
{
    //

    public function report6()
{
 // Extraer todos los productos
 $data = prestamo::select(
    'libro_id',
    'usuario_id',
    'fecha_prestamo',
    'fecha_devolucion',
    'estado'
 )->get();
 $pdf = Pdf::loadView('/reports/report6', compact('data'));
 return $pdf->stream('prestamos.pdf'); }

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

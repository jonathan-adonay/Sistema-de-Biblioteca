<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\pdf;
use App\Models\usuario;

class ReportUsuariosController extends Controller
{
    //

    public function report8()
{
 // Extraer todos los productos
 $data = usuario::select(
           'nombre',
            'email'
 )->get();
 $pdf = Pdf::loadView('/reports/report8', compact('data'));
 return $pdf->stream('usuarios.pdf'); }

 public function  Rango (Request $request)
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

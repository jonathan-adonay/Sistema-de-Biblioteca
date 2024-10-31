<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\pdf;
use App\Models\editorial;

class ReportEditorialController extends Controller
{
    //

    public function report4()
{
 // Extraer todos los productos
 $data = editorial::select(
            'nombre',
            'direccion',
            'telefono',
            'email',
            'pagina_web',
            'descripcion'
 )->get();
 $pdf = Pdf::loadView('/reports/report4', compact('data'));
 return $pdf->stream('editoriales.pdf'); }

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

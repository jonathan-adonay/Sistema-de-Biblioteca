<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\pdf;
use App\Models\Autor;

class ReportAutorController extends Controller
{
    //

    public function report1()
{
 // Extraer todos los productos
 $data = Autor::select(
    'nombre',
    'apellido',
    'biografia',
    'fecha_nacimiento',
    'nacionalidad',
    'telefono',
    'website',
    'foto',
    'genero'
 )->get();
 $pdf = Pdf::loadView('/reports/report1', compact('data'));
 return $pdf->stream('autor.pdf'); }



 public function Rango(Request $request)
 {
     // Validación
     $request->validate([
         'fecha_inicial' => 'required|date',
         'fecha_final' => 'required|date|after_or_equal:fecha_inicial',
     ], ['fecha_final.after_or_equal' => "La fecha final debe ser válida."]);
 
     $fechainicial = date('Y-m-d', strtotime($request->fecha_inicial));
     $fechafinal = date('Y-m-d', strtotime($request->fecha_final));
 
     $data = Autor::select(
         "autores.nombre",
         "autores.apellido",
         "autores.biografia",
         "autores.fecha_nacimiento",
         "autores.nacionalidad",
         "autores.telefono",
         "autores.website",
         "autores.foto",
         "autores.genero"
     )
     ->whereDate('autores.created_at', '>=', $fechainicial)
     ->whereDate('autores.created_at', '<=', $fechafinal)
     ->get();
 
     $pdf = Pdf::loadView('autores.reportefecha', compact('data'));
     return $pdf->download('reporte_autores.pdf');
 }
 
}

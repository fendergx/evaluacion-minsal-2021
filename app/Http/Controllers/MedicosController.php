<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Establecimiento;
use App\Receta;
use App\Paciente;
use App\Medico;

class MedicosController extends Controller
{
 public function index()
 {
    $medicos = Medico::all();
    return view('medico.index', ['medicos' => $medicos]);
 }

 public function seleccionar()
 {
    $medicos = Medico::all();
    return view('medico.seleccion', ['medicos' => $medicos]);
 }


 public function render_recetas($id)
 {
    $recetas= Receta::where('id_medico', '=', $id)->get();
    return view('medico.render', ['recetas' => $recetas]);
 }
}

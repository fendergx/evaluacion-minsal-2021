<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Medicamento;

class MedicamentoController extends Controller
{
    public function index()
    {
        $medicamentos = Medicamento::all();
        return view('medicamento.index', ['medicamentos' => $medicamentos]);
    }

}

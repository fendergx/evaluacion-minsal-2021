<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Validator;
use Response;

use App\Establecimiento;
use App\Receta;
use App\Paciente;
use App\Medico;

class EstableController extends Controller
{


    //reglas para validar los campos 
    protected $rules =['nombre' => 'required|min:1|regex:/^[a-zA-ZñÑáéíóúÁÉÍÓÚüÜ .,# ]+$/i'];



    public function index()
    {
        $establecimientos = Establecimiento::all();
        return view('establecimiento.index', ['establecimientos' => $establecimientos]);
    }

    public function seleccionar()
    {
        $establecimientos = Establecimiento::all();
        return view('establecimiento.seleccion', ['establecimientos' => $establecimientos]);
    }

    public function render_recetas($id)
    {
        $recetas= Receta::where('id_est', '=', $id)->get();
        return view('establecimiento.render', ['recetas' => $recetas]);
    }


    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), $this->rules);
        if ($validator->fails()) {
            Return Response::json(array('errors' => $validator->getMessageBag()->toArray()));
        } else {
            $establecimiento = new Establecimiento();
            $establecimiento->nombre = $request->nombre;
            $establecimiento->save();
            return response()->json($establecimiento);
        }
    }


    public function update(Request $request, $id)
    {
       $validator = Validator::make($request->all(), $this->rules);
       if ($validator->fails()) {
        Return Response::json(array('errors' => $validator->getMessageBag()->toArray()));
    } else {
        $establecimiento = Establecimiento::findOrFail($id);
        $establecimiento->nombre = $request->nombre;
        $establecimiento->save();
        return response()->json($establecimiento);
    }
}


public function destroy($id)
{
    $establecimientos = Establecimiento::findOrFail($id);
    $establecimientos->delete();
    return response()->json($establecimientos);
}
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Paciente;
use App\Medico;
use App\Establecimiento;

class Receta extends Model
{
    //nombre de la tabla
    protected $table='recetas';

    protected $primaryKey='id';

    //atributos de la tabla
    protected $fillable = ['numero','id_est','id_medico','id_paciente'];

    public $timestamps = true;

    //funciones de relación con otras tablas
    public function establecimiento(){
        return $this->belongsTo(Establecimiento::class, 'id_est','id');
    }
    public function medico(){
        return $this->belongsTo(Medico::class, 'id_medico','id');
    }
    public function paciente(){
        return $this->belongsTo(Paciente::class, 'id_paciente','id');
    }
}

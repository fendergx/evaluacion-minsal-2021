<?php

namespace App;

use App\Establecimiento;

use Illuminate\Database\Eloquent\Model;

class Medico extends Model
{
    //nombre de la tabla
    protected $table='medicos';
    protected $primaryKey='id';

    //atributos de la tabla
    protected $fillable = ['nombres','apellidos','id_est'];

    public $timestamps = true;

    //funciones de relación con otras tablas
    public function establecimiento(){
        return $this->belongsTo(Establecimiento::class, 'id_est','id');
    }
}

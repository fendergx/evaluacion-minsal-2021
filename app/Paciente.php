<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Paciente extends Model
{
    //nombre de la tabla
    protected $table='pacientes';

    protected $primaryKey='id';

    //atributos de la tabla
    protected $fillable = ['nombres','apellidos','fecha_nacimiento'];

    public $timestamps = true;
}

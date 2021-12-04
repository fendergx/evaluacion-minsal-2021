<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Medicamento extends Model
{
    //nombre de la tabla
    protected $table='medicamentos';

    protected $primaryKey='id';

    //atributos de la tabla
    protected $fillable = ['nombre_medicamento'];

    public $timestamps = true;
}

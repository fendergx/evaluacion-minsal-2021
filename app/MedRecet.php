<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Medicamento;
use App\Receta;

class MedRecet extends Model
{
    //nombre de la tabla
    protected $table='med_recets';

    protected $primaryKey='id';

    //atributos de la tabla
    protected $fillable = ['cantidad','dosis','indicaciones','id_receta','id_medicamento'];

    public $timestamps = true;

    //funciones de relación con otras tablas
    public function receta(){
        return $this->belongsTo(Receta::class, 'id','id_receta');
    }
    public function medicamento(){
        return $this->belongsTo(Medicamento::class, 'id','id_medicamento');
    }
}

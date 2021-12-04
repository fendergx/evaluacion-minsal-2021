<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Establecimiento extends Model
{
    //nombre de la tabla
    protected $table='establecimientos';

    protected $primaryKey='id';

    //atributos de la tabla
    protected $fillable = ['nombre'];

    //definición si existen timestamp en la tabla (created_at updated_at)
    public $timestamps = true;

}

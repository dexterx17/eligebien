<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Servicio extends Model
{
    protected $table = "servicios";

    protected $fillable = [
    	'servicio','descripcion','icono'
    ];

    public function parametros(){
    	return $this->hasMany('App\Parametro');
    }
}

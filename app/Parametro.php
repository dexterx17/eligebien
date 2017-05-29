<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Parametro extends Model
{
    protected $table = "parametros";

    protected $fillable = [
    	'parametro','unidad','servicio_id','descripcion'
    ];

    public function servicio(){
    	return $this->belongsTo('App\Servicio');
    }

    public function banco(){
    	return $this->belongsToMany('App\Banco');
    }
}

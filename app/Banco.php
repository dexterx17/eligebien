<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Banco extends Model
{
    protected $table = "bancos";

    protected $fillable = [ 'nombre','logo','web','telefonos','puntuacion'];

    public function parametro(){
    	return $this->belongsToMany('App\Parametro');
    }
}

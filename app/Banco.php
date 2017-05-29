<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Servicio;

class Banco extends Model
{
    protected $table = "bancos";

    protected $fillable = [ 'nombre','logo','web','telefonos','puntuacion','slug'];

    public function parametros(){
    	return $this->belongsToMany('App\Parametro');
    }

    public function scopeServicios($query){
    	$banco_id = $this->id;
    	return Servicio::whereIn('id',function($q) use ($banco_id){
    		$q->select('servicio_id');
    		$q->from('parametros');
    		$q->whereIn('id',function($sq) use ($banco_id){
	    		$sq->select('parametro_id');
	    		$sq->from('banco_parametro');
	    		$sq->where('banco_id',$banco_id);
    		});
    	});
    }
}

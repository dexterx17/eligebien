<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Parametro;

class Servicio extends Model
{
    protected $table = "servicios";

    protected $fillable = [
    	'servicio','descripcion','icono','slug'
    ];

    public function parametros(){
    	return $this->hasMany('App\Parametro');
    }

    public function scopeParametrosByBanco($query,$banco_id){
    	return \DB::table('parametros')->select('parametros.*','valor')
                ->where('parametros.servicio_id',$this->id)
                ->where('banco_parametro.banco_id',$banco_id)
    			->join('banco_parametro','parametros.id','=','banco_parametro.parametro_id');
    }

    public function scopeBancos($query){
        $servicio_id = $this->id;
        return Banco::whereIn('id',function($q) use ($servicio_id){
            $q->select('banco_id');
            $q->from('banco_parametro');
            $q->whereIn('parametro_id',function($sq) use ($servicio_id){
                $sq->select('id');
                $sq->from('parametros');
                $sq->where('servicio_id',$servicio_id);
            });
        });
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Banco;
use App\Servicio;
use App\Parametro;

class Valores extends Controller
{
    var $datos;

    /**
     * Constructor del controlador Front
     * aqui colocamos lo que vayamos a utilizar en todas las vistas que utiliza este controlador
     */
    public function __construct()
    {
        //setea la variable $page para agregar la clase active en el menu principal
    	$this->datos['active'] = "bancos";
    }

    public function admin($banco_id){
        $banco = Banco::find($banco_id);    	
    	
    	$this->datos['banco'] = $banco;
    	return view('valores.admin',$this->datos);
    }

    /**
     * Muestra el formulario para crear un elemento
     */
    public function create($banco_id){
        $this->datos['servicios'] = Servicio::orderBy('servicio','ASC')->get();
    	$banco = Banco::find($banco_id);
        $this->datos['banco'] = $banco;

        $servicios_asignados =  $banco->servicios()->get();
        $servicios = [];
        foreach ($servicios_asignados as $key => $value) {
            $servicios[]=$value['id'];
        }
        $this->datos['servicios_asignados'] = $servicios;
        return view('valores.create',$this->datos);
    }

    /**
     * Toma los datos del formulario de insercion para enviarlos a la base de datos
     */
    public function store(Request $request){
        $posts = $request->all();

        $banco = Banco::find($request->banco_id);
        $servicio = Servicio::find($request->servicio_id);
        
        $params = []; 
        foreach ($servicio->parametros as $key => $p) {
            $params[$p->id] = [
                'valor' => $posts['param'.$p->id]
            ];
        }
        $banco->parametros()->syncWithoutDetaching($params);
        
        //flash("$parametro->titulo actualizado correctamente",'success');
        return redirect()->route('admin.valores',$banco->id);
    }

    /**
     * Muestra el formulario para editar un elemento
     */
    public function edit($banco_id,$servicio_id){
        $servicio = Servicio::find($servicio_id);
        $this->datos['servicio'] = $servicio;
        $banco = Banco::find($banco_id);
        $this->datos['banco'] = $banco;
        $servicios_asignados =  $banco->servicios()->get();
        $servicios = [];
        foreach ($servicios_asignados as $key => $value) {
            $servicios[]=$value['id'];
        }
        $this->datos['servicios_asignados'] = $servicios;
        return view('valores.edit',$this->datos);
    }

    /**
     * Toma los datos del formulario de actualizacion para enviarlos a la base de datos
     */
    public function update(Request $request, $id){
         $posts = $request->all();

        $banco = Banco::find($request->banco_id);
        $servicio = Servicio::find($request->servicio_id);
        
        $params = []; 
        foreach ($servicio->parametros as $key => $p) {
            $params[$p->id] = [
                'valor' => $posts['param'.$p->id]
            ];
        }
        $banco->parametros()->syncWithoutDetaching($params);
        //flash("$parametro->titulo actualizado correctamente",'success');
        return redirect()->route('admin.valores',$banco->id);
    }

    /**
     * Elimina un elemento de la base de datos
     */
    public function destroy($banco_id,$servicio_id){
        $banco = Banco::find($banco_id);
        $servicio = Servicio::find($servicio_id);
        foreach ($servicio->parametrosByBanco($banco_id)->get() as $key => $value) {
            $banco->parametros()->detach($value->id);
        }

        //flash("Generalidad $parametro->titulo eliminada correctamente",'success');
        return redirect()->route('admin.valores',$banco->id);
    }
}

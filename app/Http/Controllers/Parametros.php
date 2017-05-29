<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Servicio;
use App\Parametro;

class Parametros extends Controller
{
    var $datos;

    /**
     * Constructor del controlador Front
     * aqui colocamos lo que vayamos a utilizar en todas las vistas que utiliza este controlador
     */
    public function __construct()
    {
        //setea la variable $page para agregar la clase active en el menu principal
    	$this->datos['active'] = "servicios";
    }

    public function admin($servicio_id){

    	$servicio = Servicio::find($servicio_id);
    	$servicio->parametros;
    	$this->datos['servicio'] = $servicio;
    	return view('parametros.admin',$this->datos);
    }

    /**
     * Muestra el formulario para crear un elemento
     */
    public function create($servicio_id){
    	$this->datos['servicio'] = Servicio::find($servicio_id);
        return view('parametros.create',$this->datos);
    }

    /**
     * Toma los datos del formulario de insercion para enviarlos a la base de datos
     */
    public function store(Request $request){
        $parametro = new Parametro($request->all());

        $parametro->save();
        //flash("$parametro->titulo actualizado correctamente",'success');
        return redirect()->route('admin.parametros',$parametro->servicio_id);
    }

    /**
     * Muestra el formulario para editar un elemento
     */
    public function edit($id){
        $parametro = Parametro::find($id);
        $this->datos['parametro'] = $parametro;
        $this->datos['servicio'] = Servicio::find($parametro->servicio_id);
        return view('parametros.edit',$this->datos);
    }

    /**
     * Toma los datos del formulario de actualizacion para enviarlos a la base de datos
     */
    public function update(Request $request, $id){
        $parametro = Parametro::find($id);
        $parametro->fill($request->all());
        $parametro->save();
        //flash("$parametro->titulo actualizado correctamente",'success');
        return redirect()->route('admin.parametros',$parametro->servicio_id);
    }

    /**
     * Elimina un elemento de la base de datos
     */
    public function destroy($id){
        $parametro = Servicio::find($id);
        $parametro->delete();
        //flash("Generalidad $parametro->titulo eliminada correctamente",'success');
        return redirect()->route('admin.parametros',$parametro->servicio_id);
    }

    public function lista($servicio_id){
        $servicio = Servicio::find($servicio_id);
        return response()->json($servicio->parametros);
    }
}

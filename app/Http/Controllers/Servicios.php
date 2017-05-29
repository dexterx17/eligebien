<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Servicio;

class Servicios extends Controller
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

    public function admin(){

    	$this->datos['servicios'] = Servicio::orderBy('servicio','ASC')->get();
    	return view('servicios.admin',$this->datos);
    }

    /**
     * Muestra el formulario para crear un elemento
     */
    public function create(){
        return view('servicios.create',$this->datos);
    }

    /**
     * Toma los datos del formulario de insercion para enviarlos a la base de datos
     */
    public function store(Request $request){
        $servicio = new Servicio($request->all());
        $servicio->slug = str_slug($request->servicio);
        $servicio->save();
        //flash("$servicio->titulo actualizado correctamente",'success');
        return redirect()->route('admin.servicios');
    }

    /**
     * Muestra el formulario para editar un elemento
     */
    public function edit($id){
        $this->datos['servicio'] = Servicio::find($id);
        return view('servicios.edit',$this->datos);
    }

    /**
     * Toma los datos del formulario de actualizacion para enviarlos a la base de datos
     */
    public function update(Request $request, $id){
        $servicio = Servicio::find($id);
        $servicio->fill($request->all());
        $servicio->slug = str_slug($request->servicio);
        $servicio->save();
        //flash("$servicio->titulo actualizado correctamente",'success');
        return redirect()->route('admin.servicios');
    }

    /**
     * Elimina un elemento de la base de datos
     */
    public function destroy($id){
        $servicio = Servicio::find($id);
        $servicio->delete();
        //flash("Generalidad $servicio->titulo eliminada correctamente",'success');
        return redirect()->route('admin.servicios');
    }
}

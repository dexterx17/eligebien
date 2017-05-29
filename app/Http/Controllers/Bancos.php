<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Banco;


class Bancos extends Controller
{
	var $datos=[];

	/**
     * Constructor del controlador Front
     * aqui colocamos lo que vayamos a utilizar en todas las vistas que utiliza este controlador
     */
    public function __construct()
    {
        //setea la variable $page para agregar la clase active en el menu principal
    	$this->datos['active'] = "bancos";
    }

    public function admin(){
    	$this->datos['bancos'] = Banco::orderBy('nombre','ASC')->get();
    	return view('bancos.admin',$this->datos);
    }


    /**
     * Muestra el formulario para crear un elemento
     */
    public function create(){
        return view('bancos.create',$this->datos);
    }

    /**
     * Toma los datos del formulario de insercion para enviarlos a la base de datos
     */
    public function store(Request $request){
        $banco = new Banco($request->all());

        $banco->save();
        //flash("$banco->titulo actualizado correctamente",'success');
        return redirect()->route('admin.bancos');
    }

    /**
     * Muestra el formulario para editar un elemento
     */
    public function edit($id){
        $this->datos['banco'] = Banco::find($id);
        return view('bancos.edit',$this->datos);
    }

    /**
     * Toma los datos del formulario de actualizacion para enviarlos a la base de datos
     */
    public function update(Request $request, $id){
        $banco = Banco::find($id);
        $banco->fill($request->all());
        $banco->save();
        //flash("$banco->titulo actualizado correctamente",'success');
        return redirect()->route('admin.bancos');
    }

    /**
     * Elimina un elemento de la base de datos
     */
    public function destroy($id){
        $banco = Banco::find($id);
        $banco->delete();
        //flash("Generalidad $banco->titulo eliminada correctamente",'success');
        return redirect()->route('admin.bancos');
    }
}

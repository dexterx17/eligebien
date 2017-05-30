<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Servicio;

class HomeController extends Controller
{
    
    var $datos;
        /**
     * Constructor del controlador Front
     * aqui colocamos lo que vayamos a utilizar en todas las vistas que utiliza este controlador
     */
    public function __construct()
    {
        //setea la variable $page para agregar la clase active en el menu principal
        $this->datos['active'] = "dashboard";
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $servicios = Servicio::all();
        $grupos = $servicios->groupBy('categoria');
        $this->datos['servicios'] = $grupos;

        return view('welcome',$this->datos);
    }


    public function servicio($servicio_slug){
        $servicio = Servicio::where('slug',$servicio_slug)->first();

        $this->datos['servicio'] = $servicio;

        return view('servicio',$this->datos);
    }

    public function admin(){
        return view('admin',$this->datos);
    }

    public function perfil(){}
}

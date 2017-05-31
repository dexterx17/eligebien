<?php

use Illuminate\Database\Seeder;

use App\Banco;
use App\Parametro;
use App\Servicio;

class BolivarianoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $params = [];

        $banco = Banco::where('nombre','Banco Bolivariano')->first();

        $banco->puntuacion = "AAA-";
        $banco->logo = "img/bancos/logo_bolivariano.png";

        $banco->save();

        $servicio = Servicio::where('servicio','Cuentas de ahorro')->first();

        $monto_minimo = Parametro::where('parametro','Monto mínimo')->where('servicio_id',$servicio->id)->first();
        $monto_minimo_juridicas = Parametro::where('parametro','Monto mínimo personas jurídicas')->where('servicio_id',$servicio->id)->first();
        $beneficios = Parametro::where('parametro','Beneficios')->where('servicio_id',$servicio->id)->first();
        $requisitos = Parametro::where('parametro','Requisitos')->where('servicio_id',$servicio->id)->first();
        $requisitos_juridicas = Parametro::where('parametro','Requisitos personas jurídicas')->where('servicio_id',$servicio->id)->first();

        $params[ $monto_minimo->id] = ['valor' => '200'];
		$params[ $beneficios->id] = ['valor' => 'Comodidad: Acceso a todos los Multicanales BB, para que puedas realizar transacciones desde el lugar donde te encuentres; Seguridad: Tecnología de punta para manejo de autenticación de clientes a través de claves únicas; Rentabilidad: Capitalización diaria de intereses y crédito de interés mensual; Disponibilidad: Con tu tarjeta Visa Débito tienes acceso a más de 3.000 cajeros automáticos del Banco Bolivariano y BANRED, así cuentas inmediatamente con tu dinero. Además puedes realizar compras en todos los establecimientos afiliados a la Red Visa Débito a nivel nacional y activar el uso internacional para retiro de efectivo'];
    	$params[ $requisitos->id] = ['valor' => 'Original y Copia a colores de la Cédula de identidad; Certificado de votación actualizado; 1 Referencia Bancaria o 1 Referencia Comercial; Última o penúltima planilla de agua, luz o teléfono (no es necesario que se encuentre cancelada)'];

        $banco->parametros()->syncWithoutDetaching($params);

    }
}

<?php

use Illuminate\Database\Seeder;

use App\Banco;
use App\Parametro;
use App\Servicio;

class BancoAmazonas extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $params = [];

        $banco = Banco::where('nombre','Banco Amazonas')->first();

        $banco->puntuacion = "AA+";

        $banco->save();

        $servicio = Servicio::where('servicio','Cuentas de ahorro')->first();

        $monto_minimo = Parametro::where('parametro','Monto mínimo')->where('servicio_id',$servicio->id)->first();
        $beneficios = Parametro::where('parametro','Beneficios')->where('servicio_id',$servicio->id)->first();
        $requisitos = Parametro::where('parametro','Requisitos')->where('servicio_id',$servicio->id)->first();

    	$params[ $monto_minimo->id] = ['valor' => '100'];
    	$params[ $beneficios->id] = ['valor' => 'Tarjeta BanInter para usarla en todos los cajeros a nivel nacional
			Más de 60 oficinas de Servipagos a nivel nacional para realizar sus transacciones
			Servicio am.pm Aló para realizar sus consultas y transacciones sin costo
			Retiros y depósitos en cualquier ventanilla de la red Servipagos a nivel nacional'];
		$params[ $requisitos->id] = ['valor' => 'Solicitud de apertura de Cuenta
			Depósito Inicial US$ 100.00
			Copia de cédula ó pasaporte si es extranjero
			Copia certifioado de votación
			Tercer documento de identificación: Licencia de conducir, pasaporte o carnet
			Formulario de Declaración de Licitud de Fondos
			Certificado de trabajo e ingresos, copia del rol de pagos o justificación de ingresos
			Copia de la última planilla cancelada de luz, agua o teléfono'];

        $banco->parametros()->syncWithoutDetaching($params);

  		$servicio = Servicio::where('servicio','Cuentas corrientes')->first();

        $monto_minimo = Parametro::where('parametro','Monto mínimo')->where('servicio_id',$servicio->id)->first();
        $beneficios = Parametro::where('parametro','Beneficios')->where('servicio_id',$servicio->id)->first();
        $requisitos = Parametro::where('parametro','Requisitos')->where('servicio_id',$servicio->id)->first();

    	$params[ $monto_minimo->id] = ['valor' => '200'];
    	$params[ $beneficios->id] = ['valor' => 'Red de Servipagos
			Servicio de información telefónica personalizado
			Servicio am.pm Aló para sus consultas o transacciones teléfonicas sin costo
			Ingrese a nuestra página web www.bancoamazonas.com y utilice nuestros servicios
			Tarjeta Baninter para usarla en todos los cajeros a nivel nacional
			Cobros de cheques en cualquier ventanilla de la red Servipagos a nivel nacional'];
		$params[ $requisitos->id] = ['valor' => 'Tener como mínimo una referencia bancaria en otro Banco, con mínimo 1 año de antigüedad
			2 referencias comerciales o tarjetas de crédito
			Depósito inicial de US$ 200.00
			Copia de cédula de identidad actualizada
			Copia certificado de votación actualizado
			Tercer documento de identificación: licencia de conducir, pasaporte o carnet
			Certificado de trabajo e ingresos, copia del rol de pagos o justificación de ingresos
			Copia del último pago de planilla de agua, luz o teléfono'];

        $banco->parametros()->syncWithoutDetaching($params);

    }
}

<?php

use Illuminate\Database\Seeder;

use App\Servicio;

class ServiciosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$servicios = [
    		'prestamos estudiantiles',
    		'prestamos hipotecarios',
    		'prestamos personales',
    		'tarjetas de credito',
    		'tarjetas de debito',
            'depositos plazo fijo'
    	];

        $cuentas_ahorro = factory(App\Servicio::class)->create([
	        'servicio' =>  'cuentas de ahorro'
	    ]);   

        $beneficios = factory(App\Parametro::class)->create([
            'parametro' => 'Beneficios',
            'unidad' => 'texto',
            'servicio_id' =>$cuentas_ahorro->id
        ]);

        $beneficios = factory(App\Parametro::class)->create([
            'parametro' => 'Monto minimo',
            'unidad' => 'texto',
            'servicio_id' =>$cuentas_ahorro->id,
            'descripcion' => 'Monto mínimo para apertura de cuenta'
        ]);

        $cuentas_corrientes= factory(App\Servicio::class)->create([
            'servicio' =>  'cuentas corrientes'
        ]);  

        $beneficios = factory(App\Parametro::class)->create([
            'parametro' => 'Beneficios',
            'unidad' => 'texto',
            'servicio_id' =>$cuentas_corrientes->id
        ]);

        $beneficios = factory(App\Parametro::class)->create([
            'parametro' => 'Monto minimo',
            'unidad' => 'texto',
            'servicio_id' =>$cuentas_corrientes->id,
            'descripcion' => 'Monto mínimo para apertura de cuenta'
        ]);

        for ($i=0; $i < count($servicios); $i++) { 
            $ser = factory(App\Servicio::class)->create([
                'servicio' => $servicios[$i]
            ]); 

            factory(App\Parametro::class)->create([
                'parametro' => 'Interés mensual',
                'unidad' => 'porcentaje',
                'servicio_id' =>$ser->id,
                'descripcion' => 'Interés mensual sobre el capital'
            ]);

            factory(App\Parametro::class)->create([
                'parametro' => 'Garante',
                'unidad' => 'si/no',
                'servicio_id' =>$ser->id,
                'descripcion' => 'Se requiere de garante'
            ]);

            factory(App\Parametro::class)->create([
                'parametro' => 'Plazo',
                'unidad' => ' meses',
                'servicio_id' =>$ser->id,
                'descripcion' => 'Plazo en meses'
            ]);
        }

	    
    }
}

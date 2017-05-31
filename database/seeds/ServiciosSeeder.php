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

        /***************** CUENTAS ***************/
        $cuentas = [
            'Cuentas de ahorro',
            'Cuentas corrientes'
        ];

        for ($i=0; $i < count($cuentas); $i++) { 
            $cuenta = factory(App\Servicio::class)->create([
    	        'servicio' => $cuentas[$i],
                'categoria' => 'cuentas',
                'icono' => 'now-ui-icons business_pig'
    	    ]);   

            $beneficios = factory(App\Parametro::class)->create([
                'parametro' => 'Monto mínimo',
                'unidad' => 'numero',
                'servicio_id' =>$cuenta->id,
                'descripcion' => 'Monto mínimo para apertura de cuenta'
            ]); 

            
            $beneficios = factory(App\Parametro::class)->create([
                'parametro' => 'Beneficios',
                'unidad' => 'texto',
                'servicio_id' =>$cuenta->id
            ]);


            $beneficios = factory(App\Parametro::class)->create([
                'parametro' => 'Requisitos',
                'unidad' => 'texto',
                'servicio_id' =>$cuenta->id,
                'descripcion' => 'Requisitos para apertura de cuentas'
            ]);

            $beneficios = factory(App\Parametro::class)->create([
                'parametro' => 'Requisitos personas jurídicas',
                'unidad' => 'texto',
                'servicio_id' =>$cuenta->id,
                'descripcion' => 'Requisitos para apertura de cuentas para personas jurídicas'
            ]);
        }


        /***************** DPF ***************/
        $dpf = factory(App\Servicio::class)->create([
            'servicio' =>  'Depositos a plazo fijo',
            'categoria' => 'dpf',
            'icono' => 'now-ui-icons business_chart-pie-36'
        ]);   

        $beneficios = factory(App\Parametro::class)->create([
            'parametro' => 'Monto mínimo',
            'unidad' => 'numero',
            'servicio_id' =>$dpf->id,
            'descripcion' => 'Monto mínimo para apertura de cuenta'
        ]);

        /***************** PRESTAMOS ***************/
        $prestamos = [
            'Préstamos estudiantiles',
            'Préstamos hipotecarios',
            'Préstamos personales'
        ];
        for ($i=0; $i < count($prestamos); $i++) { 
            $ser = factory(App\Servicio::class)->create([
                'servicio' => $prestamos[$i],
                'categoria' => 'prestamos',
                'icono' => 'now-ui-icons business_money-coins'
            ]); 

            factory(App\Parametro::class)->create([
                'parametro' => 'Interés mensual',
                'unidad' => 'numero',
                'servicio_id' =>$ser->id,
                'descripcion' => 'Interés mensual sobre el capital'
            ]);

            factory(App\Parametro::class)->create([
                'parametro' => 'Garante',
                'unidad' => 'booleano',
                'servicio_id' =>$ser->id,
                'descripcion' => 'Se requiere de garante'
            ]);

            factory(App\Parametro::class)->create([
                'parametro' => 'Plazo',
                'unidad' => 'numero',
                'servicio_id' =>$ser->id,
                'descripcion' => 'Plazo en meses'
            ]);
        }  

        /***************** TARJETAS ***************/
        $tarjetas = [
            'Tarjetas de credito',
            'Tarjetas de debito'
        ];
        for ($i=0; $i < count($tarjetas); $i++) { 
            $ser = factory(App\Servicio::class)->create([
                'servicio' => $tarjetas[$i],
                'categoria' => 'tarjetas',
                'icono' => 'now-ui-icons shopping_credit-card'
            ]); 

            factory(App\Parametro::class)->create([
                'parametro' => 'Interés mensual',
                'unidad' => 'numero',
                'servicio_id' =>$ser->id,
                'descripcion' => 'Interés mensual sobre el capital'
            ]);

            factory(App\Parametro::class)->create([
                'parametro' => 'Cupo máximo',
                'unidad' => 'numero',
                'servicio_id' =>$ser->id,
                'descripcion' => 'Cupo máximo de la tarjeta'
            ]);

            factory(App\Parametro::class)->create([
                'parametro' => 'Plazo',
                'unidad' => 'numero',
                'servicio_id' =>$ser->id,
                'descripcion' => 'Plazo en meses'
            ]);
        }
	    
    }
}

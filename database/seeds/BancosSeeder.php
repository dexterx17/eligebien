<?php

use Illuminate\Database\Seeder;

class BancosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$bancos = [
			"Banco Solidario",
			"Banco Produbanco",
			"Banco Pichincha",
			"Banco Internacional",
			"Banco Amazonas",
			"Banco Procredit",
			"Banco de Guayaquil",
			"Banco General Rumiñahui",
			"Banco del Pacífico",
			"Banco de Loja",
			"Banco del Austro",
			"Banco Bolivariano",
			"Banco de Machala",
			"Banco Del Bank",
			"Banco Capital",
			"Banco Comercial de Manabí",
			"Banco Coopnacional",
			"Banco D-Miro",
			"Banco Finca",
			"Banco Litoral",
			"Bancodesarrollo"
    	];
    	$urls = [
    		"http://www.banco-solidario.com/",
			"http://www.produbanco.com",
			"http://www.pichincha.com",
			"http://www.bancointernacional.com.ec",
			"http://www.bancoamazonas.com/",
			"http://www.bancoprocredit.com.ec",
			"http://www.bancoguayaquil.com",
			"http://www.bgr.com.ec/",
			"http://www.bancodelpacifico.com/",
			"http://www.bancodeloja.fin.ec/",
			"http://www.bancodelaustro.com/",
			"http://www.bolivariano.fin.ec/",
			"http://www.bancomachala.com/home.aspx",
			"http://www.delbank.fin.ec/",
			"http://www.bancocapital.com",
			"http://www.bcmanabi.com/",
			"http://www.coopnacional.com/",
			"http://www.d-miro.org/",
			"http://www.bancofinca.com/",
			"http://www.bancodellitoral.com/",
			"http://www.bancodesarrollo.fin.ec/"
    	];

    	for ($i=0; $i < count($bancos); $i++) { 
	        factory(App\Banco::class,1)->create([
	        	'nombre' => $bancos[$i],
	        	'web' => $urls[$i]
	        ]);
    	}

    }
}

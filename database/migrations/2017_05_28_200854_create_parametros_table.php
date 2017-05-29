<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateParametrosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('parametros', function (Blueprint $table) {
            $table->increments('id');
            $table->string('parametro');
            $table->string('unidad')->nullable();
            $table->text('descripcion')->nullable();
            $table->integer('servicio_id')-> unsigned();
            $table->foreign('servicio_id')->references('id')->on('servicios')->onDelete('cascade');
            $table->timestamps();
        });

        Schema::create('banco_parametro', function (Blueprint $table) {
            $table->increments('id');
            $table->string('valor');
            $table->integer('parametro_id')->unsigned();
            $table->foreign('parametro_id')->references('id')->on('parametros')->onDelete('cascade');
            $table->integer('banco_id')->unsigned();
            $table->foreign('banco_id')->references('id')->on('bancos')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('banco_parametro');
        Schema::dropIfExists('parametros');
    }
}

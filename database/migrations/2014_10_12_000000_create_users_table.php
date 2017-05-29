<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre');
            $table->string('apellido');
            $table->enum('type',['admin','user'])->default('user');
            $table->string('cedula')->nullable();
            $table->string('estado_civil')->nullable();
            $table->integer('hijos')->nullable()->default(0);
            $table->string('celular')->nullable();
            $table->string('telefono')->nullable();
            $table->string('educacion')->nullable();
            $table->string('tiempo_trabajo')->nullable();
            $table->integer('ingresos_mensuales')->nullable()->default(0);
            $table->string('lugar_trabajo')->nullable();
            $table->string('telefono_trabajo')->nullable();
            $table->string('email')->unique();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}

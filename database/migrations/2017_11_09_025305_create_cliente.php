<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCliente extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cliente', function (Blueprint $table) {
            $table->increments('id');
            $table->string('cedula');
            $table->string('name');
            $table->string('apellido');
            $table->string('sex');
            $table->date('fecha_nac')->default(date('Y-m-d'));
            $table->string('edo_civil');

            $table->string('email');
            $table->text('direccion');
            $table->string('telefono_movil');
            $table->string('telefono_ofic');
            $table->string('telefono_otro');
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
        Schema::drop('cliente');
    }
}

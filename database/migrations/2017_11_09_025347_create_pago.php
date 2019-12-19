<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePago extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pago', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('evento_id')->unsigned();
            $table->foreign('evento_id')->references('id')->on('evento')->onDelete('cascade')->onUpdate('cascade');
            $table->text('descripcion');
            $table->datetime('fecha_pago');
            $table->double('importe', 15, 2);
            $table->string('metodo_pago');
            $table->integer('referencia_bancaria');
            $table->string('estatus');
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
        Schema::drop('pago');
    }
}

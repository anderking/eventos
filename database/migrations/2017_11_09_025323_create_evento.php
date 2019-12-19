<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEvento extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('evento', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('cotizacion_id')->unsigned();
            $table->integer('tipo_evento_id')->unsigned();
            $table->foreign('cotizacion_id')->references('id')->on('cotizacion')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('tipo_evento_id')->references('id')->on('tipo_evento')->onDelete('cascade')->onUpdate('cascade');
            $table->date('fecha_evento');
            $table->time('hora_inicio');
            $table->time('hora_fin');
            $table->integer('nro_cuotas');
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
        Schema::drop('evento');
    }
}

<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventoTarea extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('evento_tarea', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('evento_id')->unsigned();
            $table->integer('tarea_id')->unsigned();
            $table->foreign('evento_id')->references('id')->on('evento')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('tarea_id')->references('id')->on('tarea')->onDelete('cascade')->onUpdate('cascade');
            $table->datetime('fecha_inicio');
            $table->datetime('fecha_fin');
            $table->datetime('fecha_resolucion');
            $table->string('estatust');
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
        Schema::drop('evento_tarea');
    }
}

<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDesignacionTarea extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('designacion_tarea', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('evento_tarea_id')->unsigned();
            $table->integer('designacion_comite_id')->unsigned();
            $table->foreign('evento_tarea_id')->references('id')->on('evento_tarea')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('designacion_comite_id')->references('id')->on('designacion_comite')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::drop('designacion_tarea');
    }
}

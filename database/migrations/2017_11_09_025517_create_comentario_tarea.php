<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateComentarioTarea extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comentario_tarea', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('evento_tarea_id')->unsigned();
            $table->foreign('evento_tarea_id')->references('id')->on('evento_tarea')->onDelete('cascade')->onUpdate('cascade');
            $table->text('comentario');
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
        Schema::drop('comentario_tarea');
    }
}

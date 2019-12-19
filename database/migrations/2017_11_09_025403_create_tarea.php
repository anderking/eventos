<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTarea extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tarea', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('tipo_tarea_id')->unsigned();
            $table->foreign('tipo_tarea_id')->references('id')->on('tipo_tarea')->onDelete('cascade')->onUpdate('cascade');
            $table->string('name');
            $table->text('descripcion');
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
        Schema::drop('tarea');
    }
}

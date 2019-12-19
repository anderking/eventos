<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIncidencia extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('incidencia', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('evento_tarea_id')->unsigned();
            $table->foreign('evento_tarea_id')->references('id')->on('evento_tarea')->onDelete('cascade')->onUpdate('cascade');
            $table->text('descripcion');
            $table->string('cedula_resp');
            $table->string('name_resp');;
            $table->string('telefono_movil');
            $table->string('telefono_ofic');
            $table->string('telefono_otro');
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
        Schema::drop('incidencia');
    }
}

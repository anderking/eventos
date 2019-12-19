<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLocal extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('local', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('tipo_local_id')->unsigned();
            $table->foreign('tipo_local_id')->references('id')->on('tipo_local')->onDelete('cascade')->onUpdate('cascade');
            $table->string('name');
            $table->text('descripcion');
            $table->text('direccion');
            $table->integer('capacidad');
            $table->string('estacionamiento');
            $table->integer('capacidad_est');
            $table->integer('cant_baños');
            $table->string('vigilancia');
            $table->double('precio_alquiler', 15, 8);
            $table->double('IVA', 15, 8);
            $table->double('precio_venta', 15, 8);
            $table->string('cedula_admin');
            $table->string('name_admin');
            $table->string('apellido_admin');
            $table->string('email_admin');
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
        Schema::drop('local');
    }
}

<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCotizacion extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cotizacion', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('local_id')->unsigned();
            $table->foreign('local_id')->references('id')->on('local')->onDelete('cascade')->onUpdate('cascade');
            $table->integer('cliente_id')->unsigned();
            $table->foreign('cliente_id')->references('id')->on('cliente')->onDelete('cascade')->onUpdate('cascade');
            $table->text('descripcion');
            $table->integer('nro_invitados');
            $table->double('monto_total_venta');
            $table->double('monto_total_iva');
            $table->double('monto_presupuesto');
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
        Schema::drop('cotizacion');
    }
}

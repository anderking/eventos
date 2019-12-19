<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCotizacionCosto extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cotizacion_costo', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('cotizacion_id')->unsigned();
            $table->integer('costo_id')->unsigned();
            $table->foreign('cotizacion_id')->references('id')->on('cotizacion')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('costo_id')->references('id')->on('costo')->onDelete('cascade')->onUpdate('cascade');
            $table->integer('cantidad');
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
        Schema::drop('cotizacion_costo');
    }
}

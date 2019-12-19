<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateComite extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comite', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('tipo_comite_id')->unsigned();
            $table->foreign('tipo_comite_id')->references('id')->on('tipo_comite')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::drop('comite');
    }
}

<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('rol_id')->unsigned();
            $table->foreign('rol_id')->references('id')->on('rol')->onDelete('cascade')->onUpdate('cascade');
            $table->string('email')->unique();
            $table->string('password', 60);
            $table->string('cedula');
            $table->string('name');
            $table->string('apellido');
            $table->string('sex');
            $table->date('fecha')->default(date('Y-m-d'));
            $table->text('direccion');
            $table->string('telefono_movil');
            $table->string('telefono_ofic');
            $table->string('telefono_otro');
            $table->rememberToken();
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
        Schema::drop('users');
    }
}

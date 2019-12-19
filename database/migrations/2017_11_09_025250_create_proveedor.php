<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProveedor extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('proveedor', function (Blueprint $table) {
            $table->increments('id');
            $table->string('letra_rif');
            $table->string('rif')->unique();
            $table->string('razon_social');
            $table->text('descripcion');
            $table->text('direccion');
            $table->string('email');
            $table->string('tiempo_respuesta');
            $table->string('desempeño');
            $table->string('calidad');
            $table->string('responsabilidad');
            $table->string('atencion'); 
            $table->string('telefono_movil');
            $table->string('telefono_ofic');
            $table->string('telefono_otro');
            $table->string('name_prov');
            $table->string('apellido_prov'); 
            $table->string('cedula_prov');
            $table->string('email_prov');
            $table->string('telefono_movil_prov');
            $table->string('telefono_ofic_prov');
            $table->string('telefono_otro_prov');
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
        Schema::drop('proveedor');
    }
}

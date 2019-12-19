<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Faker\Factory as Faker;

class TipoServiciosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	    $faker = Faker::create();
          \DB::table('tipo_servicio')->insert(array(
                'name'          =>	'Animacion',
                'descripcion'   =>	'Servicios de animacion',
                'created_at'    => Carbon\Carbon::now(),
                'updated_at'    => Carbon\Carbon::now()
            ));
          \DB::table('tipo_servicio')->insert(array(
                'name'          =>  'Utensilios',
                'descripcion'   =>  'Servicios para utensilios',
                'created_at'    => Carbon\Carbon::now(),
                'updated_at'    => Carbon\Carbon::now()
            ));
          \DB::table('tipo_servicio')->insert(array(
                'name'          =>  'Audiovisual',
                'descripcion'   =>  'Servicios audiovisuales',
                'created_at'    => Carbon\Carbon::now(),
                'updated_at'    => Carbon\Carbon::now()
            ));
          \DB::table('tipo_servicio')->insert(array(
                'name'          =>  'Caterin',
                'descripcion'   =>  'Servicios audiovisuales',
                'created_at'    => Carbon\Carbon::now(),
                'updated_at'    => Carbon\Carbon::now()
            ));
          \DB::table('tipo_servicio')->insert(array(
                'name'          =>  'Materiales',
                'descripcion'   =>  'Servicios audiovisuales',
                'created_at'    => Carbon\Carbon::now(),
                'updated_at'    => Carbon\Carbon::now()
            ));
    }
}

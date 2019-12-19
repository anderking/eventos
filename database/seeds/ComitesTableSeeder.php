<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Faker\Factory as Faker;

class ComitesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	    $faker = Faker::create();
          \DB::table('comite')->insert(array(
          			'tipo_comite_id'=>	'1',
                'name'          =>	'Logística',
                'descripcion'   =>	'Comite que se encarga de la logistica',
                'created_at'    => Carbon\Carbon::now(),
                'updated_at'    => Carbon\Carbon::now()
            ));
          \DB::table('comite')->insert(array(
          			'tipo_comite_id'=>	'2',
                'name'          =>	'Servicios Generales',
                'descripcion'   =>	'Comite que se encarga de los servicios generales',
                'created_at'    => Carbon\Carbon::now(),
                'updated_at'    => Carbon\Carbon::now()
            ));
          \DB::table('comite')->insert(array(
          			'tipo_comite_id'=>	'3',
                'name'          =>	'Protocolo',
                'descripcion'   =>	'Comite que se encarga del Protocolo',
                'created_at'    => Carbon\Carbon::now(),
                'updated_at'    => Carbon\Carbon::now()
            ));
          \DB::table('comite')->insert(array(
          			'tipo_comite_id'=>	'4',
                'name'          =>	'Seguridad',
                'descripcion'   =>	'Comite que se encarga de la Seguridad',
                'created_at'    => Carbon\Carbon::now(),
                'updated_at'    => Carbon\Carbon::now()
            ));

    }
}

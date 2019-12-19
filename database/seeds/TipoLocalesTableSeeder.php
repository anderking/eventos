<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Faker\Factory as Faker;

class TipoLocalesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	    $faker = Faker::create();
          \DB::table('tipo_local')->insert(array(
                'name'          =>	'Local',
                'descripcion'   =>	'Locales para eventos',
                'created_at'    => Carbon\Carbon::now(),
                'updated_at'    => Carbon\Carbon::now()
            ));

          \DB::table('tipo_local')->insert(array(
                'name'          =>  'Salon',
                'descripcion'   =>  'Salones para eventos',
                'created_at'    => Carbon\Carbon::now(),
                'updated_at'    => Carbon\Carbon::now()
            ));
          \DB::table('tipo_local')->insert(array(
                'name'          =>  'Parque',
                'descripcion'   =>  'Parques para eventos',
                'created_at'    => Carbon\Carbon::now(),
                'updated_at'    => Carbon\Carbon::now()
            ));
          \DB::table('tipo_local')->insert(array(
                'name'          =>  'Jardin',
                'descripcion'   =>  'Jardines para eventos',
                'created_at'    => Carbon\Carbon::now(),
                'updated_at'    => Carbon\Carbon::now()
            ));
    }
}

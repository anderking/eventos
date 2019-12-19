<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Faker\Factory as Faker;

class TipoEventosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	    $faker = Faker::create();
          \DB::table('tipo_evento')->insert(array(
                'name'          =>	'Seminario',
                'descripcion'   =>	'Eventos para conferencias y seminarios',
                'created_at'    => Carbon\Carbon::now(),
                'updated_at'    => Carbon\Carbon::now()
            ));

          \DB::table('tipo_evento')->insert(array(
                'name'          =>  'BabyShower',
                'descripcion'   =>  'Fiestas de BabyShower',
                'created_at'    => Carbon\Carbon::now(),
                'updated_at'    => Carbon\Carbon::now()
            ));
          \DB::table('tipo_evento')->insert(array(
                'name'          =>  'Boda',
                'descripcion'   =>  'Eventos de bodas',
                'created_at'    => Carbon\Carbon::now(),
                'updated_at'    => Carbon\Carbon::now()
            ));

          \DB::table('tipo_evento')->insert(array(
                'name'          =>  'Reunion',
                'descripcion'   =>  'Eventos de reuniones',
                'created_at'    => Carbon\Carbon::now(),
                'updated_at'    => Carbon\Carbon::now()
            ));
          \DB::table('tipo_evento')->insert(array(
                'name'          =>  'Playa',
                'descripcion'   =>  'Eventos en la playa',
                'created_at'    => Carbon\Carbon::now(),
                'updated_at'    => Carbon\Carbon::now()
            ));

          \DB::table('tipo_evento')->insert(array(
                'name'          =>  'Piscina',
                'descripcion'   =>  'Eventos para piscinas',
                'created_at'    => Carbon\Carbon::now(),
                'updated_at'    => Carbon\Carbon::now()
            ));
          \DB::table('tipo_evento')->insert(array(
                'name'          =>  'Graduacion',
                'descripcion'   =>  'Eventos para tu graduacion',
                'created_at'    => Carbon\Carbon::now(),
                'updated_at'    => Carbon\Carbon::now()
            ));

          \DB::table('tipo_evento')->insert(array(
                'name'          =>  'Cumpleaños',
                'descripcion'   =>  'Fiestas de Cumpleaños',
                'created_at'    => Carbon\Carbon::now(),
                'updated_at'    => Carbon\Carbon::now()
            ));
    }
}

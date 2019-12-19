<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Faker\Factory as Faker;

class ServiciosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	    $faker = Faker::create();
          \DB::table('servicio')->insert(array(
                'tipo_servicio_id'	    =>	'1',
                'name'          		=>	'Animador',
                'descripcion'   		=>	'Animador de fiestas',
                'created_at'    		=> Carbon\Carbon::now(),
                'updated_at'    		=> Carbon\Carbon::now()
            ));
          \DB::table('servicio')->insert(array(
                'tipo_servicio_id'      =>  '1',
                'name'                  =>  'Equipo de Sonido',
                'descripcion'           =>  'Equipo de Sonido DJ para fiestas',
                'created_at'            => Carbon\Carbon::now(),
                'updated_at'            => Carbon\Carbon::now()
            ));
          \DB::table('servicio')->insert(array(
                'tipo_servicio_id'      =>  '2',
                'name'                  =>  'Cubiertos',
                'descripcion'           =>  'Todo tipo de cubiertos',
                'created_at'            => Carbon\Carbon::now(),
                'updated_at'            => Carbon\Carbon::now()
            ));
          \DB::table('servicio')->insert(array(
                'tipo_servicio_id'      =>  '2',
                'name'                  =>  'Copas',
                'descripcion'           =>  'Todo tipo de copas',
                'created_at'            => Carbon\Carbon::now(),
                'updated_at'            => Carbon\Carbon::now()
            ));
          \DB::table('servicio')->insert(array(
                'tipo_servicio_id'      =>  '3',
                'name'                  =>  'Fotografo',
                'descripcion'           =>  'Servicio de contrato para fotografias',
                'created_at'            => Carbon\Carbon::now(),
                'updated_at'            => Carbon\Carbon::now()
            ));
          \DB::table('servicio')->insert(array(
                'tipo_servicio_id'      =>  '3',
                'name'                  =>  'Filmación',
                'descripcion'           =>  'Servicio de contrato para filmaciones',
                'created_at'            => Carbon\Carbon::now(),
                'updated_at'            => Carbon\Carbon::now()
            ));
          \DB::table('servicio')->insert(array(
                'tipo_servicio_id'      =>  '4',
                'name'                  =>  'Bocaditos Dulces',
                'descripcion'           =>  'Todo tipo de Bocaditos Dulces',
                'created_at'            => Carbon\Carbon::now(),
                'updated_at'            => Carbon\Carbon::now()
            ));
          \DB::table('servicio')->insert(array(
                'tipo_servicio_id'      =>  '4',
                'name'                  =>  'Bocaditos Salados',
                'descripcion'           =>  'Todo tipo de Bocaditos Salados',
                'created_at'            => Carbon\Carbon::now(),
                'updated_at'            => Carbon\Carbon::now()
            ));
          \DB::table('servicio')->insert(array(
                'tipo_servicio_id'      =>  '4',
                'name'                  =>  'Tortas',
                'descripcion'           =>  'Todo tipo de Tortas',
                'created_at'            => Carbon\Carbon::now(),
                'updated_at'            => Carbon\Carbon::now()
            ));
          \DB::table('servicio')->insert(array(
                'tipo_servicio_id'      =>  '5',
                'name'                  =>  'Mesas',
                'descripcion'           =>  'Todo tipo de mesas',
                'created_at'            => Carbon\Carbon::now(),
                'updated_at'            => Carbon\Carbon::now()
            ));
          \DB::table('servicio')->insert(array(
                'tipo_servicio_id'      =>  '5',
                'name'                  =>  'Sillas',
                'descripcion'           =>  'Todo tipo de sillas',
                'created_at'            => Carbon\Carbon::now(),
                'updated_at'            => Carbon\Carbon::now()
            ));
    }
}

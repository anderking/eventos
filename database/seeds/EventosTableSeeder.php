<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Faker\Factory as Faker;

class EventosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	    $faker = Faker::create();
          \DB::table('evento')->insert(array(
          			'cotizacion_id'			=>	'1',
                'tipo_evento_id'    =>	'1',
                'fecha_evento'			=>	Carbon\Carbon::now(),
                'hora_inicio'				=>	Carbon\Carbon::now()->timestamp,
                'hora_fin'					=>	Carbon\Carbon::now()->timestamp,
                'nro_cuotas'				=>	4,
                'estatus'           =>  'Pro',
                'created_at'    		=> Carbon\Carbon::now(),
                'updated_at'    		=> Carbon\Carbon::now()
            ));
          \DB::table('evento')->insert(array(
                'cotizacion_id'     =>  '2',
                'tipo_evento_id'    =>  '2',
                'fecha_evento'      =>  Carbon\Carbon::now(),
                'hora_inicio'       =>  Carbon\Carbon::now()->timestamp,
                'hora_fin'          =>  Carbon\Carbon::now()->timestamp,
                'nro_cuotas'        =>  2,
                'estatus'           =>  'Pro',
                'created_at'        => Carbon\Carbon::now(),
                'updated_at'        => Carbon\Carbon::now()
            ));
    }
}

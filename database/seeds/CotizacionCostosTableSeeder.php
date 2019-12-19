<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Faker\Factory as Faker;

class CotizacionCostosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	   $faker = Faker::create();
          \DB::table('cotizacion_costo')->insert(array(
          			'cotizacion_id'		=>	'1',
          			'costo_id'				=>	'1',
                'cantidad' 				=>	25,
                'created_at'    	=> Carbon\Carbon::now(),
                'updated_at'    	=> Carbon\Carbon::now()
            ));
          \DB::table('cotizacion_costo')->insert(array(
          			'cotizacion_id'		=>	'1',
          			'costo_id'				=>	'2',
                'cantidad' 				=>	20,
                'created_at'    	=> Carbon\Carbon::now(),
                'updated_at'    	=> Carbon\Carbon::now()
            ));
          \DB::table('cotizacion_costo')->insert(array(
          			'cotizacion_id'		=>	'1',
          			'costo_id'				=>	'3',
                'cantidad' 				=>	15,
                'created_at'    	=> Carbon\Carbon::now(),
                'updated_at'    	=> Carbon\Carbon::now()
            ));
          \DB::table('cotizacion_costo')->insert(array(
          			'cotizacion_id'		=>	'1',
          			'costo_id'				=>	'4',
                'cantidad' 				=>	5,
                'created_at'    	=> Carbon\Carbon::now(),
                'updated_at'    	=> Carbon\Carbon::now()
            ));
          \DB::table('cotizacion_costo')->insert(array(
          			'cotizacion_id'		=>	'1',
          			'costo_id'				=>	'5',
                'cantidad' 				=>	40,
                'created_at'    	=> Carbon\Carbon::now(),
                'updated_at'    	=> Carbon\Carbon::now()
            ));
          \DB::table('cotizacion_costo')->insert(array(
          			'cotizacion_id'		=>	'1',
          			'costo_id'				=>	'6',
                'cantidad' 				=>	22,
                'created_at'    	=> Carbon\Carbon::now(),
                'updated_at'    	=> Carbon\Carbon::now()
            ));
          \DB::table('cotizacion_costo')->insert(array(
          			'cotizacion_id'		=>	'1',
          			'costo_id'				=>	'7',
                'cantidad' 				=>	32,
                'created_at'    	=> Carbon\Carbon::now(),
                'updated_at'    	=> Carbon\Carbon::now()
            ));
          \DB::table('cotizacion_costo')->insert(array(
                'cotizacion_id'   =>  '1',
                'costo_id'        =>  '8',
                'cantidad'        =>  32,
                'created_at'      => Carbon\Carbon::now(),
                'updated_at'      => Carbon\Carbon::now()
            ));
          \DB::table('cotizacion_costo')->insert(array(
                'cotizacion_id'   =>  '1',
                'costo_id'        =>  '9',
                'cantidad'        =>  32,
                'created_at'      => Carbon\Carbon::now(),
                'updated_at'      => Carbon\Carbon::now()
            ));

          \DB::table('cotizacion_costo')->insert(array(
                'cotizacion_id'   =>  '2',
                'costo_id'        =>  '1',
                'cantidad'        =>  25,
                'created_at'      => Carbon\Carbon::now(),
                'updated_at'      => Carbon\Carbon::now()
            ));
          \DB::table('cotizacion_costo')->insert(array(
                'cotizacion_id'   =>  '2',
                'costo_id'        =>  '2',
                'cantidad'        =>  20,
                'created_at'      => Carbon\Carbon::now(),
                'updated_at'      => Carbon\Carbon::now()
            ));
          \DB::table('cotizacion_costo')->insert(array(
                'cotizacion_id'   =>  '2',
                'costo_id'        =>  '3',
                'cantidad'        =>  15,
                'created_at'      => Carbon\Carbon::now(),
                'updated_at'      => Carbon\Carbon::now()
            ));
          \DB::table('cotizacion_costo')->insert(array(
                'cotizacion_id'   =>  '2',
                'costo_id'        =>  '4',
                'cantidad'        =>  5,
                'created_at'      => Carbon\Carbon::now(),
                'updated_at'      => Carbon\Carbon::now()
            ));

    }
}

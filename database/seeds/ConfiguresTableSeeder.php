<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Faker\Factory as Faker;

class ConfiguresTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	    $faker = Faker::create();
          \DB::table('config')->insert(array(
          		'porc_iva'			=>	0.12,
                'margen_ganancia'	=>	0.30,
                'moneda'            =>  'Bsf',
                'created_at'    	=> Carbon\Carbon::now(),
                'updated_at'    	=> Carbon\Carbon::now()
            ));
    }
}

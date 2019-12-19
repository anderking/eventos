<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Faker\Factory as Faker;

class ConfiguresRecepTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	    $faker = Faker::create();
          \DB::table('config_recep')->insert(array(
          			'indicador_cuota'		=>	1,
                'porc_cuota'				=>	0.10,
                'created_at'    		=> Carbon\Carbon::now(),
                'updated_at'    		=> Carbon\Carbon::now()
            ));
    }
}

<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Faker\Factory as Faker;

class TipoComitesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
          \DB::table('tipo_comite')->insert(array(
                'name'          =>	'Planificación',
                'descripcion'   =>	'Comites para el proceso de Planificación',
                'created_at'    => Carbon\Carbon::now(),
                'updated_at'    => Carbon\Carbon::now()
            ));
          \DB::table('tipo_comite')->insert(array(
                'name'          =>	'Organización',
                'descripcion'   =>	'Comites para el proceso de Organización',
                'created_at'    => Carbon\Carbon::now(),
                'updated_at'    => Carbon\Carbon::now()
            ));
          \DB::table('tipo_comite')->insert(array(
                'name'          =>	'Ejecución',
                'descripcion'   =>	'Comites para el proceso de Ejecución',
                'created_at'    => Carbon\Carbon::now(),
                'updated_at'    => Carbon\Carbon::now()
            ));
          \DB::table('tipo_comite')->insert(array(
                'name'          =>	'Desmontaje',
                'descripcion'   =>	'Comites para el proceso de Desmontaje',
                'created_at'    => Carbon\Carbon::now(),
                'updated_at'    => Carbon\Carbon::now()
            ));
    }
}

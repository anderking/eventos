<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Faker\Factory as Faker;

class TipoTareasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
          \DB::table('tipo_tarea')->insert(array(
                'name'          =>	'Planificación',
                'descripcion'   =>	'Tareas para el proceso de Planificación',
                'created_at'    => Carbon\Carbon::now(),
                'updated_at'    => Carbon\Carbon::now()
            ));
          \DB::table('tipo_tarea')->insert(array(
                'name'          =>	'Organización',
                'descripcion'   =>	'Tareas para el proceso de Organización',
                'created_at'    => Carbon\Carbon::now(),
                'updated_at'    => Carbon\Carbon::now()
            ));
          \DB::table('tipo_tarea')->insert(array(
                'name'          =>	'Ejecución',
                'descripcion'   =>	'Tareas para el proceso de Ejecución',
                'created_at'    => Carbon\Carbon::now(),
                'updated_at'    => Carbon\Carbon::now()
            ));
          \DB::table('tipo_tarea')->insert(array(
                'name'          =>	'Desmontaje',
                'descripcion'   =>	'Tareas para el proceso de Desmontaje',
                'created_at'    => Carbon\Carbon::now(),
                'updated_at'    => Carbon\Carbon::now()
            ));
    }
}

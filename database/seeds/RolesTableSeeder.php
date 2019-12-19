<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Faker\Factory as Faker;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	   $faker = Faker::create();
          \DB::table('rol')->insert(array(
                'name'          =>	'Administrador',
                'descripcion'   =>	'Usuario Administrador',
                'estatus'       =>  'A',
                'created_at'    => Carbon\Carbon::now(),
                'updated_at'    => Carbon\Carbon::now()
            ));
          \DB::table('rol')->insert(array(
                'name'          =>  'Recepcionista',
                'descripcion'   =>  'Usuario Recepcionista',
                'estatus'       =>  'A',
                'created_at'    => Carbon\Carbon::now(),
                'updated_at'    => Carbon\Carbon::now()
            ));
          \DB::table('rol')->insert(array(
                'name'          =>  'Planificador',
                'descripcion'   =>  'Usuario Planificador',
                'estatus'       =>  'A',
                'created_at'    => Carbon\Carbon::now(),
                'updated_at'    => Carbon\Carbon::now()
            ));
          \DB::table('rol')->insert(array(
                'name'          =>  'Coordinador',
                'descripcion'   =>  'Usuario Coordinador',
                'estatus'       =>  'A',
                'created_at'    => Carbon\Carbon::now(),
                'updated_at'    => Carbon\Carbon::now()
            ));
          \DB::table('rol')->insert(array(
                'name'          =>  'Empleado',
                'descripcion'   =>  'Usuario Empleado',
                'estatus'       =>  'A',
                'created_at'    => Carbon\Carbon::now(),
                'updated_at'    => Carbon\Carbon::now()
            ));
          \DB::table('rol')->insert(array(
                'name'          =>  'Gerente',
                'descripcion'   =>  'Usuario Gerente',
                'estatus'       =>  'A',
                'created_at'    => Carbon\Carbon::now(),
                'updated_at'    => Carbon\Carbon::now()
            ));
    }
}

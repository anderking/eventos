<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Faker\Factory as Faker;

class ClientesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $faker = Faker::create();
          \DB::table('cliente')->insert(array(
          		'cedula'			=> '24159485',
                'name'              => 'Anderson De Jesus',
                'apellido'			=> 'Diaz Rodriguez',
                'sex'               => 'Masculino',
                'fecha_nac'         =>  Carbon\Carbon::yesterday(),
                'edo_civil'			=>  'Soltero',
                'email'             =>  'anderson@gmail.com',
                'direccion'         =>	'Cabudare Calle San Rafael Casa Nro 2 Sector Centro',
                'telefono_movil'    =>	'04245282605',
                'telefono_ofic'	    =>	'02512615798',
                'telefono_otro'	    =>	'04245282605',
                'created_at'        => Carbon\Carbon::now(),
                'updated_at'        => Carbon\Carbon::now()
            ));
          \DB::table('cliente')->insert(array(
          		'cedula'				=> '25139344',
                'name'          => 'Omarlys Alexandra',
                'apellido'			=> 'Gonzalez Gutierrez',
                'sex'           => 'Femenino',
                'fecha_nac'     =>  Carbon\Carbon::yesterday(),
                'edo_civil'			=> 'Casado',
                'email'         => 	'omarlys@gmail.com',
                'direccion'     =>	'Pueblo Nuevo el Oeste Barquisimeto',
                'telefono_movil'=>	'04245282605',
                'telefono_ofic'	=>	'02512615798',
                'telefono_otro'	=>	'04245282605',
                'created_at'    => Carbon\Carbon::now(),
                'updated_at'    => Carbon\Carbon::now()
            ));
          \DB::table('cliente')->insert(array(
                'cedula'        => '23815020',
                'name'          => 'Carlos',
                'apellido'      => 'Gil',
                'sex'           => 'Masculino',
                'fecha_nac'     =>  Carbon\Carbon::yesterday(),
                'edo_civil'     => 'Soltero',
                'email'         =>  'carlosgil@gmail.com',
                'direccion'     =>  'Avenida las Industrias Mayorista',
                'telefono_movil'=>  '04245282605',
                'telefono_ofic' =>  '02512615798',
                'telefono_otro' =>  '04245282605',
                'created_at'    => Carbon\Carbon::now(),
                'updated_at'    => Carbon\Carbon::now()
            ));
    }
}

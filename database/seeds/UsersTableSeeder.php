<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Faker\Factory as Faker;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	    $faker = Faker::create();
          \DB::table('users')->insert(array(
          		'rol_id'		=>	'1',
                'email'         =>	'admin@gmail.com',
                'password'      =>	bcrypt('admin'),
                'cedula'        =>	'24159485',
                'name'    		=>	'Anderson De Jesus',
                'apellido'      =>  'Diaz Rodriguez',
                'sex'           =>	'Masculino',
                'fecha'         =>  Carbon\Carbon::yesterday(),
                'direccion'     =>	'Cabudare Calle San Rafael',
                'telefono_movil'=>	'04245282605',
                'telefono_ofic'	=>	'02512615798',
                'telefono_otro'	=>	'04245282605',
                'created_at'    => Carbon\Carbon::now(),
                'updated_at'    => Carbon\Carbon::now()
            ));
          \DB::table('users')->insert(array(
                'rol_id'        =>  '2',
                'email'         =>  'recepcionista@gmail.com',
                'password'      =>  bcrypt('recepcionista'),
                'cedula'        =>  '25139344',
                'name'          =>  'Omarlys Alexandra',
                'apellido'      =>  'Gonzalez Gutierrez',
                'sex'           =>  'Femenino',
                'fecha'         =>  Carbon\Carbon::yesterday(),
                'direccion'     =>  'Cabudare Calle San Rafael',
                'telefono_movil'=>  '04245282605',
                'telefono_ofic' =>  '02512615798',
                'telefono_otro' =>  '04245282605',
                'created_at'    => Carbon\Carbon::now(),
                'updated_at'    => Carbon\Carbon::now()
            ));
          \DB::table('users')->insert(array(
                'rol_id'        =>  '3',
                'email'         =>  'planificador@gmail.com',
                'password'      =>  bcrypt('planificador'),
                'cedula'        =>  '23456543',
                'name'          =>  'Carlos',
                'apellido'      =>  'Gil',
                'sex'           =>  'Masculino',
                'fecha'         =>  Carbon\Carbon::yesterday(),
                'direccion'     =>  'Cabudare Calle San Rafael',
                'telefono_movil'=>  '04245282605',
                'telefono_ofic' =>  '02512615798',
                'telefono_otro' =>  '04245282605',
                'created_at'    => Carbon\Carbon::now(),
                'updated_at'    => Carbon\Carbon::now()
            ));
          \DB::table('users')->insert(array(
                'rol_id'        =>  '4',
                'email'         =>  'coordinador@gmail.com',
                'password'      =>  bcrypt('coordinador'),
                'cedula'        =>  '22765432',
                'name'          =>  'Ana',
                'apellido'      =>  'Mercedes Diaz',
                'sex'           =>  'Femenino',
                'fecha'         =>  Carbon\Carbon::yesterday(),
                'direccion'     =>  'Cabudare Calle San Rafael',
                'telefono_movil'=>  '04245282605',
                'telefono_ofic' =>  '02512615798',
                'telefono_otro' =>  '04245282605',
                'created_at'    => Carbon\Carbon::now(),
                'updated_at'    => Carbon\Carbon::now()
            ));
          /*\DB::table('users')->insert(array(
                'rol_id'        =>  '5',
                'email'         =>  'empleado@gmail.com',
                'password'      =>  bcrypt('empleado'),
                'cedula'        =>  '21908765',
                'name'          =>  'Andres',
                'apellido'      =>  'Diaz',
                'sex'           =>  'Femenino',
                'fecha'         =>  Carbon\Carbon::yesterday(),
                'direccion'     =>  'Cabudare Calle San Rafael',
                'telefono_movil'=>  '04245282605',
                'telefono_ofic' =>  '02512615798',
                'telefono_otro' =>  '04245282605',
                'created_at'    => Carbon\Carbon::now(),
                'updated_at'    => Carbon\Carbon::now()
            ));*/

          \DB::table('users')->insert(array(
                'rol_id'        =>  '6',
                'email'         =>  'gerente@gmail.com',
                'password'      =>  bcrypt('gerente'),
                'cedula'        =>  '198765432',
                'name'          =>  'Katherine',
                'apellido'      =>  'Martinez',
                'sex'           =>  'Femenino',
                'fecha'         =>  Carbon\Carbon::yesterday(),
                'direccion'     =>  'Cabudare Calle San Rafael',
                'telefono_movil'=>  '04245282605',
                'telefono_ofic' =>  '02512615798',
                'telefono_otro' =>  '04245282605',
                'created_at'    => Carbon\Carbon::now(),
                'updated_at'    => Carbon\Carbon::now()
            ));

          \DB::table('users')->insert(array(
                'rol_id'        =>  '5',
                'email'         =>  'empleado1@gmail.com',
                'password'      =>  bcrypt('empleado1'),
                'cedula'        =>  '1234567',
                'name'          =>  'Empleado1',
                'apellido'      =>  'Diaz',
                'sex'           =>  'Femenino',
                'fecha'         =>  Carbon\Carbon::yesterday(),
                'direccion'     =>  'Cabudare Calle San Rafael',
                'telefono_movil'=>  '04245282605',
                'telefono_ofic' =>  '02512615798',
                'telefono_otro' =>  '04245282605',
                'created_at'    => Carbon\Carbon::now(),
                'updated_at'    => Carbon\Carbon::now()
            ));
          \DB::table('users')->insert(array(
                'rol_id'        =>  '5',
                'email'         =>  'empleado2@gmail.com',
                'password'      =>  bcrypt('empleado2'),
                'cedula'        =>  '3214567',
                'name'          =>  'Empleado2',
                'apellido'      =>  'Diaz',
                'sex'           =>  'Femenino',
                'fecha'         =>  Carbon\Carbon::yesterday(),
                'direccion'     =>  'Cabudare Calle San Rafael',
                'telefono_movil'=>  '04245282605',
                'telefono_ofic' =>  '02512615798',
                'telefono_otro' =>  '04245282605',
                'created_at'    => Carbon\Carbon::now(),
                'updated_at'    => Carbon\Carbon::now()
            ));
          \DB::table('users')->insert(array(
                'rol_id'        =>  '5',
                'email'         =>  'empleado3@gmail.com',
                'password'      =>  bcrypt('empleado3'),
                'cedula'        =>  '876543',
                'name'          =>  'Empleado3',
                'apellido'      =>  'Diaz',
                'sex'           =>  'Femenino',
                'fecha'         =>  Carbon\Carbon::yesterday(),
                'direccion'     =>  'Cabudare Calle San Rafael',
                'telefono_movil'=>  '04245282605',
                'telefono_ofic' =>  '02512615798',
                'telefono_otro' =>  '04245282605',
                'created_at'    => Carbon\Carbon::now(),
                'updated_at'    => Carbon\Carbon::now()
            ));
          \DB::table('users')->insert(array(
                'rol_id'        =>  '5',
                'email'         =>  'empleado4@gmail.com',
                'password'      =>  bcrypt('empleado4'),
                'cedula'        =>  '12343211',
                'name'          =>  'Empleado4',
                'apellido'      =>  'Diaz',
                'sex'           =>  'Femenino',
                'fecha'         =>  Carbon\Carbon::yesterday(),
                'direccion'     =>  'Cabudare Calle San Rafael',
                'telefono_movil'=>  '04245282605',
                'telefono_ofic' =>  '02512615798',
                'telefono_otro' =>  '04245282605',
                'created_at'    => Carbon\Carbon::now(),
                'updated_at'    => Carbon\Carbon::now()
            ));
          \DB::table('users')->insert(array(
                'rol_id'        =>  '5',
                'email'         =>  'empleado5@gmail.com',
                'password'      =>  bcrypt('empleado5'),
                'cedula'        =>  '234567234',
                'name'          =>  'Empleado5',
                'apellido'      =>  'Diaz',
                'sex'           =>  'Femenino',
                'fecha'         =>  Carbon\Carbon::yesterday(),
                'direccion'     =>  'Cabudare Calle San Rafael',
                'telefono_movil'=>  '04245282605',
                'telefono_ofic' =>  '02512615798',
                'telefono_otro' =>  '04245282605',
                'created_at'    => Carbon\Carbon::now(),
                'updated_at'    => Carbon\Carbon::now()
            ));
          \DB::table('users')->insert(array(
                'rol_id'        =>  '5',
                'email'         =>  'empleado6@gmail.com',
                'password'      =>  bcrypt('empleado6'),
                'cedula'        =>  '5654634',
                'name'          =>  'Empleado6',
                'apellido'      =>  'Diaz',
                'sex'           =>  'Femenino',
                'fecha'         =>  Carbon\Carbon::yesterday(),
                'direccion'     =>  'Cabudare Calle San Rafael',
                'telefono_movil'=>  '04245282605',
                'telefono_ofic' =>  '02512615798',
                'telefono_otro' =>  '04245282605',
                'created_at'    => Carbon\Carbon::now(),
                'updated_at'    => Carbon\Carbon::now()
            ));
          \DB::table('users')->insert(array(
                'rol_id'        =>  '5',
                'email'         =>  'empleado7@gmail.com',
                'password'      =>  bcrypt('empleado7'),
                'cedula'        =>  '42341112',
                'name'          =>  'Empleado7',
                'apellido'      =>  'Diaz',
                'sex'           =>  'Femenino',
                'fecha'         =>  Carbon\Carbon::yesterday(),
                'direccion'     =>  'Cabudare Calle San Rafael',
                'telefono_movil'=>  '04245282605',
                'telefono_ofic' =>  '02512615798',
                'telefono_otro' =>  '04245282605',
                'created_at'    => Carbon\Carbon::now(),
                'updated_at'    => Carbon\Carbon::now()
            ));     
        //factory(App\User::class,50)->create();
    }
}

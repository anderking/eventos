<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Faker\Factory as Faker;

class LocalesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
          \DB::table('local')->insert(array(
                'tipo_local_id'     =>  '1',
                'name'              =>  'Local la esperanza de Venezuela',
                'descripcion'   	=>  'Local para eventos venezolanos',
                'direccion'     	=>  'Cabudare Calle San Rafael Sector Centro',
                'capacidad'         =>  500,
                'estacionamiento'   =>  'Si',
                'capacidad_est'     =>  100, 
                'cant_baños'        =>  10,
                'vigilancia'        =>  'Si',
                'precio_alquiler'   =>  250000,
                'IVA'               =>  250000*0.12,
                'precio_venta' 		=>  250000+250000*0.12+250000*0.3,
                'cedula_admin'      =>  '23456765',
                'name_admin'        =>  'Roberto Rafael',
                'apellido_admin'    =>  'Bolaños Gomez',
                'email_admin'       =>  'adminlocales@gmail.com',
                'telefono_movil'    =>  '04245282605',
                'telefono_ofic'     =>  '02512615798',
                'telefono_otro'     =>  '04245282605',
                'created_at'    	=>  Carbon\Carbon::now(),
                'updated_at'    	=>  Carbon\Carbon::now()
            ));
            \DB::table('local')->insert(array(
                'tipo_local_id'     =>  '2',
                'name'              =>  'Salones Primaveras AND ',
                'descripcion'       =>  'Salones para eventos en primaveras',
                'direccion'         =>  'Cabudare Calle San Rafael',
                'capacidad'         =>  200,
                'estacionamiento'   =>  'Si',
                'capacidad_est'     =>  100, 
                'cant_baños'        =>  5,
                'vigilancia'        =>  'Si',
                'precio_alquiler'   =>  123000,
                'IVA'               =>  123000*0.12,
                'precio_venta'      =>  123000+123000*0.12+123000*0.3,
                'cedula_admin'      =>  '23456765',
                'name_admin'        =>  'Roberto Rafael',
                'apellido_admin'    =>  'Bolaños Gomez',
                'email_admin'       =>  'adminlocales@gmail.com',
                'telefono_movil'    =>  '04245282605',
                'telefono_ofic'     =>  '02512615798',
                'telefono_otro'     =>  '04245282605',
                'created_at'        =>  Carbon\Carbon::now(),
                'updated_at'        =>  Carbon\Carbon::now()
            ));
            \DB::table('local')->insert(array(
                'tipo_local_id'     =>  '3',
                'name'              =>  'Parques Marlys ',
                'descripcion'       =>  'Para eventos en los parques',
                'direccion'         =>  'Cabudare Calle San Rafael',
                'capacidad'         =>  100,
                'estacionamiento'   =>  'Si',
                'capacidad_est'     =>  100, 
                'cant_baños'        =>  5,
                'vigilancia'        =>  'Si',
                'precio_alquiler'   =>  250500,
                'IVA'               =>  250500*0.12,
                'precio_venta'      =>  250500+250500*0.12+250500*0.3,
                'cedula_admin'      =>  '23456765',
                'name_admin'        =>  'Roberto Rafael',
                'apellido_admin'    =>  'Bolaños Gomez',
                'email_admin'       =>  'adminlocales@gmail.com',
                'telefono_movil'    =>  '04245282605',
                'telefono_ofic'     =>  '02512615798',
                'telefono_otro'     =>  '04245282605',
                'created_at'        =>  Carbon\Carbon::now(),
                'updated_at'        =>  Carbon\Carbon::now()
            ));
            \DB::table('local')->insert(array(
                'tipo_local_id'     =>  '4',
                'name'              =>  'Jardines Marlys ',
                'descripcion'       =>  'Para eventos al aire libre',
                'direccion'         =>  'Cabudare Calle San Rafael',
                'capacidad'         =>  100,
                'estacionamiento'   =>  'Si',
                'capacidad_est'     =>  100, 
                'cant_baños'        =>  5,
                'vigilancia'        =>  'Si',
                'precio_alquiler'   =>  250500,
                'IVA'               =>  250500*0.12,
                'precio_venta'      =>  250500+250500*0.12+250500*0.3,
                'cedula_admin'      =>  '23456765',
                'name_admin'        =>  'Roberto Rafael',
                'apellido_admin'    =>  'Bolaños Gomez',
                'email_admin'       =>  'adminlocales@gmail.com',
                'telefono_movil'    =>  '04245282605',
                'telefono_ofic'     =>  '02512615798',
                'telefono_otro'     =>  '04245282605',
                'created_at'        =>  Carbon\Carbon::now(),
                'updated_at'        =>  Carbon\Carbon::now()
            ));
    }
}

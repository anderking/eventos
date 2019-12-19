<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Faker\Factory as Faker;

class ItemsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	    $faker = Faker::create();
          \DB::table('item')->insert(array(
                'servicio_id'   =>	'1',
                'descripcion'   =>	'Animador para fiestas de 15 años por hora',
                'stock'         =>	'',
                'created_at'    => Carbon\Carbon::now(),
                'updated_at'    => Carbon\Carbon::now()
            ));
          \DB::table('item')->insert(array(
                'servicio_id'   =>  '2',
                'descripcion'   =>  'Alquiler de sonido por hora',
                'stock'         =>  '',
                'created_at'    => Carbon\Carbon::now(),
                'updated_at'    => Carbon\Carbon::now()
            ));
          \DB::table('item')->insert(array(
                'servicio_id'   =>  '2',
                'descripcion'   =>  'Ayudante de sonido',
                'stock'         =>  '',
                'created_at'    => Carbon\Carbon::now(),
                'updated_at'    => Carbon\Carbon::now()
            ));
          \DB::table('item')->insert(array(
                'servicio_id'   =>  '3',
                'descripcion'   =>  'Cantidad de Cucharas de metal',
                'stock'         =>  1000,
                'created_at'    => Carbon\Carbon::now(),
                'updated_at'    => Carbon\Carbon::now()
            ));
          \DB::table('item')->insert(array(
                'servicio_id'   =>  '3',
                'descripcion'   =>  'Cantidad de Tenedores de metal',
                'stock'         =>  1200,
                'created_at'    => Carbon\Carbon::now(),
                'updated_at'    => Carbon\Carbon::now()
            ));
          \DB::table('item')->insert(array(
                'servicio_id'   =>  '4',
                'descripcion'   =>  'Cantidad de Copas de vidrio pequeñas',
                'stock'         =>  1000,
                'created_at'    => Carbon\Carbon::now(),
                'updated_at'    => Carbon\Carbon::now()
            ));
          \DB::table('item')->insert(array(
                'servicio_id'   =>  '4',
                'descripcion'   =>  'Cantidad de Copas de vidrio grandes',
                'stock'         =>  1200,
                'created_at'    => Carbon\Carbon::now(),
                'updated_at'    => Carbon\Carbon::now()
            ));
          \DB::table('item')->insert(array(
                'servicio_id'   =>  '5',
                'descripcion'   =>  'Servicio de fotografia por hora',
                'stock'         =>  '',
                'created_at'    => Carbon\Carbon::now(),
                'updated_at'    => Carbon\Carbon::now()
            ));
          \DB::table('item')->insert(array(
                'servicio_id'   =>  '6',
                'descripcion'   =>  'Servicio de filmacion por hora',
                'stock'         =>  '',
                'created_at'    => Carbon\Carbon::now(),
                'updated_at'    => Carbon\Carbon::now()
            ));

          \DB::table('item')->insert(array(
                'servicio_id'   =>  '7',
                'descripcion'   =>  'Bombones',
                'stock'         =>  1000,
                'created_at'    => Carbon\Carbon::now(),
                'updated_at'    => Carbon\Carbon::now()
            ));
          \DB::table('item')->insert(array(
                'servicio_id'   =>  '7',
                'descripcion'   =>  'Cupcake',
                'stock'         =>  1000,
                'created_at'    => Carbon\Carbon::now(),
                'updated_at'    => Carbon\Carbon::now()
            ));
          \DB::table('item')->insert(array(
                'servicio_id'   =>  '7',
                'descripcion'   =>  'Brownie',
                'stock'         =>  1000,
                'created_at'    => Carbon\Carbon::now(),
                'updated_at'    => Carbon\Carbon::now()
            ));
          \DB::table('item')->insert(array(
                'servicio_id'   =>  '7',
                'descripcion'   =>  'Suspiros',
                'stock'         =>  1000,
                'created_at'    => Carbon\Carbon::now(),
                'updated_at'    => Carbon\Carbon::now()
            ));
          \DB::table('item')->insert(array(
                'servicio_id'   =>  '7',
                'descripcion'   =>  'Cakefups de chocolate',
                'stock'         =>  1000,
                'created_at'    => Carbon\Carbon::now(),
                'updated_at'    => Carbon\Carbon::now()
            ));
          \DB::table('item')->insert(array(
                'servicio_id'   =>  '8',
                'descripcion'   =>  'Nuggets de pollo',
                'stock'         =>  1000,
                'created_at'    => Carbon\Carbon::now(),
                'updated_at'    => Carbon\Carbon::now()
            ));
          \DB::table('item')->insert(array(
                'servicio_id'   =>  '8',
                'descripcion'   =>  'Chucheria',
                'stock'         =>  1000,
                'created_at'    => Carbon\Carbon::now(),
                'updated_at'    => Carbon\Carbon::now()
            ));
          \DB::table('item')->insert(array(
                'servicio_id'   =>  '8',
                'descripcion'   =>  'Pasapalos',
                'stock'         =>  1000,
                'created_at'    => Carbon\Carbon::now(),
                'updated_at'    => Carbon\Carbon::now()
            ));
          \DB::table('item')->insert(array(
                'servicio_id'   =>  '8',
                'descripcion'   =>  'Arepas',
                'stock'         =>  1000,
                'created_at'    => Carbon\Carbon::now(),
                'updated_at'    => Carbon\Carbon::now()
            ));
          \DB::table('item')->insert(array(
                'servicio_id'   =>  '9',
                'descripcion'   =>  'Tortas pequeña',
                'stock'         =>  1000,
                'created_at'    => Carbon\Carbon::now(),
                'updated_at'    => Carbon\Carbon::now()
            ));
          \DB::table('item')->insert(array(
                'servicio_id'   =>  '9',
                'descripcion'   =>  'Tortas medianas',
                'stock'         =>  1000,
                'created_at'    => Carbon\Carbon::now(),
                'updated_at'    => Carbon\Carbon::now()
            ));
          \DB::table('item')->insert(array(
                'servicio_id'   =>  '9',
                'descripcion'   =>  'Tortas grandes',
                'stock'         =>  1000,
                'created_at'    => Carbon\Carbon::now(),
                'updated_at'    => Carbon\Carbon::now()
            ));
          \DB::table('item')->insert(array(
                'servicio_id'   =>  '9',
                'descripcion'   =>  'Tortas Arepas',
                'stock'         =>  1000,
                'created_at'    => Carbon\Carbon::now(),
                'updated_at'    => Carbon\Carbon::now()
            ));
          \DB::table('item')->insert(array(
                'servicio_id'   =>  '10',
                'descripcion'   =>  'Mesa de buffete',
                'stock'         =>  1000,
                'created_at'    => Carbon\Carbon::now(),
                'updated_at'    => Carbon\Carbon::now()
            ));
          \DB::table('item')->insert(array(
                'servicio_id'   =>  '10',
                'descripcion'   =>  'Mesa de redonda',
                'stock'         =>  1000,
                'created_at'    => Carbon\Carbon::now(),
                'updated_at'    => Carbon\Carbon::now()
            ));
          \DB::table('item')->insert(array(
                'servicio_id'   =>  '10',
                'descripcion'   =>  'Mesa de vidrio',
                'stock'         =>  1000,
                'created_at'    => Carbon\Carbon::now(),
                'updated_at'    => Carbon\Carbon::now()
            ));
          \DB::table('item')->insert(array(
                'servicio_id'   =>  '10',
                'descripcion'   =>  'Mesa buffete iluminado',
                'stock'         =>  1000,
                'created_at'    => Carbon\Carbon::now(),
                'updated_at'    => Carbon\Carbon::now()
            ));
          \DB::table('item')->insert(array(
                'servicio_id'   =>  '11',
                'descripcion'   =>  'Silla metalica',
                'stock'         =>  1000,
                'created_at'    => Carbon\Carbon::now(),
                'updated_at'    => Carbon\Carbon::now()
            ));
          \DB::table('item')->insert(array(
                'servicio_id'   =>  '11',
                'descripcion'   =>  'Silla para invitados especiales',
                'stock'         =>  1000,
                'created_at'    => Carbon\Carbon::now(),
                'updated_at'    => Carbon\Carbon::now()
            ));
    }
}

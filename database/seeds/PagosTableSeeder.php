<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Faker\Factory as Faker;

class PagosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	   $faker = Faker::create();

          \DB::table('pago')->insert(array(
          			'evento_id'							=>	'1',
          			'descripcion'						=>	'Pago 1',
                'fecha_pago' 						=>	Carbon\Carbon::now(),
                'importe'   						=>	(507428.8/4)*1.1,
                'metodo_pago'						=>	'Deposito',
                'referencia_bancaria'		=>	1,
                'estatus'								=>	'Pag',
                'created_at'    				=> Carbon\Carbon::now(),
                'updated_at'    				=> Carbon\Carbon::now()
            ));


          \DB::table('pago')->insert(array(
          			'evento_id'							=>	'1',
          			'descripcion'						=>	'Pago 2',
                'fecha_pago' 						=>	Carbon\Carbon::now(),
                'importe'   						=>	(507428.8/4)*1.1,
                'metodo_pago'						=>	'Deposito',
                'referencia_bancaria'		=>	2,
                'estatus'								=>	'Pag',
                'created_at'    				=> Carbon\Carbon::now(),
                'updated_at'    				=> Carbon\Carbon::now()
            ));


          \DB::table('pago')->insert(array(
          			'evento_id'							=>	'1',
          			'descripcion'						=>	'Pago 3',
                'fecha_pago' 						=>	Carbon\Carbon::now(),
                'importe'   						=>	(507428.8/4)*1.1,
                'metodo_pago'						=>	'Deposito',
                'referencia_bancaria'		=>	3,
                'estatus'								=>	'Pen',
                'created_at'    				=> Carbon\Carbon::now(),
                'updated_at'    				=> Carbon\Carbon::now()
            ));


          \DB::table('pago')->insert(array(
          			'evento_id'							=>	'1',
          			'descripcion'						=>	'Pago 4',
                'fecha_pago' 						=>	Carbon\Carbon::now(),
                'importe'   						=>	(507428.8/4)*1.1,
                'metodo_pago'						=>	'Deposito',
                'referencia_bancaria'		=>	4,
                'estatus'								=>	'Pen',
                'created_at'    				=> Carbon\Carbon::now(),
                'updated_at'    				=> Carbon\Carbon::now()
            ));

          \DB::table('pago')->insert(array(
          			'evento_id'							=>	'2',
          			'descripcion'						=>	'Pago 1',
                'fecha_pago' 						=>	Carbon\Carbon::now(),
                'importe'   						=>	(240930.4/2)*1.1,
                'metodo_pago'						=>	'Deposito',
                'referencia_bancaria'		=>	5,
                'estatus'								=>	'Pag',
                'created_at'    				=> Carbon\Carbon::now(),
                'updated_at'    				=> Carbon\Carbon::now()
            ));

          \DB::table('pago')->insert(array(
                'evento_id'             =>  '2',
                'descripcion'           =>  'Pago 2',
                'fecha_pago'            =>  Carbon\Carbon::now(),
                'importe'               =>  (240930.4/2)*1.1,
                'metodo_pago'           =>  'Deposito',
                'referencia_bancaria'   =>  6,
                'estatus'               =>  'Pen',
                'created_at'            => Carbon\Carbon::now(),
                'updated_at'            => Carbon\Carbon::now()
            ));
    }
}

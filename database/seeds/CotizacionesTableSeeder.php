<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Faker\Factory as Faker;

class CotizacionesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	   $faker = Faker::create();
          \DB::table('cotizacion')->insert(array(
          		  'local_id'              =>  '1',
                'cliente_id'            =>  '1',
                'descripcion'           =>  'Cotizacion para un evento de reunion familiar',
                'nro_invitados'         =>  200,
                'monto_total_venta'     =>  524945.6,
                'monto_total_iva'       =>  30549,
                'monto_presupuesto'     =>  555494.6,
                'estatus'               =>  'A',
                'created_at'            =>  Carbon\Carbon::now(),
                'updated_at'            =>  Carbon\Carbon::now()
            ));
          \DB::table('cotizacion')->insert(array(
                'local_id'              =>  '2',
                'cliente_id'            =>  '2',
                'descripcion'           =>  'Cotizacion para un evento de conferencias',
                'nro_invitados'         =>  100,
                'monto_total_venta'     =>  372586.7,
                'monto_total_iva'       =>  30343.8,
                'monto_presupuesto'     =>  402930.5,
                'estatus'               =>  'A',
                'created_at'            =>  Carbon\Carbon::now(),
                'updated_at'            =>  Carbon\Carbon::now()
            ));
    }
}

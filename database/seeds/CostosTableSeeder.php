<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Faker\Factory as Faker;

class CostosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	   $faker = Faker::create();
          \DB::table('costo')->insert(array(
          		'item_id'		=>	'1',
          		'proveedor_id'	=>	'1',
                'precio_compra' =>	100,
                'IVA'   		=>	100*0.12,
                'precio_venta'  =>  100+(100*0.12+100*0.3),
                'created_at'    => Carbon\Carbon::now(),
                'updated_at'    => Carbon\Carbon::now()
            ));
          \DB::table('costo')->insert(array(
                'item_id'       =>  '2',
                'proveedor_id'  =>  '1',
                'precio_compra' =>  1500,
                'IVA'           =>  1500*0.12,
                'precio_venta'  =>  1500+(1500*0.12+1500*0.3),
                'created_at'    => Carbon\Carbon::now(),
                'updated_at'    => Carbon\Carbon::now()
            ));
          \DB::table('costo')->insert(array(
                'item_id'       =>  '3',
                'proveedor_id'  =>  '1',
                'precio_compra' =>  125,
                'IVA'           =>  125*0.12,
                'precio_venta'  =>  125+(125*0.12+125*0.3),
                'created_at'    => Carbon\Carbon::now(),
                'updated_at'    => Carbon\Carbon::now()
            ));
          \DB::table('costo')->insert(array(
                'item_id'       =>  '4',
                'proveedor_id'  =>  '2',
                'precio_compra' =>  345,
                'IVA'           =>  345*0.12,
                'precio_venta'  =>  345+(345*0.12+345*0.3),
                'created_at'    => Carbon\Carbon::now(),
                'updated_at'    => Carbon\Carbon::now()
            ));
          \DB::table('costo')->insert(array(
                'item_id'       =>  '5',
                'proveedor_id'  =>  '2',
                'precio_compra' =>  865,
                'IVA'           =>  865*0.12,
                'precio_venta'  =>  865+(865*0.12+865*0.3),
                'created_at'    => Carbon\Carbon::now(),
                'updated_at'    => Carbon\Carbon::now()
            ));
          \DB::table('costo')->insert(array(
                'item_id'       =>  '6',
                'proveedor_id'  =>  '2',
                'precio_compra' =>  350,
                'IVA'           =>  350*0.12,
                'precio_venta'  =>  350+(350*0.12+350*0.3),
                'created_at'    => Carbon\Carbon::now(),
                'updated_at'    => Carbon\Carbon::now()
            ));
          \DB::table('costo')->insert(array(
                'item_id'       =>  '7',
                'proveedor_id'  =>  '2',
                'precio_compra' =>  235,
                'IVA'           =>  235*0.12,
                'precio_venta'  =>  235+(235*0.12+235*0.3),
                'created_at'    => Carbon\Carbon::now(),
                'updated_at'    => Carbon\Carbon::now()
            ));
          \DB::table('costo')->insert(array(
                'item_id'       =>  '8',
                'proveedor_id'  =>  '3',
                'precio_compra' =>  400,
                'IVA'           =>  400*0.12,
                'precio_venta'  =>  400+(400*0.12+400*0.3),
                'created_at'    => Carbon\Carbon::now(),
                'updated_at'    => Carbon\Carbon::now()
            ));
          \DB::table('costo')->insert(array(
                'item_id'       =>  '9',
                'proveedor_id'  =>  '3',
                'precio_compra' =>  655,
                'IVA'           =>  655*0.12,
                'precio_venta'  =>  655+(655*0.12+655*0.3),
                'created_at'    => Carbon\Carbon::now(),
                'updated_at'    => Carbon\Carbon::now()
            ));
          \DB::table('costo')->insert(array(
                'item_id'       =>  '10',
                'proveedor_id'  =>  '4',
                'precio_compra' =>  832,
                'IVA'           =>  832*0.12,
                'precio_venta'  =>  832+(832*0.12+832*0.3),
                'created_at'    => Carbon\Carbon::now(),
                'updated_at'    => Carbon\Carbon::now()
            ));
          \DB::table('costo')->insert(array(
                'item_id'       =>  '11',
                'proveedor_id'  =>  '4',
                'precio_compra' =>  876,
                'IVA'           =>  876*0.12,
                'precio_venta'  =>  876+(876*0.12+876*0.3),
                'created_at'    => Carbon\Carbon::now(),
                'updated_at'    => Carbon\Carbon::now()
            ));
          \DB::table('costo')->insert(array(
                'item_id'       =>  '12',
                'proveedor_id'  =>  '4',
                'precio_compra' =>  123,
                'IVA'           =>  123*0.12,
                'precio_venta'  =>  123+(123*0.12+123*0.3),
                'created_at'    => Carbon\Carbon::now(),
                'updated_at'    => Carbon\Carbon::now()
            ));
          \DB::table('costo')->insert(array(
                'item_id'       =>  '13',
                'proveedor_id'  =>  '4',
                'precio_compra' =>  987,
                'IVA'           =>  987*0.12,
                'precio_venta'  =>  987+(987*0.12+987*0.3),
                'created_at'    => Carbon\Carbon::now(),
                'updated_at'    => Carbon\Carbon::now()
            ));
          \DB::table('costo')->insert(array(
                'item_id'       =>  '14',
                'proveedor_id'  =>  '4',
                'precio_compra' =>  543,
                'IVA'           =>  543*0.12,
                'precio_venta'  =>  543+(543*0.12+543*0.3),
                'created_at'    => Carbon\Carbon::now(),
                'updated_at'    => Carbon\Carbon::now()
            ));
          \DB::table('costo')->insert(array(
                'item_id'       =>  '15',
                'proveedor_id'  =>  '4',
                'precio_compra' =>  654,
                'IVA'           =>  654*0.12,
                'precio_venta'  =>  654+(654*0.12+654*0.3),
                'created_at'    => Carbon\Carbon::now(),
                'updated_at'    => Carbon\Carbon::now()
            ));
          \DB::table('costo')->insert(array(
                'item_id'       =>  '16',
                'proveedor_id'  =>  '4',
                'precio_compra' =>  987,
                'IVA'           =>  987*0.12,
                'precio_venta'  =>  987+(987*0.12+987*0.3),
                'created_at'    => Carbon\Carbon::now(),
                'updated_at'    => Carbon\Carbon::now()
            ));
          \DB::table('costo')->insert(array(
                'item_id'       =>  '17',
                'proveedor_id'  =>  '4',
                'precio_compra' =>  234,
                'IVA'           =>  234*0.12,
                'precio_venta'  =>  234+(234*0.12+234*0.3),
                'created_at'    => Carbon\Carbon::now(),
                'updated_at'    => Carbon\Carbon::now()
            ));
          \DB::table('costo')->insert(array(
                'item_id'       =>  '18',
                'proveedor_id'  =>  '4',
                'precio_compra' =>  1234,
                'IVA'           =>  1234*0.12,
                'precio_venta'  =>  1234+(1234*0.12+1234*0.3),
                'created_at'    => Carbon\Carbon::now(),
                'updated_at'    => Carbon\Carbon::now()
            ));
          \DB::table('costo')->insert(array(
                'item_id'       =>  '19',
                'proveedor_id'  =>  '4',
                'precio_compra' =>  876,
                'IVA'           =>  876*0.12,
                'precio_venta'  =>  876+(876*0.12+876*0.3),
                'created_at'    => Carbon\Carbon::now(),
                'updated_at'    => Carbon\Carbon::now()
            ));
          \DB::table('costo')->insert(array(
                'item_id'       =>  '20',
                'proveedor_id'  =>  '4',
                'precio_compra' =>  655,
                'IVA'           =>  655*0.12,
                'precio_venta'  =>  655+(655*0.12+655*0.3),
                'created_at'    => Carbon\Carbon::now(),
                'updated_at'    => Carbon\Carbon::now()
            ));
          \DB::table('costo')->insert(array(
                'item_id'       =>  '21',
                'proveedor_id'  =>  '4',
                'precio_compra' =>  432,
                'IVA'           =>  432*0.12,
                'precio_venta'  =>  432+(432*0.12+432*0.3),
                'created_at'    => Carbon\Carbon::now(),
                'updated_at'    => Carbon\Carbon::now()
            ));
          \DB::table('costo')->insert(array(
                'item_id'       =>  '22',
                'proveedor_id'  =>  '4',
                'precio_compra' =>  900,
                'IVA'           =>  900*0.12,
                'precio_venta'  =>  900+(900*0.12+900*0.3),
                'created_at'    => Carbon\Carbon::now(),
                'updated_at'    => Carbon\Carbon::now()
            ));
          \DB::table('costo')->insert(array(
                'item_id'       =>  '23',
                'proveedor_id'  =>  '5',
                'precio_compra' =>  233,
                'IVA'           =>  233*0.12,
                'precio_venta'  =>  233+(233*0.12+233*0.3),
                'created_at'    => Carbon\Carbon::now(),
                'updated_at'    => Carbon\Carbon::now()
            ));
          \DB::table('costo')->insert(array(
                'item_id'       =>  '24',
                'proveedor_id'  =>  '5',
                'precio_compra' =>  655,
                'IVA'           =>  655*0.12,
                'precio_venta'  =>  655+(655*0.12+655*0.3),
                'created_at'    => Carbon\Carbon::now(),
                'updated_at'    => Carbon\Carbon::now()
            ));
          \DB::table('costo')->insert(array(
                'item_id'       =>  '25',
                'proveedor_id'  =>  '5',
                'precio_compra' =>  500,
                'IVA'           =>  500*0.12,
                'precio_venta'  =>  500+(500*0.12+500*0.3),
                'created_at'    => Carbon\Carbon::now(),
                'updated_at'    => Carbon\Carbon::now()
            ));
          \DB::table('costo')->insert(array(
                'item_id'       =>  '26',
                'proveedor_id'  =>  '5',
                'precio_compra' =>  765,
                'IVA'           =>  765*0.12,
                'precio_venta'  =>  765+(765*0.12+765*0.3),
                'created_at'    => Carbon\Carbon::now(),
                'updated_at'    => Carbon\Carbon::now()
            ));
          \DB::table('costo')->insert(array(
                'item_id'       =>  '27',
                'proveedor_id'  =>  '5',
                'precio_compra' =>  435,
                'IVA'           =>  435*0.12,
                'precio_venta'  =>  435+(435*0.12+435*0.3),
                'created_at'    => Carbon\Carbon::now(),
                'updated_at'    => Carbon\Carbon::now()
            ));
          \DB::table('costo')->insert(array(
                'item_id'       =>  '28',
                'proveedor_id'  =>  '5',
                'precio_compra' =>  765,
                'IVA'           =>  765*0.12,
                'precio_venta'  =>  765+(765*0.12+765*0.3),
                'created_at'    => Carbon\Carbon::now(),
                'updated_at'    => Carbon\Carbon::now()
            ));
    }
}

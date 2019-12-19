<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Faker\Factory as Faker;

class ProveedoresTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        	$faker = Faker::create();
          \DB::table('proveedor')->insert(array(
                'letra_rif'             =>  'J',
                'rif'                   =>  '9000000',
                'razon_social'          =>  'Iluminaciones Anderson C.A',
                'descripcion'           =>  'Proveedor de servicios de Iluminacion',
                'direccion'             =>  'Cabudare Calle San Rafael',
                'email'                 =>  'IluminacionesAndersonCA@gmail.com',
                'tiempo_respuesta'      =>  'Excelente',
                'desempeño'             =>  'Excelente',
                'calidad'               =>  'Excelente',
                'responsabilidad'       =>  'Excelente',
                'atencion'              =>  'Excelente',
                'telefono_movil'        =>  '04245282605',
                'telefono_ofic'         =>  '02512615798',
                'telefono_otro'         =>  '04245282605',
                'name_prov'             =>  'Anderson De jesus',
                'apellido_prov'         =>  'Diaz Rodriguez',
                'cedula_prov'           =>  '23453123',
                'email_prov'            =>  'anderson@iluminaciones.com',
                'telefono_movil_prov'   =>  '0423432433',
                'telefono_ofic_prov'    =>  '0423432433',
                'telefono_otro_prov'    =>  '0423432433',
                'created_at'            =>  Carbon\Carbon::now(),
                'updated_at'            =>  Carbon\Carbon::now()
            ));
          \DB::table('proveedor')->insert(array(
                'letra_rif'             =>  'C',
                'rif'                   =>  '2000000',
                'razon_social'          =>  'Sr Utensilios Big C.A',
                'descripcion'           =>  'Proveedor de utensilios',
                'direccion'             =>  'Cabudare Calle San Rafael',
                'email'                 =>  'SrUtensiliosCA@gmail.com',
                'tiempo_respuesta'      =>  'Excelente',
                'desempeño'             =>  'Excelente',
                'calidad'               =>  'Excelente',
                'responsabilidad'       =>  'Excelente',
                'atencion'              =>  'Excelente',
                'telefono_movil'        =>  '04245282605',
                'telefono_ofic'         =>  '02512615798',
                'telefono_otro'         =>  '04245282605',
                'name_prov'             =>  'Omarlys Alexandra',
                'apellido_prov'         =>  'Gonzalez Gutierrez',
                'cedula_prov'           =>  '2575632213',
                'email_prov'            =>  'omarlys@utensilios.com',
                'telefono_movil_prov'   =>  '0423432433',
                'telefono_ofic_prov'    =>  '0423432433',
                'telefono_otro_prov'    =>  '0423432433',
                'created_at'            =>  Carbon\Carbon::now(),
                'updated_at'            =>  Carbon\Carbon::now()
            ));
            \DB::table('proveedor')->insert(array(
                'letra_rif'             =>  'C',
                'rif'                   =>  '60432000',
                'razon_social'          =>  'Sr AudioVisualesTodo C.A',
                'descripcion'           =>  'Proveedor de servicios AudioVisuales',
                'direccion'             =>  'Cabudare Calle San Rafael',
                'email'                 =>  'SrAudios@gmail.com',
                'tiempo_respuesta'      =>  'Excelente',
                'desempeño'             =>  'Excelente',
                'calidad'               =>  'Excelente',
                'responsabilidad'       =>  'Excelente',
                'atencion'              =>  'Excelente',
                'telefono_movil'        =>  '04245282605',
                'telefono_ofic'         =>  '02512615798',
                'telefono_otro'         =>  '04245282605',
                'name_prov'             =>  'Anderson De Jesus',
                'apellido_prov'         =>  'Diaz Rodriguez',
                'cedula_prov'           =>  '2575632213',
                'email_prov'            =>  'ander@audiovisuales.com',
                'telefono_movil_prov'   =>  '0423432433',
                'telefono_ofic_prov'    =>  '0423432433',
                'telefono_otro_prov'    =>  '0423432433',
                'created_at'            =>  Carbon\Carbon::now(),
                'updated_at'            =>  Carbon\Carbon::now()
            ));

            \DB::table('proveedor')->insert(array(
                'letra_rif'             =>  'G',
                'rif'                   =>  '1023200',
                'razon_social'          =>  'Sr Caterin Big C.A',
                'descripcion'           =>  'Proveedor de Caterin',
                'direccion'             =>  'Cabudare Calle San Rafael',
                'email'                 =>  'Catringca@gmail.com',
                'tiempo_respuesta'      =>  'Excelente',
                'desempeño'             =>  'Excelente',
                'calidad'               =>  'Excelente',
                'responsabilidad'       =>  'Excelente',
                'atencion'              =>  'Excelente',
                'telefono_movil'        =>  '04245282605',
                'telefono_ofic'         =>  '02512615798',
                'telefono_otro'         =>  '04245282605',
                'name_prov'             =>  'Jose',
                'apellido_prov'         =>  'Gonzalez',
                'cedula_prov'           =>  '2575632213',
                'email_prov'            =>  'jose@caterin.com',
                'telefono_movil_prov'   =>  '0423432433',
                'telefono_ofic_prov'    =>  '0423432433',
                'telefono_otro_prov'    =>  '0423432433',
                'created_at'            =>  Carbon\Carbon::now(),
                'updated_at'            =>  Carbon\Carbon::now()
            ));

            \DB::table('proveedor')->insert(array(
                'letra_rif'             =>  'V',
                'rif'                   =>  '2030200',
                'razon_social'          =>  'Sr Materiales Event C.A',
                'descripcion'           =>  'Proveedor de Materiales',
                'direccion'             =>  'Cabudare Calle San Rafael',
                'email'                 =>  'SrmaterialesA@gmail.com',
                'tiempo_respuesta'      =>  'Excelente',
                'desempeño'             =>  'Excelente',
                'calidad'               =>  'Excelente',
                'responsabilidad'       =>  'Excelente',
                'atencion'              =>  'Excelente',
                'telefono_movil'        =>  '04245282605',
                'telefono_ofic'         =>  '02512615798',
                'telefono_otro'         =>  '04245282605',
                'name_prov'             =>  'Ana Alexandra',
                'apellido_prov'         =>  'Lopez Gutierrez',
                'cedula_prov'           =>  '2575632213',
                'email_prov'            =>  'ana@materiales.com',
                'telefono_movil_prov'   =>  '0423432433',
                'telefono_ofic_prov'    =>  '0423432433',
                'telefono_otro_prov'    =>  '0423432433',
                'created_at'            =>  Carbon\Carbon::now(),
                'updated_at'            =>  Carbon\Carbon::now()
            ));
    }
}

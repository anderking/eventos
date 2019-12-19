<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Faker\Factory as Faker;

class TareasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	    $faker = Faker::create();
          \DB::table('tarea')->insert(array(
          			'tipo_tarea_id'	=>	'1',
                'name'          =>	'Montaje de tarimas',
                'descripcion'   =>	'Armar la tarima',
                'created_at'    => Carbon\Carbon::now(),
                'updated_at'    => Carbon\Carbon::now()
            ));
          \DB::table('tarea')->insert(array(
          			'tipo_tarea_id'	=>	'1',
                'name'          =>	'Montaje de luces y sonido',
                'descripcion'   =>	'Armar todo el equipo de iluminacion',
                'created_at'    => Carbon\Carbon::now(),
                'updated_at'    => Carbon\Carbon::now()
            ));
          \DB::table('tarea')->insert(array(
          			'tipo_tarea_id'	=>	'2',
                'name'          =>	'Traslado de todos los equipos',
                'descripcion'   =>	'Distribuir los objetos como sillas y mesas que haya en el evento',
                'created_at'    => Carbon\Carbon::now(),
                'updated_at'    => Carbon\Carbon::now()
            ));
          \DB::table('tarea')->insert(array(
          			'tipo_tarea_id'	=>	'3',
                'name'          =>	'Coordinar servicios de estacionamiento',
                'descripcion'   =>	'Asegurar el libre estacionamiento',
                'created_at'    => Carbon\Carbon::now(),
                'updated_at'    => Carbon\Carbon::now()
            ));
          \DB::table('tarea')->insert(array(
          			'tipo_tarea_id'	=>	'4',
                'name'          =>	'Cuidado de material promocional',
                'descripcion'   =>	'Control y cuidado de todo el material promocional del evento',
                'created_at'    => Carbon\Carbon::now(),
                'updated_at'    => Carbon\Carbon::now()
            ));
          \DB::table('tarea')->insert(array(
          			'tipo_tarea_id'	=>	'4',
                'name'          =>	'Distribucion de la gastronomia y caterring',
                'descripcion'   =>	'Suministro de gastronomía, servicio de catering, elección de menú, de acuerdo al tipo de comidas, almuerzo, cena, coffee breaks, etc. Todo lo referente a bebidas, servicio de barman, barras móviles, etc.',
                'created_at'    => Carbon\Carbon::now(),
                'updated_at'    => Carbon\Carbon::now()
            ));
          \DB::table('tarea')->insert(array(
          			'tipo_tarea_id'	=>	'4',
                'name'          =>	'Indicar Señalización',
                'descripcion'   =>	'Señalización apropiada de los servicios sanitarios, comedor, casetas telefónicas y centros de cómputo con Internet',
                'created_at'    => Carbon\Carbon::now(),
                'updated_at'    => Carbon\Carbon::now()
            ));
          \DB::table('tarea')->insert(array(
          			'tipo_tarea_id'	=>	'3',
                'name'          =>	'Diseño del evento',
                'descripcion'   =>	'Diseño, edición y la impresión de anuncios, calendarios, invitaciones, programas, folletería en general, señalizaciones, carteles, banners, etc.',
                'created_at'    => Carbon\Carbon::now(),
                'updated_at'    => Carbon\Carbon::now()
            ));
          \DB::table('tarea')->insert(array(
          			'tipo_tarea_id'	=>	'3',
                'name'          =>	'Comuniar a las personas',
                'descripcion'   =>	'Comunicación vía email con participantes, contacto con patrocinadores, respuestas a consultas y confirmaciones',
                'created_at'    => Carbon\Carbon::now(),
                'updated_at'    => Carbon\Carbon::now()
            ));
          \DB::table('tarea')->insert(array(
          			'tipo_tarea_id'	=>	'3',
                'name'          =>	'Organizar logística de la ponencia',
                'descripcion'   =>	'Organizar los temas a tratar en en el evento',
                'created_at'    => Carbon\Carbon::now(),
                'updated_at'    => Carbon\Carbon::now()
            ));
    }
}

/*

Comité de Servicios Generales



Reportar contingencias que se pudiesen presentar al comité de logística, en dado caso de no poder ser resueltas por ellos
Disponibilidad para casi cualquier tipo de solicitud de parte de los participantes al evento.
Comité de Promoción y Relaciones Publicas

Definir diseño e impresión de logo del evento y/o de patrocinadores en materiales a entregar a participantes o invitados
Armado de material de presentación y difusión del evento a través de la página y sitio web para promocionar

Manejo de agenda de prensa, conferencia de prensa, entrevistas, notas y aspectos relacionados durante el evento y después del mismo también
Comité de Patrocinio
Seleccionar a los patrocinadores adecuados,
Realizar una presentación breve y concisa donde se logré percibir el objetivo general del evento y los beneficios que otorga al patrocinador,
Coordinar con los patrocinadores las especificaciones de su imagen corporativa en la publicidad del evento
Comité de Seguridad
Coordinar toda la seguridad del evento
Vigilancia de las instalaciones
Coordinar servicios de ambulancias y primeros auxilios
Comité de Protocolo
Dar la bienvenida a los invitados o participantes
Planificación del protocolo
Coordinar llegada y salida de los invitados
Brindar información del evento
Comité de Ponencias
Estructurar un programa técnico
Generar propuestas de temas relevantes
Escoger temas a tratar y actividades a realizar

Generación de tiempos y movimientos requeridos para las ponencias.
Determinar personas indicadas para presentar a los participantes los temas relevantes del evento.
Determinar ponentes alternativos para los temas a tratar en dado caso que los seleccionados principales rechacen la invitación o no puedan participar en el evento
Contactar a los ponentes y/o empresas invitadas y realizarle la adecuada invitación al evento
Preparar las invitaciones alternativas para los ponentes secundarios, Confirmar la asistencia de los ponentes y/o empresas al evento
Solicitar los currículos de los ponentes confirmados para realizar una breve presentación de sus logros antes de su ponencia
Solicitar un listado a los ponentes y/o empresas, del material y/o equipo que requerirán para su presentación
Coordinar con los panelistas y/o empresas sus respectivas presentaciones para poder determinar cuál será el acomodo apropiado y el lugar que será asignado para dichas presentaciones
Comité de Participantes
Determinar quiénes serán los asistentes invitados al evento
Contactar a las instituciones que serán invitadas para realizar las pertinentes invitaciones y colocar la publicidad necesaria
Presentar los paquetes y costos a los participantes
Confirmar la asistencia de grupos al evento
Coordinar y guiar a los grupos participantes
Realizar visitas promociónales constantes a las instituciones invitadas
Realizar el registro de participantes en junto con el comité de logística
Realizar un reporte de los participantes al evento
Realizar un reporte final de acciones y resultados para los organizadores
*/
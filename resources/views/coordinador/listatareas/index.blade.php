@extends ('admin.template.main')
<?php
  $ruta = Request::Url();
  $fullruta = Request::fullUrl();
?>
@section('title','Coordinador-ListaTarea')
@section('body_class','coordinador_listatareas_index')
@section('main_class','coordinador_listatareas_index')
@section('content')

<h1 class="text-center">Lista de Tareas por Eventos</h1>

<div class="row">
  <div class="col-xs-12 col-sm-12 col-md-12 text-center">
  	{!! Form::open(array('route' => 'coordinador.listatareas.index','method' => 'GET','class'=>'navbar-form')) !!}
    <div class="input-group">
      {!! Form::text('id', null, ['class'=>'form-control','placeholder'=>'Buscar...','aria-describedby'=>'search','required']) !!}
      <span class="input-group-btn" >
        <button class="btn btn-info" type="submit"><i class="fa fa-search"></i></button>
      </span>
    </div>
    {!! Form::close() !!}
  </div>
</div>

@if (count($eventotarea)>0)
<div class="table-responsive">
	<table class="table table-hover table-condensed">
		<thead>
			<tr>
				<th>ID</th>
        <th>Evento</th>
        <th>Tarea</th>
        <th>Fecha Inicio</th>
        <th>Fecha Fin</th>
        <th>Fecha Resolución</th>
        <th>Estatus</th>
        <th>Acción</th>
			</tr>
		</thead>
		<tbody>
			@foreach($eventotarea as $eventotareas)
			@if($eventotareas->evento->estatus!="Pen")
			<tr>
				@if($eventotareas->id<=9)
				<td><a href="{{ route('coordinador.listatareas.show',$eventotareas->id) }}">ETR00{{ $eventotareas->id }}</a></td>
				@elseif($eventotareas->id>9 and $eventotareas->id<=99)
				<td><a href="{{ route('coordinador.listatareas.show',$eventotareas->id) }}">ETR0{{ $eventotareas->id }}</a></td>
				@endif
				@if($eventotareas->evento_id<=9)
				<td>E00{{ $eventotareas->evento_id }}</td>
				@elseif($eventotareas->evento_id>9 and $eventotareas->evento_id<=99)
				<td>E0{{ $eventotareas->evento_id }}</td>
				@endif
				<td>{{ $eventotareas->tarea->name }}</td>
				<td>{{ $eventotareas->fecha_inicio->toDateString() }}</td>
				<td>{{ $eventotareas->fecha_fin->toDateString() }}</td>
				@if($eventotareas->estatust=="F")
				<td>{{ $eventotareas->fecha_resolucion->toDateString() }}</td>
				@else
				<td>Sin fecha</td>
				@endif
				@if($eventotareas->estatust=="P")
				<td><span class="badge badge-danger">Pendiente</span></td>
				@elseif($eventotareas->estatust=="F")
				<td><span class="badge badge-success">Finalizada</span></td>
				@endif
				<td>
					<a class="btn btn-warning" href="{{ route('coordinador.designaciontareas.create2',$eventotareas->id)}}">Asignar Comité Responsable</a>
					<a class="btn btn-info" href="{{ route('coordinador.listatareas.edit',$eventotareas->id) }}"><b>Modificar</b></a>
					<!--<a class="btn btn-danger" href="{{ route('coordinador.incidencias.index') }}"><b>Reportar Incidencia</b></a>-->
				</td>
			</tr>
			@endif
			@endforeach
		</tbody>
	</table>
</div>
@else
	<div class="jumbotron">
		<h1 class="text-center">No existen registros de Tareas por Evento en nuestra Base de Datos</h1>
	</div>
	<div class="text-center">
		<a href="{{ URL::previous() }}" class="btn btn-default"><i class="fa fa-arrow-left" aria-hidden="true"></i>Regresar</a>
	</div>
@endif

@if(count($eventotarea)>0)
	@if($ruta!=$fullruta)
		<div class="text-center">
			<a href="{{ URL::previous() }}" class="btn btn-default"><i class="fa fa-arrow-left" aria-hidden="true"></i>Regresar</a>
		</div>
	@endif
@endif

@endsection
@extends ('admin.template.main')
<?php
  $ruta = Request::Url();
  $fullruta = Request::fullUrl();
?>
@section('title','Planificador-ListaEventos')
@section('body_class','planificador_listaeventos_index')
@section('main_class','planificador_listaeventos_index')
@section('content')

<h1 class="text-center">Lista de Eventos Por Planificar</h1>

<div class="row">
  <div class="col-xs-12 col-sm-12 col-md-12 text-center">
  	{!! Form::open(array('route' => 'planificador.listaeventos.index','method' => 'GET','class'=>'navbar-form')) !!}
    <div class="input-group">
      {!! Form::text('id', null, ['class'=>'form-control','placeholder'=>'Buscar...','aria-describedby'=>'search','required']) !!}
      <span class="input-group-btn" >
        <button class="btn btn-info" type="submit"><i class="fa fa-search"></i></button>
      </span>
    </div>
    {!! Form::close() !!}
  </div>
</div>

@if (count($evento)>0)
<div class="table-responsive">
	<table class="table table-hover table-condensed">
		<thead>
			<tr>
				<th>ID</th>
        <th>Tipo de Evento</th>
        <th>Lugar</th>
        <th>Cedula Cliente</th>
        <th>Fecha Evento</th>
        <th>Hora Inicio</th>
        <th>Hora Fin</th>
        <th>Estatus</th>
        <th>Acción</th>
			</tr>
		</thead>
		<tbody>
			@foreach($evento as $eventos)
			<tr>
				@if($eventos->id<=9)
				<td><a href="{{ route('planificador.listaeventos.show',$eventos->id) }}">E00{{ $eventos->id }}</a></td>
				@elseif($eventos->id>9 and $eventos->id<99)
				<td><a href="{{ route('planificador.listaeventos.show',$eventos->id) }}">E0{{ $eventos->id }}</a></td>
				@endif
				<td>{{ $eventos->tipo_evento->name }}</td>
				<td>{{ $eventos->cotizacion->local->name }}</td>
				<td>{{ $eventos->cotizacion->cliente->cedula }}</td>
				<td>{{ $eventos->fecha_evento->toDateString() }}</td>
				<td>{{ $eventos->hora_inicio }}</td>
				<td>{{ $eventos->hora_fin }}</td>
				
				@if($eventos->estatus=="Pen")
				<td><span class="badge badge-danger">Pendiente</span></td>
				@elseif($eventos->estatus=="Pro")
				<td><span class="badge badge-primary">En Proceso</span></td>
				@elseif($eventos->estatus=="Pag")
				<td><span class="badge badge-success">Pagado</span></td>
				@elseif($eventos->estatus=="Pla")
				<td><span class="badge badge-info">Planificando</span></td>
				@elseif($eventos->estatus=="Org")
				<td><span class="badge badge-info">Organizando</span></td>
				@elseif($eventos->estatus=="Eje")
				<td><span class="badge badge-info">Ejecutando</span></td>
				@elseif($eventos->estatus=="Cer")
				<td><span class="badge badge-warning">Cerrado</span></td>
				@elseif($eventos->estatus=="Fin")
				<td><span class="badge badge-success">Finalizado</span></td>
				@else
				<td><span class="badge badge-primary">Sin estatus</span></td>
				@endif
				
				<td>
					@if(count($tarea)>0 && count($tarea)!=count($eventos->evento_tareas))
					<a class="btn btn-warning" href="{{ route('planificador.eventotareas.create2',$eventos->id)}}">Asginar Tareas</a>
					@endif
					<a class="btn btn-info" href="{{ route('planificador.listaeventos.edit',$eventos->id)}}">Cambiar Estatus</a>
				</td>
			</tr>
			@endforeach
		</tbody>
	</table>
</div>
@else
	<div class="jumbotron">
		<h1 class="text-center">No existen registros de Eventos con estatus "En Proceso" en nuestra Base de Datos</h1>
	</div>
	<div class="text-center">
		<a href="{{ URL::previous() }}" class="btn btn-default"><i class="fa fa-arrow-left" aria-hidden="true"></i>Regresar</a>
	</div>
@endif

@if(count($evento)>0)
	@if($ruta!=$fullruta)
		<div class="text-center">
			<a href="{{ URL::previous() }}" class="btn btn-default"><i class="fa fa-arrow-left" aria-hidden="true"></i>Regresar</a>
		</div>
	@endif
@endif

@endsection
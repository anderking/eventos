@extends ('admin.template.main')
<?php
  $ruta = Request::Url();
  $fullruta = Request::fullUrl();
?>
@section('title','Recepcionista-Evento')
@section('body_class','recepcionista_eventos_index')
@section('main_class','recepcionista_eventos_index')
@section('content')

<h1 class="text-center">Lista de Eventos</h1>

<div class="row">
  <div class="col-xs-12 col-sm-6 col-md-6 text-center">
		<a href="{{ route('recepcionista.eventos.create') }}" class="btn btn-primary">Nuevo Evento</a>
  </div>
  <div class="col-xs-12 col-sm-6 col-md-6 text-center">
  	{!! Form::open(array('route' => 'recepcionista.eventos.index','method' => 'GET','class'=>'navbar-form')) !!}
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
        <th>Cuota a Pagar</th>
        <th>Estatus</th>
        <th>Acción</th>
			</tr>
		</thead>
		<tbody>
			@foreach($evento as $eventos)
			<tr>
				@if($eventos->id<=9)
				<td><a href="{{ route('recepcionista.eventos.show',$eventos->id) }}">E00{{ $eventos->id }}</a></td>
				@elseif($eventos->id>9 and $eventos->id<99)
				<td><a href="{{ route('recepcionista.eventos.show',$eventos->id) }}">E0{{ $eventos->id }}</a></td>
				@endif
				<td>{{ $eventos->tipo_evento->name }}</td>
				<td>{{ $eventos->cotizacion->local->name }}</td>
				<td><a href="{{ route('recepcionista.clientes.show',$eventos->cotizacion->cliente->id) }}">{{ $eventos->cotizacion->cliente->cedula }}</a></td>
				<td>{{ $eventos->fecha_evento->toDateString() }}</td>
				<td>{{ $eventos->hora_inicio }}</td>
				<td>{{ $eventos->hora_fin }}</td>
				
				@if($configrecep)
					@if(count($eventos->pagos)>0)
					<td>{{ $eventos->nro_cuotas-count($eventos->pagos) }} Cuotas de:  {{ number_format( ($eventos->cotizacion->monto_presupuesto/$eventos->nro_cuotas)+($eventos->cotizacion->monto_presupuesto/$eventos->nro_cuotas)*$configrecep->porc_cuota, 2, '.', '') }} <b>{{ $config->moneda }}</b></td>
					@else
					<td>{{ $eventos->nro_cuotas }} Cuotas de: {{ number_format( ($eventos->cotizacion->monto_presupuesto/$eventos->nro_cuotas)+($eventos->cotizacion->monto_presupuesto/$eventos->nro_cuotas)*$configrecep->porc_cuota, 2, '.', '') }} <b>{{ $config->moneda }}</b></td>
					@endif
				@else
					@if(count($eventos->pagos)>0)
					<td>{{ $eventos->nro_cuotas-count($eventos->pagos) }} Cuotas de:  {{ number_format( ($eventos->cotizacion->monto_presupuesto/$eventos->nro_cuotas), 2, '.', '') }} <b>{{ $config->moneda }}</b></td>
					@else
					<td>{{ $eventos->nro_cuotas }} Cuotas de: {{ number_format( ($eventos->cotizacion->monto_presupuesto/$eventos->nro_cuotas), 2, '.', '') }} <b>{{ $config->moneda }}</b></td>
					@endif
				@endif
				
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
					@if(count($eventos->pagos)!=$eventos->nro_cuotas)
					<a class="btn btn-warning" href="{{ route('recepcionista.pagos.create2',$eventos->id)}}">Pagar Cuotas</a>
					@endif
					<a class="btn btn-info" href="{{ route('recepcionista.eventos.edit',$eventos->id)}}">Modificar</a>
					<a class="btn btn-danger" href="#" data-toggle="modal" data-target="#modal-delete-eventos-{{$eventos->id}}"><b>Eliminar</b>
				</td>
			</tr>
			@include('recepcionista.template.partials.modal-delete-eventos')
			@endforeach
		</tbody>
	</table>
</div>
@else
	<div class="jumbotron">
		<h1 class="text-center">No existen registros de Eventos en nuestra Base de Datos</h1>
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
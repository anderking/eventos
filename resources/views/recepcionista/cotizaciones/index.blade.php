@extends ('admin.template.main')
<?php
  $ruta = Request::Url();
  $fullruta = Request::fullUrl();
?>
@section('title','Recepcionista-Cotización')
@section('body_class','recepcionista_cotizaciones_index')
@section('main_class','recepcionista_cotizaciones_index')
@section('content')

<h1 class="text-center">Lista de Cotizaciones</h1>

<div class="row">
  <div class="col-xs-12 col-sm-6 col-md-6 text-center">
		<a href="{{ route('recepcionista.cotizaciones.create') }}" class="btn btn-primary">Nueva Cotización</a>
  </div>
  <div class="col-xs-12 col-sm-6 col-md-6 text-center">
  	{!! Form::open(array('route' => 'recepcionista.cotizaciones.index','method' => 'GET','class'=>'navbar-form')) !!}
    <div class="input-group">
      {!! Form::text('id', null, ['class'=>'form-control','placeholder'=>'Buscar...','aria-describedby'=>'search','required']) !!}
      <span class="input-group-btn" >
        <button class="btn btn-info" type="submit"><i class="fa fa-search"></i></button>
      </span>
    </div>
    {!! Form::close() !!}
  </div>
</div>

@if (count($cotizacion)>0)
<div class="table-responsive">
	<table class="table table-hover table-condensed">
		<thead>
			<tr>
				<th>ID</th>
        <th>Cedula Solicitante</th>
        <th>Nombres Solicitante</th>
        <th>Apellidos Solicitante</th>
        <th>Descripción</th>
        <th>Monto Presupuesto</th>
        <th>Estatus</th>
        <th>Acción</th>
			</tr>
		</thead>
		<tbody>
			@foreach($cotizacion as $cotizaciones)
			<tr>
				@if($cotizaciones->id<=9)
				<td><a href="{{ route('recepcionista.cotizaciones.show',$cotizaciones->id) }}">CZ00{{ $cotizaciones->id }}</a></td>
				@elseif($cotizaciones->id>9 and $cotizaciones->id<99)
				<td><a href="{{ route('recepcionista.cotizaciones.show',$cotizaciones->id) }}">CZ0{{ $cotizaciones->id }}</a></td>
				@endif
				<td>{{ $cotizaciones->cliente->cedula }}</td>
				<td>{{ $cotizaciones->cliente->name }}</td>
				<td>{{ $cotizaciones->cliente->apellido }}</td>
				<td>{{ $cotizaciones->descripcion }}</td>
				<td>{{ $cotizaciones->monto_presupuesto }} <b>{{ $config->moneda}}</b></td>
				@if($cotizaciones->estatus=="P")
				<td><span class="badge badge-danger">Pendiente</span></td>
				@elseif($cotizaciones->estatus=="C")
				<td><span class="badge badge-info">Confirmada</span></td>
				@elseif($cotizaciones->estatus=="A")
				<td><span class="badge badge-success">Asignada</span></td>
				@else
				<td><span class="badge badge-primary">Sin estatus</span></td>
				@endif
				<td>
					@if($cotizaciones->estatus!="A")
					<a class="btn btn-info" href="{{ route('recepcionista.cotizaciones.edit',$cotizaciones->id)}}">Modificar</a>
					@endif
					<a class="btn btn-danger" href="#" data-toggle="modal" data-target="#modal-delete-cotizaciones-{{$cotizaciones->id}}"><b>Eliminar</b>
				</td>
			</tr>
			@include('recepcionista.template.partials.modal-delete-cotizaciones')
			@endforeach
		</tbody>
	</table>
</div>
@else
	<div class="jumbotron">
		<h1 class="text-center">No existen registros de Cotizaciones en nuestra Base de Datos</h1>
	</div>
	<div class="text-center">
		<a href="{{ URL::previous() }}" class="btn btn-default"><i class="fa fa-arrow-left" aria-hidden="true"></i>Regresar</a>
	</div>
@endif

@if(count($cotizacion)>0)
	@if($ruta!=$fullruta)
		<div class="text-center">
			<a href="{{ URL::previous() }}" class="btn btn-default"><i class="fa fa-arrow-left" aria-hidden="true"></i>Regresar</a>
		</div>
	@endif
@endif

@endsection
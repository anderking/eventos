@extends ('admin.template.main')
<?php
  $ruta = Request::Url();
  $fullruta = Request::fullUrl();
?>
@section('title','Recepcionista-Pago')
@section('body_class','recepcionista_pagos_index')
@section('main_class','recepcionista_pagos_index')
@section('content')

<h1 class="text-center">Lista de Pagos</h1>

<div class="row">
  <div class="col-xs-12 col-sm-6 col-md-6 text-center">
		<!--<a href="#" class="btn btn-primary">Nuevo Pago</a>-->
  </div>
  <div class="col-xs-12 col-sm-6 col-md-6 text-center">
  	{!! Form::open(array('route' => 'recepcionista.pagos.index','method' => 'GET','class'=>'navbar-form')) !!}
    <div class="input-group">
      {!! Form::text('referencia_bancaria', null, ['class'=>'form-control','placeholder'=>'Buscar...','aria-describedby'=>'search','required']) !!}
      <span class="input-group-btn" >
        <button class="btn btn-info" type="submit"><i class="fa fa-search"></i></button>
      </span>
    </div>
    {!! Form::close() !!}
  </div>
</div>

@if (count($pago)>0)
<div class="table-responsive">
	<table class="table table-hover table-condensed">
		<thead>
			<tr>
				<th>ID</th>
        <th>Evento</th>
        <th>Nro Referencia</th>
        <th>Fecha del Pago</th>
        <th>Importe</th>
        <th>Metodo de Pago</th>
        <th>Descripción</th>
        <th>Estatus</th>
        <th>Acción</th>
			</tr>
		</thead>
		<tbody>
			@foreach($pago as $pagos)
			<tr>
				@if($pagos->id<=9)
				<td><a href="{{ route('recepcionista.pagos.show',$pagos->id) }}">PG00{{ $pagos->id }}</a></td>
				@elseif($pagos->id>9 and $pagos->id<=99)
				<td><a href="{{ route('recepcionista.pagos.show',$pagos->id) }}">PG0{{ $pagos->id }}</a></td>
				@endif
				@if($pagos->evento_id<=9)
				<td><a href="{{ route('recepcionista.eventos.show',$pagos->evento_id) }}">E00{{ $pagos->evento_id }}</a></td>
				@elseif($pagos->evento_id>9 and $pagos->evento_id<=99)
				<td><a href="{{ route('recepcionista.eventos.show',$pagos->evento_id) }}">E0{{ $pagos->evento_id }}</a></td>
				@endif
				<td>{{ $pagos->referencia_bancaria }}</td>
				<td>{{ $pagos->fecha_pago->toDateString() }}</td>
				<td>{{ $pagos->importe }} <b>{{ $config->moneda }}</b></td>
				<td>{{ $pagos->metodo_pago }}</td>
				<td>{{ $pagos->descripcion }}</td>
				@if($pagos->estatus=="Pen")
				<td><span class="badge badge-danger">Pendiente</span></td>
				@elseif($pagos->estatus=="Pag")
				<td><span class="badge badge-success">Pagado</span></td>
				@else
				<td><span class="badge badge-primary">Sin estatus</span></td>
				@endif
				<td>
					<a class="btn btn-info" href="{{ route('recepcionista.pagos.edit',$pagos->id)}}">Modificar</a>
					<a class="btn btn-danger" href="#" data-toggle="modal" data-target="#modal-delete-pagos-{{$pagos->id}}"><b>Eliminar</b>
				</td>
			</tr>
			@include('recepcionista.template.partials.modal-delete-pagos')
			@endforeach
		</tbody>
	</table>
</div>
@else
	<div class="jumbotron">
		<h1 class="text-center">No existen registros de Pagos en nuestra Base de Datos</h1>
	</div>
	<div class="text-center">
		<a href="{{ URL::previous() }}" class="btn btn-default"><i class="fa fa-arrow-left" aria-hidden="true"></i>Regresar</a>
	</div>
@endif

@if(count($pago)>0)
	@if($ruta!=$fullruta)
		<div class="text-center">
			<a href="{{ URL::previous() }}" class="btn btn-default"><i class="fa fa-arrow-left" aria-hidden="true"></i>Regresar</a>
		</div>
	@endif
@endif

@endsection
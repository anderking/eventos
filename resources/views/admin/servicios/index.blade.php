@extends ('admin.template.main')
<?php
  $ruta = Request::Url();
  $fullruta = Request::fullUrl();
?>
@section('title','Admin-Servicio')
@section('body_class','admin_servicios_index')
@section('main_class','admin_servicios_index')
@section('content')

<h1 class="text-center">Lista de Servicios</h1>

<div class="row">
  <div class="col-xs-12 col-sm-6 col-md-6 text-center">
		<a href="{{ route('admin.servicios.create') }}" class="btn btn-primary">Nuevo Servicio</a>
  </div>
  <div class="col-xs-12 col-sm-6 col-md-6 text-center">
  	{!! Form::open(array('route' => 'admin.servicios.index','method' => 'GET','class'=>'navbar-form')) !!}
    <div class="input-group">
      {!! Form::text('id', null, ['class'=>'form-control','placeholder'=>'Buscar...','aria-describedby'=>'search','required']) !!}
      <span class="input-group-btn" >
        <button class="btn btn-info" type="submit"><i class="fa fa-search"></i></button>
      </span>
    </div>
    {!! Form::close() !!}
  </div>
</div>

@if (count($servicio)>0)
<div class="table-responsive">
	<table class="table table-hover table-condensed">
		<thead>
			<tr>
				<th>ID</th>
				<th>Tipo Servicio</th>
        <th>Nombre</th>
        <th>Descripcion</th>
        <th>Acción</th>
			</tr>
		</thead>
		<tbody>
			@foreach($servicio as $servicios)
			<tr>
				@if($servicios->id<=9)
				<td><a href="{{ route('admin.servicios.show',$servicios->id) }}">S00{{ $servicios->id }}</a></td>
				@elseif($servicios->id>9 and $servicios->id<=99)
				<td><a href="{{ route('admin.servicios.show',$servicios->id) }}">S0{{ $servicios->id }}</a></td>
				@endif
				<td><a href="{{ route('admin.tiposervicios.show',$servicios->tipo_servicio->id) }}">{{ $servicios->tipo_servicio->name }}</a></td>
				<td>{{ $servicios->name }}</td>
				<td>{{ $servicios->descripcion }}</td>
				<td>
					<a class="btn btn-info" href="{{ route('admin.servicios.edit',$servicios->id)}}">Modificar</a>
					<a class="btn btn-danger" href="#" data-toggle="modal" data-target="#modal-delete-servicios-{{$servicios->id}}"><b>Eliminar</b>
				</td>
			</tr>
			@include('admin.template.partials.modal-delete-servicios')
			@endforeach
		</tbody>
	</table>
</div>
@else
	<div class="jumbotron">
		<h1 class="text-center">No existen registros de Servicios en nuestra Base de Datos</h1>
	</div>
	<div class="text-center">
		<a href="{{ URL::previous() }}" class="btn btn-default"><i class="fa fa-arrow-left" aria-hidden="true"></i>Regresar</a>
	</div>
@endif

@if(count($servicio)>0)
	@if($ruta!=$fullruta)
		<div class="text-center">
			<a href="{{ URL::previous() }}" class="btn btn-default"><i class="fa fa-arrow-left" aria-hidden="true"></i>Regresar</a>
		</div>
	@endif
@endif

@endsection
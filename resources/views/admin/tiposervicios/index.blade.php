@extends ('admin.template.main')
<?php
  $ruta = Request::Url();
  $fullruta = Request::fullUrl();
?>
@section('title','Admin-TipoServicio')
@section('body_class','admin_tiposervicios_index')
@section('main_class','admin_tiposervicios_index')
@section('content')

<h1 class="text-center">Lista de Tipo de Servicios</h1>

<div class="row">
  <div class="col-xs-12 col-sm-6 col-md-6 text-center">
		<a href="{{ route('admin.tiposervicios.create') }}" class="btn btn-primary">Nuevo Tipo Servicio</a>
  </div>
  <div class="col-xs-12 col-sm-6 col-md-6 text-center">
  	{!! Form::open(array('route' => 'admin.tiposervicios.index','method' => 'GET','class'=>'navbar-form')) !!}
    <div class="input-group">
      {!! Form::text('id', null, ['class'=>'form-control','placeholder'=>'Buscar...','aria-describedby'=>'search','required']) !!}
      <span class="input-group-btn" >
        <button class="btn btn-info" type="submit"><i class="fa fa-search"></i></button>
      </span>
    </div>
    {!! Form::close() !!}
  </div>
</div>

@if (count($tiposervicio)>0)
<div class="table-responsive">
	<table class="table table-hover table-condensed">
		<thead>
			<tr>
				<th>ID</th>
        <th>Nombre</th>
        <th>Descripcion</th>
        <th>Acción</th>
			</tr>
		</thead>
		<tbody>
			@foreach($tiposervicio as $tiposervicios)
			<tr>
				@if($tiposervicios->id<=9)
				<td><a href="{{ route('admin.tiposervicios.show',$tiposervicios->id) }}">TS00{{ $tiposervicios->id }}</a></td>
				@elseif($tiposervicios->id>9 and $tiposervicios->id<=99)
				<td><a href="{{ route('admin.tiposervicios.show',$tiposervicios->id) }}">TS0{{ $tiposervicios->id }}</a></td>
				@endif
				<td>{{ $tiposervicios->name }}</td>
				<td>{{ $tiposervicios->descripcion }}</td>
				<td>
					<a class="btn btn-info" href="{{ route('admin.tiposervicios.edit',$tiposervicios->id)}}">Modificar</a>
					<a class="btn btn-danger" href="#" data-toggle="modal" data-target="#modal-delete-tiposervicios-{{$tiposervicios->id}}"><b>Eliminar</b>
				</td>
			</tr>
			@include('admin.template.partials.modal-delete-tiposervicios')
			@endforeach
		</tbody>
	</table>
</div>
@else
	<div class="jumbotron">
		<h1 class="text-center">No existen registros de Tipo de Servicios en nuestra Base de Datos</h1>
	</div>
	<div class="text-center">
		<a href="{{ URL::previous() }}" class="btn btn-default"><i class="fa fa-arrow-left" aria-hidden="true"></i>Regresar</a>
	</div>
@endif

@if(count($tiposervicio)>0)
	@if($ruta!=$fullruta)
		<div class="text-center">
			<a href="{{ URL::previous() }}" class="btn btn-default"><i class="fa fa-arrow-left" aria-hidden="true"></i>Regresar</a>
		</div>
	@endif
@endif

@endsection
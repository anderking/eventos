@extends ('admin.template.main')
<?php
  $ruta = Request::Url();
  $fullruta = Request::fullUrl();
?>
@section('title','Admin-Local')
@section('body_class','admin_locales_index')
@section('main_class','admin_locales_index')
@section('content')

<h1 class="text-center">Lista de Locales</h1>

<div class="row">
  <div class="col-xs-12 col-sm-6 col-md-6 text-center">
		<a href="{{route('admin.locales.create') }}" class="btn btn-primary">Nuevo Local</a>
  </div>
  <div class="col-xs-12 col-sm-6 col-md-6 text-center">
  	{!! Form::open(array('route' => 'admin.locales.index','method' => 'GET','class'=>'navbar-form')) !!}
    <div class="input-group">
      {!! Form::text('id', null, ['class'=>'form-control','placeholder'=>'Buscar...','aria-describedby'=>'search','required']) !!}
      <span class="input-group-btn" >
        <button class="btn btn-info" type="submit"><i class="fa fa-search"></i></button>
      </span>
    </div>
    {!! Form::close() !!}
  </div>
</div>

@if (count($local)>0)
<div class="table-responsive">
	<table class="table table-hover table-condensed">
		<thead>
			<tr>
				<th>ID</th>
        <th>Tipo Local</th>
        <th>Nombre</th>
        <th>Dirección</th>
        <th>Capacidad</th>
        <th>Telefono Oficina</th>
        <th>Precio Alquiler</th>
        <th>Precio Venta</th>
        <th>Acción</th>
			</tr>
		</thead>
		<tbody>
			@foreach($local as $locales)
			<tr>
				@if($locales->id<=9)
				<td><a href="{{ route('admin.locales.show',$locales->id) }}">L00{{ $locales->id }}</a></td>
				@elseif($locales->id>9 and $locales->id<=99)
				<td><a href="{{ route('admin.locales.show',$locales->id) }}">L0{{ $locales->id }}</a></td>
				@endif
				<td><a href="{{ route('admin.tipolocales.show',$locales->tipo_local->id) }}">{{ $locales->tipo_local->name }}</a></td>
				<td>{{ $locales->name }}</td>
				<td>{{ $locales->direccion }}</td>
				<td>{{ $locales->capacidad }}</td>
				<td>{{ $locales->telefono_ofic }}</td>
				<td>{{ $locales->precio_alquiler }}</td>
				<td>{{ $locales->precio_venta }}</td>
				<td>
					<a class="btn btn-info" href="{{ route('admin.locales.edit',$locales->id)}}">Modificar</a>
					<a class="btn btn-danger" href="#" data-toggle="modal" data-target="#modal-delete-locales-{{$locales->id}}"><b>Eliminar</b>
				</td>
			</tr>
			@include('admin.template.partials.modal-delete-locales')
			@endforeach
		</tbody>
	</table>
</div>
@else
	<div class="jumbotron">
		<h1 class="text-center">No existen registros de Locales en nuestra Base de Datos</h1>
	</div>
	<div class="text-center">
		<a href="{{ URL::previous() }}" class="btn btn-default"><i class="fa fa-arrow-left" aria-hidden="true"></i>Regresar</a>
	</div>
@endif

@if(count($local)>0)
	@if($ruta!=$fullruta)
		<div class="text-center">
			<a href="{{ URL::previous() }}" class="btn btn-default"><i class="fa fa-arrow-left" aria-hidden="true"></i>Regresar</a>
		</div>
	@endif
@endif

@endsection
@extends ('admin.template.main')
<?php
  $ruta = Request::Url();
  $fullruta = Request::fullUrl();
?>
@section('title','Admin-TipoLocal')
@section('body_class','admin_tipolocales_index')
@section('main_class','admin_tipolocales_index')
@section('content')

<h1 class="text-center">Lista de Tipo de Locales</h1>

<div class="row">
  <div class="col-xs-12 col-sm-6 col-md-6 text-center">
		<a href="{{ route('admin.tipolocales.create') }}" class="btn btn-primary">Nuevo Tipo Local</a>
  </div>
  <div class="col-xs-12 col-sm-6 col-md-6 text-center">
  	{!! Form::open(array('route' => 'admin.tipolocales.index','method' => 'GET','class'=>'navbar-form')) !!}
    <div class="input-group">
      {!! Form::text('id', null, ['class'=>'form-control','placeholder'=>'Buscar...','aria-describedby'=>'search','required']) !!}
      <span class="input-group-btn" >
        <button class="btn btn-info" type="submit"><i class="fa fa-search"></i></button>
      </span>
    </div>
    {!! Form::close() !!}
  </div>
</div>

@if (count($tipolocal)>0)
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
			@foreach($tipolocal as $tipolocales)
			<tr>
				@if($tipolocales->id<=9)
				<td><a href="{{ route('admin.tipolocales.show',$tipolocales->id) }}">TL00{{ $tipolocales->id }}</a></td>
				@elseif($tipolocales->id>9 and $tipolocales->id<=99)
				<td><a href="{{ route('admin.tipolocales.show',$tipolocales->id) }}">TL0{{ $tipolocales->id }}</a></td>
				@endif
				<td>{{ $tipolocales->name }}</td>
				<td>{{ $tipolocales->descripcion }}</td>
				<td>
					<a class="btn btn-info" href="{{ route('admin.tipolocales.edit',$tipolocales->id)}}">Modificar</a>
					<a class="btn btn-danger" href="#" data-toggle="modal" data-target="#modal-delete-tipolocales-{{$tipolocales->id}}"><b>Eliminar</b>
				</td>
			</tr>
			@include('admin.template.partials.modal-delete-tipolocales')
			@endforeach
		</tbody>
	</table>
</div>
@else
	<div class="jumbotron">
		<h1 class="text-center">No existen registros de Tipo de Locales en nuestra Base de Datos</h1>
	</div>
	<div class="text-center">
		<a href="{{ URL::previous() }}" class="btn btn-default"><i class="fa fa-arrow-left" aria-hidden="true"></i>Regresar</a>
	</div>
@endif

@if(count($tipolocal)>0)
	@if($ruta!=$fullruta)
		<div class="text-center">
			<a href="{{ URL::previous() }}" class="btn btn-default"><i class="fa fa-arrow-left" aria-hidden="true"></i>Regresar</a>
		</div>
	@endif
@endif

@endsection
@extends ('admin.template.main')
<?php
  $ruta = Request::Url();
  $fullruta = Request::fullUrl();
?>
@section('title','Admin-TipoComite')
@section('body_class','admin_tipocomites_index')
@section('main_class','admin_tipocomites_index')
@section('content')

<h1 class="text-center">Lista de Tipo de Comités</h1>

<div class="row">
  <div class="col-xs-12 col-sm-6 col-md-6 text-center">
		<a href="{{ route('admin.tipocomites.create') }}" class="btn btn-primary">Nuevo Tipo Comité</a>
  </div>
  <div class="col-xs-12 col-sm-6 col-md-6 text-center">
  	{!! Form::open(array('route' => 'admin.tipocomites.index','method' => 'GET','class'=>'navbar-form')) !!}
    <div class="input-group">
      {!! Form::text('id', null, ['class'=>'form-control','placeholder'=>'Buscar...','aria-describedby'=>'search','required']) !!}
      <span class="input-group-btn" >
        <button class="btn btn-info" type="submit"><i class="fa fa-search"></i></button>
      </span>
    </div>
    {!! Form::close() !!}
  </div>
</div>

@if (count($tipocomite)>0)
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
			@foreach($tipocomite as $tipocomites)
			<tr>
				@if($tipocomites->id<=9)
				<td><a href="{{ route('admin.tipocomites.show',$tipocomites->id) }}">TCO00{{ $tipocomites->id }}</a></td>
				@elseif($tipocomites->id>9 and $tipocomites->id<=99)
				<td><a href="{{ route('admin.tipocomites.show',$tipocomites->id) }}">TCO0{{ $tipocomites->id }}</a></td>
				@endif
				<td>{{ $tipocomites->name }}</td>
				<td>{{ $tipocomites->descripcion }}</td>
				<td>
					<a class="btn btn-info" href="{{ route('admin.tipocomites.edit',$tipocomites->id)}}">Modificar</a>
					<a class="btn btn-danger" href="#" data-toggle="modal" data-target="#modal-delete-tipocomites-{{$tipocomites->id}}"><b>Eliminar</b>
				</td>
			</tr>
			@include('admin.template.partials.modal-delete-tipocomites')
			@endforeach
		</tbody>
	</table>
</div>
@else
	<div class="jumbotron">
		<h1 class="text-center">No existen registros de Tipo de Comités en nuestra Base de Datos</h1>
	</div>
	<div class="text-center">
		<a href="{{ URL::previous() }}" class="btn btn-default"><i class="fa fa-arrow-left" aria-hidden="true"></i>Regresar</a>
	</div>
@endif

@if(count($tipocomite)>0)
	@if($ruta!=$fullruta)
		<div class="text-center">
			<a href="{{ URL::previous() }}" class="btn btn-default"><i class="fa fa-arrow-left" aria-hidden="true"></i>Regresar</a>
		</div>
	@endif
@endif

@endsection
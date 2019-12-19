@extends ('admin.template.main')
<?php
  $ruta = Request::Url();
  $fullruta = Request::fullUrl();
?>
@section('title','Admin-Comite')
@section('body_class','admin_comites_index')
@section('main_class','admin_comites_index')
@section('content')

<h1 class="text-center">Lista de Comités</h1>

<div class="row">
  <div class="col-xs-12 col-sm-6 col-md-6 text-center">
		<a href="{{ route('admin.comites.create') }}" class="btn btn-primary">Nuevo Comite</a>
  </div>
  <div class="col-xs-12 col-sm-6 col-md-6 text-center">
  	{!! Form::open(array('route' => 'admin.comites.index','method' => 'GET','class'=>'navbar-form')) !!}
    <div class="input-group">
      {!! Form::text('id', null, ['class'=>'form-control','placeholder'=>'Buscar...','aria-describedby'=>'search','required']) !!}
      <span class="input-group-btn" >
        <button class="btn btn-info" type="submit"><i class="fa fa-search"></i></button>
      </span>
    </div>
    {!! Form::close() !!}
  </div>
</div>

@if (count($comite)>0)
<div class="table-responsive">
	<table class="table table-hover table-condensed">
		<thead>
			<tr>
				<th>ID</th>
				<th>Tipo</th>
        <th>Nombre</th>
        <th>Descripcion</th>
        <th>Acción</th>
			</tr>
		</thead>
		<tbody>
			@foreach($comite as $comites)
			<tr>
				@if($comites->id<=9)
				<td><a href="{{ route('admin.comites.show',$comites->id) }}">C00{{ $comites->id }}</a></td>
				@elseif($comites->id>9 and $comites->id<=99)
				<td><a href="{{ route('admin.comites.show',$comites->id) }}">C0{{ $comites->id }}</a></td>
				@endif
				<td>{{ $comites->tipo}}</td>
				<td>{{ $comites->name }}</td>
				<td>{{ $comites->descripcion }}</td>
				<td>
					<a class="btn btn-info" href="{{ route('admin.comites.edit',$comites->id)}}">Modificar</a>
					<a class="btn btn-danger" href="#" data-toggle="modal" data-target="#modal-delete-comites-{{$comites->id}}"><b>Eliminar</b>
				</td>
			</tr>
			@include('admin.template.partials.modal-delete-comites')
			@endforeach
		</tbody>
	</table>
</div>
@else
	<div class="jumbotron">
		<h1 class="text-center">No existen registros de Comités en nuestra Base de Datos</h1>
	</div>
	<div class="text-center">
		<a href="{{ URL::previous() }}" class="btn btn-default"><i class="fa fa-arrow-left" aria-hidden="true"></i>Regresar</a>
	</div>
@endif

@if(count($comite)>0)
	@if($ruta!=$fullruta)
		<div class="text-center">
			<a href="{{ URL::previous() }}" class="btn btn-default"><i class="fa fa-arrow-left" aria-hidden="true"></i>Regresar</a>
		</div>
	@endif
@endif

@endsection
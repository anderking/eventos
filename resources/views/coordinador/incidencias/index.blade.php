@extends ('admin.template.main')
<?php
  $ruta = Request::Url();
  $fullruta = Request::fullUrl();
?>
@section('title','Coordinador-Incidencias')
@section('body_class','coordinador_incidencias_index')
@section('main_class','coordinador_incidencias_index')
@section('content')

<h1 class="text-center">Lista de Incidencias</h1>

<div class="row">
  <div class="col-xs-12 col-sm-12 col-md-12 text-center">
  	{!! Form::open(array('route' => 'coordinador.incidencias.index','method' => 'GET','class'=>'navbar-form')) !!}
    <div class="input-group">
      {!! Form::text('cedula_resp', null, ['class'=>'form-control','placeholder'=>'Buscar...','aria-describedby'=>'search','required']) !!}
      <span class="input-group-btn" >
        <button class="btn btn-info" type="submit"><i class="fa fa-search"></i></button>
      </span>
    </div>
    {!! Form::close() !!}
  </div>
</div>

@if (count($incidencia)>0)
<div class="table-responsive">
	<table class="table table-hover table-condensed">
		<thead>
			<tr>
				<th>ID</th>
        <th>Tipo</th>
        <th>Nombre</th>
        <th>Descripción</th>
        <th>Acción</th>
			</tr>
		</thead>
		<tbody>
			@foreach($incidencia as $incidencias)
			<tr>
				@if($incidencias->id<=9)
				<td><a href="{{ route('coordinador.incidencias.show',$incidencias->id) }}">TR00{{ $incidencias->id }}</a></td>
				@elseif($incidencias->id>9 and $incidencias->id<=99)
				<td><a href="{{ route('coordinador.incidencias.show',$incidencias->id) }}">TR0{{ $incidencias->id }}</a></td>
				@endif
				<td>{{ $incidencias->tipo }}</td>
				<td>{{ $incidencias->name }}</td>
				<td>{{ $incidencias->descripcion }}</td>
				<td>
					<a class="btn btn-info" href="{{ route('coordinador.incidencias.edit',$incidencias->id)}}">Modificar</a>
					<a class="btn btn-danger" href="#" data-toggle="modal" data-target="#modal-delete-tareas-{{$incidencias->id}}"><b>Eliminar</b>
				</td>
			</tr>
			@include('planificador.template.partials.modal-delete-tareas')
			@endforeach
		</tbody>
	</table>
</div>
@else
	<div class="jumbotron">
		<h1 class="text-center">No existen registros de Incidencias en nuestra Base de Datos</h1>
	</div>
	<div class="text-center">
		<a href="{{ URL::previous() }}" class="btn btn-default"><i class="fa fa-arrow-left" aria-hidden="true"></i>Regresar</a>
	</div>
@endif

@if(count($incidencia)>0)
	@if($ruta!=$fullruta)
		<div class="text-center">
			<a href="{{ URL::previous() }}" class="btn btn-default"><i class="fa fa-arrow-left" aria-hidden="true"></i>Regresar</a>
		</div>
	@endif
@endif

@endsection
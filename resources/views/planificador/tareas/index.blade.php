@extends ('admin.template.main')
<?php
  $ruta = Request::Url();
  $fullruta = Request::fullUrl();
?>
@section('title','Planificador-Tarea')
@section('body_class','planificador_eventotareas_index')
@section('main_class','planificador_eventotareas_index')
@section('content')

<h1 class="text-center">Lista de Tareas</h1>

<div class="row">
  <div class="col-xs-12 col-sm-6 col-md-6 text-center">
		<a href="{{ route('planificador.tareas.create') }}" class="btn btn-primary">Nueva Tarea</a>
  </div>
  <div class="col-xs-12 col-sm-6 col-md-6 text-center">
  	{!! Form::open(array('route' => 'planificador.tareas.index','method' => 'GET','class'=>'navbar-form')) !!}
    <div class="input-group">
      {!! Form::text('id', null, ['class'=>'form-control','placeholder'=>'Buscar...','aria-describedby'=>'search','required']) !!}
      <span class="input-group-btn" >
        <button class="btn btn-info" type="submit"><i class="fa fa-search"></i></button>
      </span>
    </div>
    {!! Form::close() !!}
  </div>
</div>

@if (count($tarea)>0)
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
			@foreach($tarea as $tareas)
			<tr>
				@if($tareas->id<=9)
				<td><a href="{{ route('planificador.tareas.show',$tareas->id) }}">TR00{{ $tareas->id }}</a></td>
				@elseif($tareas->id>9 and $tareas->id<=99)
				<td><a href="{{ route('planificador.tareas.show',$tareas->id) }}">TR0{{ $tareas->id }}</a></td>
				@endif
				<td>{{ $tareas->tipo_tarea->name }}</td>
				<td>{{ $tareas->name }}</td>
				<td>{{ $tareas->descripcion }}</td>
				<td>
					<a class="btn btn-info" href="{{ route('planificador.tareas.edit',$tareas->id)}}">Modificar</a>
					<a class="btn btn-danger" href="#" data-toggle="modal" data-target="#modal-delete-tareas-{{$tareas->id}}"><b>Eliminar</b>
				</td>
			</tr>
			@include('planificador.template.partials.modal-delete-tareas')
			@endforeach
		</tbody>
	</table>
</div>
@else
	<div class="jumbotron">
		<h1 class="text-center">No existen registros de Tareas en nuestra Base de Datos</h1>
	</div>
	<div class="text-center">
		<a href="{{ URL::previous() }}" class="btn btn-default"><i class="fa fa-arrow-left" aria-hidden="true"></i>Regresar</a>
	</div>
@endif

@if(count($tarea)>0)
	@if($ruta!=$fullruta)
		<div class="text-center">
			<a href="{{ URL::previous() }}" class="btn btn-default"><i class="fa fa-arrow-left" aria-hidden="true"></i>Regresar</a>
		</div>
	@endif
@endif

@endsection
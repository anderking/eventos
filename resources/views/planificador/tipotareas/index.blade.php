@extends ('admin.template.main')
<?php
  $ruta = Request::Url();
  $fullruta = Request::fullUrl();
?>
@section('title','Planificador-TipoTarea')
@section('body_class','planificador_tipotareas_index')
@section('main_class','planificador_tipotareas_index')
@section('content')

<h1 class="text-center">Lista de Tipo de Tareas</h1>

<div class="row">
  <div class="col-xs-12 col-sm-6 col-md-6 text-center">
		<a href="{{ route('planificador.tipotareas.create') }}" class="btn btn-primary">Nuevo Tipo Tarea</a>
  </div>
  <div class="col-xs-12 col-sm-6 col-md-6 text-center">
  	{!! Form::open(array('route' => 'planificador.tipotareas.index','method' => 'GET','class'=>'navbar-form')) !!}
    <div class="input-group">
      {!! Form::text('id', null, ['class'=>'form-control','placeholder'=>'Buscar...','aria-describedby'=>'search','required']) !!}
      <span class="input-group-btn" >
        <button class="btn btn-info" type="submit"><i class="fa fa-search"></i></button>
      </span>
    </div>
    {!! Form::close() !!}
  </div>
</div>

@if (count($tipotarea)>0)
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
			@foreach($tipotarea as $tipotareas)
			<tr>
				@if($tipotareas->id<9)
				<td><a href="{{ route('planificador.tipotareas.show',$tipotareas->id) }}">TTA00{{ $tipotareas->id }}</a></td>
				@elseif($tipotareas->id>9 and $tipotareas->id<99)
				<td><a href="{{ route('planificador.tipotareas.show',$tipotareas->id) }}">TTA0{{ $tipotareas->id }}</a></td>
				@endif
				<td>{{ $tipotareas->name }}</td>
				<td>{{ $tipotareas->descripcion }}</td>
				<td>
					<a class="btn btn-info" href="{{ route('planificador.tipotareas.edit',$tipotareas->id)}}">Modificar</a>
					<a class="btn btn-danger" href="#" data-toggle="modal" data-target="#modal-delete-tipotareas-{{$tipotareas->id}}"><b>Eliminar</b>
				</td>
			</tr>
			@include('planificador.template.partials.modal-delete-tipotareas')
			@endforeach
		</tbody>
	</table>
</div>
@else
	<div class="jumbotron">
		<h1 class="text-center">No existen registros de Tipo de Tarea en nuestra Base de Datos</h1>
	</div>
	<div class="text-center">
		<a href="{{ URL::previous() }}" class="btn btn-default"><i class="fa fa-arrow-left" aria-hidden="true"></i>Regresar</a>
	</div>
@endif

@if(count($tipotarea)>0)
	@if($ruta!=$fullruta)
		<div class="text-center">
			<a href="{{ URL::previous() }}" class="btn btn-default"><i class="fa fa-arrow-left" aria-hidden="true"></i>Regresar</a>
		</div>
	@endif
@endif

@endsection
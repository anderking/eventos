@extends ('admin.template.main')
<?php
  $ruta = Request::Url();
  $fullruta = Request::fullUrl();
?>
@section('title','Coordinador-DesignacionTarea')
@section('body_class','coordinador_designaciontareas_index')
@section('main_class','coordinador_designaciontareas_index')
@section('content')

<h1 class="text-center">Lista de Tareas Asignadas por Comité</h1>

<div class="row">
  <div class="col-xs-12 col-sm-12 col-md-12 text-center">
  	{!! Form::open(array('route' => 'coordinador.designaciontareas.index','method' => 'GET','class'=>'navbar-form')) !!}
    <div class="input-group">
      {!! Form::text('id', null, ['class'=>'form-control','placeholder'=>'Buscar...','aria-describedby'=>'search','required']) !!}
      <span class="input-group-btn" >
        <button class="btn btn-info" type="submit"><i class="fa fa-search"></i></button>
      </span>
    </div>
    {!! Form::close() !!}
  </div>
</div>

@if (count($designaciontarea)>0)
<div class="table-responsive">
	<table class="table table-hover table-condensed">
		<thead>
			<tr>
				<th>ID</th>
        <th>Comite</th>
        <th>Cantidad de Usuarios</th>
        <th>Fecha de creación</th>
			</tr>
		</thead>
		<tbody>
			@foreach($designaciontarea as $designaciontareas)
			<tr>
				@if($designaciontareas->id<=9)
				<td><!--<a href="{{ route('coordinador.designaciontareas.show',$designaciontareas->id) }}">-->DET00{{ $designaciontareas->id }}</td>
				@elseif($designaciontareas->id>9 and $designaciontareas->id<99)
				<td><!--<a href="{{ route('coordinador.designaciontareas.show',$designaciontareas->id) }}">-->DET0{{ $designaciontareas->id }}</td>
				@endif
				<td>{{ $designaciontareas->comite->name }}</td>
				<td>{{ count($designaciontareas->comite->users) }}</td>
				<td>{{ $designaciontareas->created_at->toDateString() }}</td>
				<!--<td>
					<a class="btn btn-info" href="{{ route('coordinador.designaciontareas.edit',$designaciontareas->id)}}">Modificar</a>
					<a class="btn btn-danger" href="#" data-toggle="modal" data-target="#modal-delete-designaciontareas-{{$designaciontareas->id}}"><b>Eliminar</b>
				</td>-->
			</tr>
			@include('coordinador.template.partials.modal-delete-designaciontareas')
			@endforeach
		</tbody>
	</table>
</div>
@else
	<div class="jumbotron">
		<h1 class="text-center">No existen registros de Tareas Asignadas a un Comité en nuestra Base de Datos</h1>
	</div>
	<div class="text-center">
		<a href="{{ URL::previous() }}" class="btn btn-default"><i class="fa fa-arrow-left" aria-hidden="true"></i>Regresar</a>
	</div>
@endif

@if(count($designaciontarea)>0)
	@if($ruta!=$fullruta)
		<div class="text-center">
			<a href="{{ URL::previous() }}" class="btn btn-default"><i class="fa fa-arrow-left" aria-hidden="true"></i>Regresar</a>
		</div>
	@endif
@endif

@endsection
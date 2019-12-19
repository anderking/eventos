@extends ('admin.template.main')
<?php
  $ruta = Request::Url();
  $fullruta = Request::fullUrl();
?>
@section('title','Coordinador-DesignacionComite')
@section('body_class','coordinador_designacioncomites_index')
@section('main_class','coordinador_designacioncomites_index')
@section('content')

<h1 class="text-center">Lista de Empleados por Comité</h1>

<div class="row">
  <div class="col-xs-12 col-sm-6 col-md-6 text-center">
		<a href="{{ route('coordinador.designacioncomites.create') }}" class="btn btn-primary">Actualizar Designación</a>
  </div>
  <div class="col-xs-12 col-sm-6 col-md-6 text-center">
  	{!! Form::open(array('route' => 'coordinador.designacioncomites.index','method' => 'GET','class'=>'navbar-form')) !!}
    <div class="input-group">
      {!! Form::text('id', null, ['class'=>'form-control','placeholder'=>'Buscar...','aria-describedby'=>'search','required']) !!}
      <span class="input-group-btn" >
        <button class="btn btn-info" type="submit"><i class="fa fa-search"></i></button>
      </span>
    </div>
    {!! Form::close() !!}
  </div>
</div>

@if (count($designacioncomite)>0)
<div class="table-responsive">
	<table class="table table-hover table-condensed">
		<thead>
			<tr>
				<th>ID</th>
        <th>Comite</th>
        <th>Usuario</th>
        <th>Fecha de creación</th>
			</tr>
		</thead>
		<tbody>
			@foreach($designacioncomite as $designacioncomites)
			<tr>
				@if($designacioncomites->id<=9)
				<td><!--<a href="{{ route('coordinador.designacioncomites.show',$designacioncomites->id) }}">-->DEC00{{ $designacioncomites->id }}</td>
				@elseif($designacioncomites->id>9 and $designacioncomites->id<99)
				<td><!--<a href="{{ route('coordinador.designacioncomites.show',$designacioncomites->id) }}">-->DEC0{{ $designacioncomites->id }}</td>
				@endif
				<td>{{ $designacioncomites->comite_id }}</td>
				<td>{{ $designacioncomites->user_id }}</td>
				<td>{{ $designacioncomites->created_at->toDateString() }}</td>
				<!--<td>
					<a class="btn btn-info" href="{{ route('coordinador.designacioncomites.edit',$designacioncomites->id)}}">Modificar</a>
					<a class="btn btn-danger" href="#" data-toggle="modal" data-target="#modal-delete-designacioncomites-{{$designacioncomites->id}}"><b>Eliminar</b>
				</td>-->
			</tr>
			@include('coordinador.template.partials.modal-delete-designacioncomites')
			@endforeach
		</tbody>
	</table>
</div>
@else
	<div class="jumbotron">
		<h1 class="text-center">No existen registros de Empleados Asignados a un Comité en nuestra Base de Datos</h1>
	</div>
	<div class="text-center">
		<a href="{{ URL::previous() }}" class="btn btn-default"><i class="fa fa-arrow-left" aria-hidden="true"></i>Regresar</a>
	</div>
@endif

@if(count($designacioncomite)>0)
	@if($ruta!=$fullruta)
		<div class="text-center">
			<a href="{{ URL::previous() }}" class="btn btn-default"><i class="fa fa-arrow-left" aria-hidden="true"></i>Regresar</a>
		</div>
	@endif
@endif

@endsection
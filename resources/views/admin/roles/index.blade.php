@extends ('admin.template.main')
<?php
  $ruta = Request::Url();
  $fullruta = Request::fullUrl();
?>
@section('title','Admin-Rol')
@section('body_class','admin_roles_index')
@section('main_class','admin_roles_index')
@section('content')

<h1 class="text-center">Lista de Roles</h1>

<div class="row">
  <div class="col-xs-12 col-sm-6 col-md-6 text-center">
		<a href="{{ route('admin.roles.create') }}" class="btn btn-primary">Nuevo Rol</a>
  </div>
  <div class="col-xs-12 col-sm-6 col-md-6 text-center">
  	{!! Form::open(array('route' => 'admin.roles.index','method' => 'GET','class'=>'navbar-form')) !!}
    <div class="input-group">
      {!! Form::text('id', null, ['class'=>'form-control','placeholder'=>'Buscar...','aria-describedby'=>'search','required']) !!}
      <span class="input-group-btn" >
        <button class="btn btn-info" type="submit"><i class="fa fa-search"></i></button>
      </span>
    </div>
    {!! Form::close() !!}
  </div>
</div>

@if (count($rol)>0)
<div class="table-responsive">
	<table class="table table-hover table-condensed">
		<thead>
			<tr>
				<th>ID</th>
        <th>Nombre</th>
        <th>Descripcion</th>
        <th>Estatus</th>
        <th>Acción</th>
			</tr>
		</thead>
		<tbody>
			@foreach($rol as $roles)
			<tr>
				@if($roles->id<=9)
				<td><a href="{{ route('admin.roles.show',$roles->id) }}">R00{{ $roles->id }}</a></td>
				@elseif($roles->id>9 and $roles->id<=99)
				<td><a href="{{ route('admin.roles.show',$roles->id) }}">R0{{ $roles->id }}</a></td>
				@endif
				<td>{{ $roles->name }}</td>
				<td>{{ $roles->descripcion }}</td>
				@if($roles->estatus=="A")
				<td><span class="badge badge-success">Activo</span></td>
				@else
				<td><span class="badge badge-danger">Inactivo</span></td>
				@endif
				<td>
					<a class="btn btn-info" href="{{ route('admin.roles.edit',$roles->id)}}">Modificar</a>
					<a class="btn btn-danger" href="#" data-toggle="modal" data-target="#modal-delete-roles-{{$roles->id}}"><b>Eliminar</b>
				</td>
			</tr>
			@include('admin.template.partials.modal-delete-roles')
			@endforeach
		</tbody>
	</table>
</div>
@else
	<div class="jumbotron">
		<h1 class="text-center">No existen registros de Roles en nuestra Base de Datos</h1>
	</div>
	<div class="text-center">
		<a href="{{ URL::previous() }}" class="btn btn-default"><i class="fa fa-arrow-left" aria-hidden="true"></i>Regresar</a>
	</div>
@endif

@if(count($rol)>0)
	@if($ruta!=$fullruta)
		<div class="text-center">
			<a href="{{ URL::previous() }}" class="btn btn-default"><i class="fa fa-arrow-left" aria-hidden="true"></i>Regresar</a>
		</div>
	@endif
@endif

@endsection
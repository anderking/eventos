@extends ('admin.template.main')
<?php
  $ruta = Request::Url();
  $fullruta = Request::fullUrl();
?>
@section('title','Admin-Users')
@section('body_class','admin_users_index')
@section('main_class','admin_users_index')
@section('content')

<h1 class="text-center">Lista de Usuarios</h1>

<div class="row">
  <div class="col-xs-12 col-sm-6 col-md-6 text-center">
		<a href="{{ route('admin.users.create') }}" class="btn btn-primary">Nuevo Usuario</a>
  </div>
  <div class="col-xs-12 col-sm-6 col-md-6 text-center">
  	{!! Form::open(array('route' => 'admin.users.index','method' => 'GET','class'=>'navbar-form')) !!}
    <div class="input-group">
      {!! Form::text('cedula', null, ['class'=>'form-control','placeholder'=>'Buscar...','aria-describedby'=>'search','required']) !!}
      <span class="input-group-btn" >
        <button class="btn btn-info" type="submit"><i class="fa fa-search"></i></button>
      </span>
    </div>
    {!! Form::close() !!}
  </div>
</div>

@if (count($user)>0)
<div class="table-responsive">
	<table class="table table-hover table-condensed">
		<thead>
			<tr>
				<th>ID</th>
				<th>Rol</th>
        <th>E-Mail</th>
				<!--<th>Contraseña</th>-->
				<th>Cedula</th>
        <th>Nombres</th>
        <th>Apellidos</th>
        <!--<th>Sexo</th>
        <th>Fecha de Nacimiento</th>
        <th>Dirección</th>
        <th>Teléfono Movil</th>
				<th>Teléfono Oficina</th>
				<th>Teléfono Otro</th>-->
        <th>Acción</th>
			</tr>
		</thead>
		<tbody>
			@foreach($user as $users)
			<tr>
				@if($users->id<=9)
				<td><a href="{{ route('admin.users.show',$users->id) }}">U00{{ $users->id }}</a></td>
				@elseif($users->id>9 and $users->id<=99)
				<td><a href="{{ route('admin.users.show',$users->id) }}">U0{{ $users->id }}</a></td>
				@endif
				<td>{{ $users->rol->name }}</td>
				<td>{{ $users->email }}</td>
				<!--<td>{{ $users->password }}</td>-->
				<td>{{ $users->cedula }}</td>
				<td>{{ $users->name }}</td>
				<td>{{ $users->apellido }}</td>
				<!--<td>{{ $users->sex }}</td>	
				<td>{{ $users->fecha }}</td>
				<td>{{ $users->direccion }}</td>
				<td>{{ $users->telefono_movil }}</td>
				<td>{{ $users->telefono_ofic }}</td>
				<td>{{ $users->telefono_otro }}</td>-->
				<td>
					<a class="btn btn-info" href="{{ route('admin.users.edit',$users->id)}}">Modificar</a>
					<a class="btn btn-danger" href="#" data-toggle="modal" data-target="#modal-delete-users-{{$users->id}}"><b>Eliminar</b>
				</td>
			</tr>
			@include('admin.template.partials.modal-delete-users')
			@endforeach
		</tbody>
	</table>
</div>
@else
	<div class="jumbotron">
		<h1 class="text-center">No existen registros de Usuarios en nuestra Base de Datos</h1>
	</div>
	<div class="text-center">
		<a href="{{ URL::previous() }}" class="btn btn-default"><i class="fa fa-arrow-left" aria-hidden="true"></i>Regresar</a>
	</div>
@endif

@if(count($user)>0)
	@if($ruta!=$fullruta)
		<div class="text-center">
			<a href="{{ URL::previous() }}" class="btn btn-default"><i class="fa fa-arrow-left" aria-hidden="true"></i>Regresar</a>
		</div>
	@endif
@endif

@endsection
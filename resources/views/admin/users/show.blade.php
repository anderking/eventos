@extends ('admin.template.main')

@section('title','Admin-User-Show')
@section('body_class','admin_roles_show')
@section('main_class','admin_roles_show')

@section('content')

<div class="text-center page-header">
	<h1 class="text-center">Detalles del Usuario {{ $user->name }}</h1>
</div>

<div class="panel panel-primary box_flo">
	<div class="panel-heading">
		<h3 class="panel-title">{{ $user->name }}</h3>
	</div>
	<div class="panel-body">
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-offset-2 col-md-8">
				<ul class="list-group">
					<li class="list-group-item"><b>ID: </b>{{ $user->id }}</li>
					<li class="list-group-item"><b>Rol: </b>{{ $user->rol->name }}</li>
					<li class="list-group-item"><b>E-Mail: </b>{{ $user->email }}</li>
					<li class="list-group-item"><b>Cédula: </b>{{ $user->cedula }}</li>
					<li class="list-group-item"><b>Nombres: </b>{{ $user->name }}</li>
					<li class="list-group-item"><b>Apellidos: </b>{{ $user->apellido }}</li>
					<li class="list-group-item"><b>Sexo: </b>{{ $user->sex }}</li>
					<li class="list-group-item"><b>Fecha de Nacimiento: </b>{{ $user->fecha }}</li>
					<li class="list-group-item"><b>Dirección: </b>{{ $user->direccion }}</li>
					<li class="list-group-item"><b>Telefono Movil: </b>{{ $user->telefono_otro }}</li>
					<li class="list-group-item"><b>Telefono Oficina: </b>{{ $user->telefono_ofic }}</li>
					<li class="list-group-item"><b>Telefono Otro: </b>{{ $user->telefono_otro }}</li>
				</ul>
			</div>
		</div>
	</div>
	<div class="panel-footer">
		<div class="text-center">
			<a href="{{ URL::previous() }}" class="btn btn-default"><i class="fa fa-arrow-left" aria-hidden="true"></i>Regresar</a>
		</div>
	</div>
</div>

@endsection
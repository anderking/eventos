@extends ('admin.template.main')

@section('title','Admin-Local-Show')
@section('body_class','admin_locales_show')
@section('main_class','admin_locales_show')

@section('content')

<div class="text-center page-header">
	<h1 class="text-center">Detalles del Local {{ $local->name }}</h1>
</div>

<div class="panel panel-primary box_flo">
	<div class="panel-heading">
		<h3 class="panel-title">{{ $local->name }}</h3>
	</div>
	<div class="panel-body">
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-offset-2 col-md-8">
				<ul class="list-group">
					<li class="list-group-item"><b>ID: </b>{{ $local->id }}</li>
					<li class="list-group-item"><b>Tipo de Local: </b>{{ $local->tipo_local->name }}</li>
					<li class="list-group-item"><b>Nombre: </b>{{ $local->name }}</li>
					<li class="list-group-item"><b>Descripción: </b>{{ $local->descripcion }}</li>
					<li class="list-group-item"><b>Dirección: </b>{{ $local->direccion }}</li>
					<li class="list-group-item"><b>Capacidad: </b>{{ $local->capacidad }}</li>
					<li class="list-group-item"><b>Estacionamiento: </b>{{ $local->estacionamiento }}</li>
					<li class="list-group-item"><b>Capacidad Estacionamiento: </b>{{ $local->capacidad_est }}</li>
					<li class="list-group-item"><b>Cantidad de Baños: </b>{{ $local->cant_baños }}</li>
					<li class="list-group-item"><b>Vigilancia Privada: </b>{{ $local->vigilancia }}</li>
					<li class="list-group-item"><b>Precio Alquiler: </b>{{ $local->precio_alquiler }}</li>
					<li class="list-group-item"><b>Precio Alquiler: </b>{{ $local->IVA }}</li>
					<li class="list-group-item"><b>Precio Venta: </b>{{ $local->precio_venta }}</li>
					<li class="list-group-item"><b>Cedula Administrador: </b>{{ $local->cedula_admin }}</li>
					<li class="list-group-item"><b>Nombres Administrador: </b>{{ $local->name_admin }}</li>
					<li class="list-group-item"><b>Apellidos Administrador: </b>{{ $local->apellido_admin }}</li>
					<li class="list-group-item"><b>Email Administrador: </b>{{ $local->email_admin }}</li>
					<li class="list-group-item"><b>Telefono Movil: </b>{{ $local->telefono_movil }}</li>
					<li class="list-group-item"><b>Telefono Ofic: </b>{{ $local->telefono_movil }}</li>
					<li class="list-group-item"><b>Telefono Otro: </b>{{ $local->telefono_otro }}</li>
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
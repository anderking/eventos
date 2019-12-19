@extends ('admin.template.main')

@section('title','Recepcionista-Cliente-Show')
@section('body_class','recepcionista_clientes_show')
@section('main_class','recepcionista_clientes_show')

@section('content')

<div class="text-center page-header">
	<h1 class="text-center">Detalles del Cliente {{ $cliente->name }} {{ $cliente->apellido }}</h1>
</div>

<div class="panel panel-primary box_flo">
	<div class="panel-heading">
		<h3 class="panel-title">{{ $cliente->name }} {{ $cliente->apellido }}</h3>
	</div>
	<div class="panel-body">
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-offset-2 col-md-8">
				<ul class="list-group">
					@if($cliente->id<=9)
					<li class="list-group-item"><b>ID: </b>CL00{{ $cliente->id }}</li>
					@elseif($cliente->id>9 and $cliente->id<=99)
					<li class="list-group-item"><b>ID: </b>Cl0{{ $cliente->id }}</li>
					@endif
					<li class="list-group-item"><b>Cedula: </b>{{ $cliente->cedula }}</li>
					<li class="list-group-item"><b>Nombres: </b>{{ $cliente->name }}</li>
					<li class="list-group-item"><b>Apellidos: </b>{{ $cliente->apellido }}</li>
					<li class="list-group-item"><b>Sexo: </b>{{ $cliente->sex }}</li>
					<li class="list-group-item"><b>Fecha de Nacimiento: </b>{{ $cliente->fecha_nac }}</li>
					<li class="list-group-item"><b>Estado Civil: </b>{{ $cliente->edo_civil }}</li>
					<!--<li class="list-group-item"><b>Cantidad de Hijos: </b>{{ $cliente->cant_hijos }}</li>-->
					<li class="list-group-item"><b>Email: </b>{{ $cliente->email }}</li>
					<li class="list-group-item"><b>Dirección: </b>{{ $cliente->direccion }}</li>
					<li class="list-group-item"><b>Telefono Movil: </b>{{ $cliente->telefono_otro }}</li>
					<li class="list-group-item"><b>Telefono Oficina: </b>{{ $cliente->telefono_ofic }}</li>
					<li class="list-group-item"><b>Telefono Otro: </b>{{ $cliente->telefono_otro }}</li>
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
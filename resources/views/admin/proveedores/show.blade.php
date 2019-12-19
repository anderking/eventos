@extends ('admin.template.main')

@section('title','Admin-Proveedor-Show')
@section('body_class','admin_proveedores_show')
@section('main_class','admin_proveedores_show')

@section('content')

<div class="text-center page-header">
	<h1 class="text-center">Detalles del Proveedor {{ $proveedor->razon_social }}</h1>
</div>

<div class="panel panel-primary box_flo">
	<div class="panel-heading">
		<h3 class="panel-title">{{ $proveedor->razon_social }}</h3>
	</div>
	<div class="panel-body">
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-offset-2 col-md-8">
				<ul class="list-group">
					<li class="list-group-item"><b>ID: </b>{{ $proveedor->id }}</li>
					<li class="list-group-item"><b>RIF: </b>{{ $proveedor->letra_rif }}{{ $proveedor->rif }}</li>	
					<li class="list-group-item"><b>Razon Social: </b>{{ $proveedor->razon_social }}</li>
					<li class="list-group-item"><b>Descripción: </b>{{ $proveedor->descripcion }}</li>
					<li class="list-group-item"><b>Dirección: </b>{{ $proveedor->direccion }}</li>
					<li class="list-group-item"><b>Email: </b>{{ $proveedor->email }}</li>
					<li class="list-group-item"><b>Tiempo Respuesta: </b>{{ $proveedor->tiempo_respuesta }}</li>
					<li class="list-group-item"><b>Desempeño: </b>{{ $proveedor->desempeño }}</li>
					<li class="list-group-item"><b>Calidad: </b>{{ $proveedor->calidad }}</li>
					<li class="list-group-item"><b>Responsabilidad: </b>{{ $proveedor->responsabilidad }}</li>
					<li class="list-group-item"><b>Atención: </b>{{ $proveedor->atencion }}</li>
					<li class="list-group-item"><b>Telefono Móvil: </b>{{ $proveedor->telefono_movil }}</li>
					<li class="list-group-item"><b>Telefono de Oficina: </b>{{ $proveedor->telefono_ofic }}</li>
					<li class="list-group-item"><b>Telefono Otro: </b>{{ $proveedor->telefono_otro }}</li>
					<li class="list-group-item"><b>Nombres Representante: </b>{{ $proveedor->name_prov }}</li>
					<li class="list-group-item"><b>Apellidos Representante: </b>{{ $proveedor->apellido_prov }}</li>
					<li class="list-group-item"><b>Cedula Representante: </b>{{ $proveedor->cedula_prov }}</li>
					<li class="list-group-item"><b>Email Representante: </b>{{ $proveedor->email_prov }}</li>
					<li class="list-group-item"><b>Telefono Móvil Representante: </b>{{ $proveedor->telefono_movil_prov }}</li>
					<li class="list-group-item"><b>Telefono de Oficina Representante: </b>{{ $proveedor->telefono_ofic_prov }}</li>
					<li class="list-group-item"><b>Telefono Otro Representante: </b>{{ $proveedor->telefono_otro_prov }}</li>
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
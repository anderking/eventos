@extends ('admin.template.main')

@section('title','Admin-Item-Show')
@section('body_class','admin_items_show')
@section('main_class','admin_items_show')

@section('content')

<div class="text-center page-header">
	<h1 class="text-center">Detalles del Item {{ $item->descripcion }}</h1>
</div>

<div class="panel panel-primary box_flo">
	<div class="panel-heading">
		<h3 class="panel-title">{{ $item->descripcion }}</h3>
	</div>
	<div class="panel-body">
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-offset-2 col-md-8">
				<ul class="list-group">
					<li class="list-group-item"><b>ID: </b>{{ $item->id }}</li>
					<li class="list-group-item"><b>Tipo Servicio: </b>{{ $item->servicio->tipo_servicio->name }}</li>
					<li class="list-group-item"><b>Servicio: </b>{{ $item->servicio->name }}</li>
					<li class="list-group-item"><b>Descripción: </b>{{ $item->descripcion }}</li>
					<li class="list-group-item"><b>Stock: </b>{{ $item->stock }}</li>
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
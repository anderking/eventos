@extends ('admin.template.main')

@section('title','Admin-TipoComite-Show')
@section('body_class','admin_tipocomites_show')
@section('main_class','admin_tipocomites_show')

@section('content')

<div class="text-center page-header">
	<h1 class="text-center">Detalles del Tipo Comité {{ $tipocomite->name }}</h1>
</div>

<div class="panel panel-primary box_flo">
	<div class="panel-heading">
		<h3 class="panel-title">{{ $tipocomite->name }}</h3>
	</div>
	<div class="panel-body">
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-offset-2 col-md-8">
				<ul class="list-group">
					<li class="list-group-item"><b>ID: </b>{{ $tipocomite->id }}</li>
					<li class="list-group-item"><b>Nombre: </b>{{ $tipocomite->name }}</li>
					<li class="list-group-item"><b>Descripcion: </b>{{ $tipocomite->descripcion }}</li>
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
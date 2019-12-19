@extends ('admin.template.main')

@section('title','Planificador-Tarea-Show')
@section('body_class','planificador_tareas_show')
@section('main_class','planificador_tareas_show')

@section('content')

<div class="text-center page-header">
	<h1 class="text-center">Detalles de la Tarea {{ $tarea->name }}</h1>
</div>

<div class="panel panel-primary box_flo">
	<div class="panel-heading">
		<h3 class="panel-title">{{ $tarea->name }}</h3>
	</div>
	<div class="panel-body">
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-offset-2 col-md-8">
				<ul class="list-group">
					@if($tarea->id<=9)
					<li class="list-group-item"><b>ID: </b>TR00{{ $tarea->id }}</li>
					@elseif($tarea->id>9 and $tarea->id<=99)
					<li class="list-group-item"><b>ID: </b>TR0{{ $tarea->id }}</li>
					@endif
					<li class="list-group-item"><b>Nombre: </b>{{ $tarea->name }}</li>
					<li class="list-group-item"><b>Descripción: </b>{{ $tarea->descripcion }}</li>
					<li class="list-group-item"><b>Tipo: </b>{{ $tarea->tipo }}</li>
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
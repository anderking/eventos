@extends ('admin.template.main')

@section('title','Planificador-EventoTarea-Show')
@section('body_class','planificador_eventotareas_show')
@section('main_class','planificador_eventotareas_show')

@section('content')

<div class="text-center page-header">
	<h1 class="text-center">Detalles de la Tarea {{ $eventotarea->id }}</h1>
</div>

<div class="panel panel-primary box_flo">
	<div class="panel-heading">
		<h3 class="panel-title">{{ $eventotarea->id }}</h3>
	</div>
	<div class="panel-body">
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-offset-2 col-md-8">
				<ul class="list-group">
					@if($eventotarea->id<=9)
					<li class="list-group-item"><b>ID: </b>ETR00{{ $eventotarea->id }}</li>
					@elseif($eventotarea->id>9 and $eventotarea->id<=99)
					<li class="list-group-item"><b>ID: </b>ETR0{{ $eventotarea->id }}</li>
					@endif
					@if($eventotarea->evento->id<=9)
					<li class="list-group-item"><b>ID: </b><a href="{{ route('planificador.listaeventos.show',$eventotarea->evento_id) }}">E00{{ $eventotarea->id }}</a></li>
					@elseif($eventotarea->evento->id>9 and $eventotarea->evento->id<=99)
					<li class="list-group-item"><b>ID: </b><a href="{{ route('planificador.listaeventos.show',$eventotarea->evento_id) }}">E0{{ $eventotarea->id }}</a></li>
					@endif
					<li class="list-group-item"><b>Nombre: </b>{{ $eventotarea->tarea->name }}</li>
					<li class="list-group-item"><b>Descripción: </b>{{ $eventotarea->tarea->descripcion }}</li>
					<li class="list-group-item"><b>Fecha Inicio: </b>{{ $eventotarea->fecha_inicio->toDateString() }}</li>
					<li class="list-group-item"><b>Fecha Fin: </b>{{ $eventotarea->fecha_fin->toDateString() }}</li>
					@if($eventotarea->estatust=="P")
					<li class="list-group-item"><b>Fecha Resolucion: </b>Sin fecha</li>
					@else
					<li class="list-group-item"><b>Fecha Resolucion: </b>{{ $eventotarea->fecha_resolucion->toDateString() }}</li>
					@endif
					@if($eventotarea->estatust=="P")
					<li class="list-group-item"><b>Estatus: </b>Pendiente</li>
					@elseif($eventotarea->estatust=="F")
					<li class="list-group-item"><b>Estatus: </b>Finalizada</li>
					@endif

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
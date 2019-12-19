@extends ('admin.template.main')

@section('title','Planificador-Tarea-Edit')
@section('body_class','planificador_tareas_edit')
@section('main_class','planificador_tareas_edit')

@section('content')

<div class="text-center page-header">
	<div class="row">
		<div class="col-md-8">
			<h1 class="text-center">Asignar Tareas</h1>
		</div>
		<div class="col-md-4">
			<h1 class="text-center">Servicios Contratados</h1>
		</div>
	</div>
</div>

<div class="row">
	<div class="col-xs-12 col-sm-12 col-md-8">
		{!! Form::open(array('route' => ['planificador.eventotareas.update',$eventotarea],'method' => 'PUT','files' => true,'class'=>'form-horizontal')) !!}

		<div class="panel panel-primary box_flot">

			<div class="panel-heading">
				<h3 class="panel-title">Registrar Tareas</h3>
			</div>

			<div class="panel-body">
				<div class="row">
					<div class="col-xs-12 col-sm-12 col-md-12">

						<div class="form-group">
							{!! Form::label('tarea_id', 'Tarea:',['class'=>'col-xs-12 col-sm-2 col-md-2 control-label']) !!}
							<div class="col-xs-12 col-sm-10 col-md-8">
								{!! Form::select('tarea_id', $tarea, $eventotarea->tarea->id, ['class'=>'form-control select_tarea']) !!}
							</div>
						</div>
						<div class="form-group">
							{!! Form::label('fecha_inicio', 'Fecha de Inicio:',['class'=>'col-xs-12 col-sm-2 col-md-4 control-label']) !!}
							<div class="col-xs-12 col-sm-10 col-md-4">
								{!! Form::date('fecha_inicio', date('Y-m-d'), ['class'=>'form-control','required']) !!}
							</div>
						</div>
						<div class="form-group">
							{!! Form::label('fecha_fin', 'Fecha de Fin:',['class'=>'col-xs-12 col-sm-2 col-md-4 control-label']) !!}
							<div class="col-xs-12 col-sm-10 col-md-4">
								{!! Form::date('fecha_fin', date('Y-m-d'), ['class'=>'form-control','required']) !!}
							</div>
						</div>

						{!! Form::hidden('fecha_resolucion',date('Y-m-d')) !!}
						{!! Form::hidden('estatust','P') !!}
						{!! Form::hidden('evento_id',$eventotarea->evento->id) !!}

					</div>
				</div>
			</div>

			<div class="panel-footer">
				<div class="row">
					<div class="col-xs-12 col-sm-offset-2 col-sm-10 col-md-offset-4 col-md-8">
						{!! Form::submit('Actualizar',['class'=>'btn btn-info']) !!}
						<a href="{{ route('planificador.eventotareas.edit',$eventotarea->id)}}" class="btn btn-primary">Cancelar</a>
						<a href="{{ route('planificador.eventotareas.index') }}" class="btn btn-default">Regresar</a>
					</div>
				</div>
			</div>

		</div>
		{!! Form::close() !!}
	</div>
	@if(count($eventotarea->evento->cotizacion->costos)>0)
	<div class="col-xs-12 col-sm-12 col-md-4">
		<div class="table-responsive">
			<table class="table table-hover table-condensed">
				<thead>
					<tr>
						<th>Servicio</th>
					</tr>
				</thead>
				<tbody>
					@foreach($eventotarea->evento->cotizacion->costos as $cotizacion_costo)
					<tr>
						<td>{{ $cotizacion_costo->item->descripcion }}</td>
					</tr>
					@endforeach

				</tbody>
			</table>
		</div>
	</div>
	@else
	<div class="jumbotron">
		<h1 class="text-center">No existen registros de Servicios para esta Cotización</h1>
	</div>
	@endif
</div>

@endsection

@section('js')

<script>

$( document ).ready(function() {

	$(".select_tarea").chosen({
		max_selected_options: 10,
		no_results_text: "Ningún resultado coincide!",
		placeholder_text_multiple: "Seleccione una Tarea"
	});

});

</script>

@endsection
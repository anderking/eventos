@extends ('admin.template.main')

@section('title','Coordinador-DesignacionTarea-Create')
@section('body_class','coordinador_designaciontareas_create')
@section('main_class','coordinador_designaciontareas_create')
@section('content')

<div class="text-center page-header">
	<h1 class="text-center">Designación de Empleados por Comité</h1>
</div>
@if( count($comite_all)>0 )

{!! Form::open(array('route' => 'coordinador.designaciontareas.store','method' => 'POST','class'=>'form-horizontal')) !!}

<div class="panel panel-primary box_flot">
	<div class="panel-heading">
		<h3 class="panel-title">Registrar Designación</h3>
	</div>
	<div class="panel-body">
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-12">

				<div class="form-group">
					{!! Form::label('comite_id', 'Comités:',['class'=>'col-xs-12 col-sm-2 col-md-4 control-label']) !!}
					<div class="col-xs-12 col-sm-10 col-md-5">
						{!! Form::select('comite_id', $comite, null, ['class'=>'form-control select_comites','required']) !!}
					</div>
				</div>

				{!! Form::hidden('evento_tarea_id',$eventotarea->id) !!}

			</div>
	</div>
</div>
	<div class="panel-footer">
		<div class="row">
			<div class="col-xs-12 col-sm-offset-2 col-sm-10 col-md-offset-4 col-md-8">
				{!! Form::submit('Registrar',['class'=>'btn btn-info']) !!}
				<a href="{{ route('coordinador.designaciontareas.create') }}" class="btn btn-primary">Cancelar</a>
				<a href="{{ route('coordinador.designaciontareas.index') }}" class="btn btn-default">Regresar</a>
			</div>
		</div>
	</div>
{!! Form::close() !!}

@else
	<div class="jumbotron">
		<h1>No existen registros de Comités para ser Asignados</h1>
		<p>Por favor registre al un Comité.</p>
		<a href="#" data-toggle="modal" data-target="#modal-permiso-create-comites" class="btn btn-primary">Nuevo Comité</a>
		<a href="{{ route('coordinador.designaciontareas.index') }}" class="btn btn-default">Regresar</a>
		@include('recepcionista.template.partials.modal-permiso-create-comites')

	</div>
@endif

@endsection

@section('js')

<script>

$( document ).ready(function() {


	$(".select_comites").chosen({
		max_selected_options: 10,
		no_results_text: "Ningún resultado coincide!",
		placeholder_text_multiple: "Seleccione un comite"
	});

		$(".select_users").chosen({
		max_selected_options: 10,
		no_results_text: "Ningún resultado coincide!",
		placeholder_text_multiple: "Seleccione un usuario"
	});


});

</script>

@endsection

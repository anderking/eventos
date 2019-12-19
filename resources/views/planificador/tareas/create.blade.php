@extends ('admin.template.main')

@section('title','Planificador-Tarea-Create')
@section('body_class','planificador_tareas_create')
@section('main_class','planificador_tareas_create')
@section('content')

<div class="text-center page-header">
	<h1 class="text-center">Registro de Tareas</h1>
</div>
@if(count($tipo_tarea_all)>0)

{!! Form::open(array('route' => 'planificador.tareas.store','method' => 'POST','class'=>'form-horizontal')) !!}

<div class="panel panel-primary box_flot">
	
	<div class="panel-heading">
		<h3 class="panel-title">Registrar Tareas</h3>
	</div>
	
	<div class="panel-body">
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-12">

				<div class="form-group">
					{!! Form::label('tipo_tarea_id', 'Tipo:',['class'=>'col-xs-12 col-sm-2 col-md-4 control-label']) !!}
					<div class="col-xs-12 col-sm-10 col-md-5">
						{!! Form::select('tipo_tarea_id', $tipo_tarea, null, ['class'=>'form-control select_tipo_tarea']) !!}
					</div>
				</div>
				<div class="form-group">
					{!! Form::label('name', 'Nombre:',['class'=>'col-xs-12 col-sm-2 col-md-4 control-label']) !!}
					<div class="col-xs-12 col-sm-10 col-md-5">
						{!! Form::text('name', null, ['class'=>'form-control','placeholder'=>'Nombre','required']) !!}
					</div>
				</div>
				<div class="form-group">
					{!! Form::label('descripcion', 'Descripcion:',['class'=>'col-xs-12 col-sm-2 col-md-4 control-label']) !!}
					<div class="col-xs-12 col-sm-10 col-md-5">
						{!! Form::text('descripcion', null, ['class'=>'form-control','placeholder'=>'Descripcion','required']) !!}
					</div>
				</div>

			</div>
		</div>
	</div>

	<div class="panel-footer">
		<div class="row">
			<div class="col-xs-12 col-sm-offset-2 col-sm-10 col-md-offset-4 col-md-8">
				{!! Form::submit('Registrar',['class'=>'btn btn-info']) !!}
				{!! Form::reset('Cancelar',['class'=>'btn btn-primary']) !!}
				<a href="{{ route('planificador.tareas.index') }}" class="btn btn-default">Regresar</a>
			</div>
		</div>
	</div>

</div>

{!! Form::close() !!}

@else
	<div class="jumbotron">
		<h1>No existen Tipo de Tarea registrados</h1>
		<p>No puede registrar una nueva Tarea sin tener Tipo de Tarea, Por favor cree un Tipo de Tarea.</p>
		<h2><a href="{{ route('planificador.tipotareas.create') }}" class="btn btn-primary">Nuevo Tipo Tarea</a></h2>
	</div>
@endif

@endsection

@section('js')

<script>

$( document ).ready(function() {

	$(".select_tipo_tarea").chosen({
		max_selected_options: 10,
		no_results_text: "Ningún resultado coincide!",
		placeholder_text_multiple: "Seleccione un Tipo de Tarea"
	});

});

</script>

@endsection
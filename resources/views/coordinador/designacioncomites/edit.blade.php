@extends ('admin.template.main')

@section('title','Coordinador-DesignacionComite-Edit')
@section('body_class','coordinador_designacioncomites_edit')
@section('main_class','coordinador_designacioncomites_edit')

@section('content')

<div class="text-center page-header">
	<h1 class="text-center">Actualización de la Designación</h1>
</div>

{!! Form::open(array('route' => ['coordinador.designacioncomites.update',$designacioncomite],'method' => 'PUT','files' => true,'class'=>'form-horizontal')) !!}

<div class="panel panel-primary box_flot">
	<div class="panel-heading">
		<h3 class="panel-title">Editar Designacion {{ $designacioncomite->id }}</h3>
	</div>
	<div class="panel-body">
		<div class="row">
			<div class="col-md-12">
				<div class="form-group">
					{!! Form::label('comite_id', 'Comités:',['class'=>'col-xs-12 col-sm-2 col-md-4 control-label']) !!}
					<div class="col-xs-12 col-sm-10 col-md-5">
						{!! Form::select('comite_id', $comite, $designacioncomite->comite_id, ['class'=>'form-control select_comites','required']) !!}
					</div>
				</div>

				<div class="form-group">
					{!! Form::label('user_id', 'Usuario Empleado:',['class'=>'col-xs-12 col-sm-2 col-md-4 control-label']) !!}
					<div class="col-xs-12 col-sm-10 col-md-5">
						{!! Form::select('user_id[]', $user, $designacioncomite->user_id, ['class'=>'form-control select_users','multiple','required']) !!}
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="panel-footer">
		<div class="row">
			<div class="col-xs-12 col-sm-offset-2 col-sm-10 col-md-offset-4 col-md-8">
				{!! Form::submit('Actualizar',['class'=>'btn btn-info']) !!}
				{!! Form::reset('Cancelar',['class'=>'btn btn-primary']) !!}
				<a href="{{ route('coordinador.designacioncomites.index') }}" class="btn btn-default">Regresar</a>
			</div>
		</div>
	</div>
</div>
{!! Form::close() !!}
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

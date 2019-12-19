@extends ('admin.template.main')

@section('title','Admin-Servicio-Create')
@section('body_class','admin_servicios_create')
@section('main_class','admin_servicios_create')
@section('content')

<div class="text-center page-header">
	<h1 class="text-center">Registro de Servicios</h1>
</div>

@if(count($tipo_servicio_all)>0)
<div class="panel panel-primary box_flot">
	<div class="panel-heading">
		<h3 class="panel-title">Registrar Servicio</h3>
	</div>
	<div class="panel-body">
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-12">
				{!! Form::open(array('route' => 'admin.servicios.store','method' => 'POST','class'=>'form-horizontal')) !!}
				<div class="form-group">
					{!! Form::label('tipo_servicio_id', 'Tipo Servicio:',['class'=>'col-xs-12 col-sm-2 col-md-4 control-label']) !!}
					<div class="col-xs-12 col-sm-10 col-md-5">
						{!! Form::select('tipo_servicio_id', $tipo_servicio, null, ['class'=>'form-control select_tipo_serv','required']) !!}
						<p>
							<a href="{{ route('admin.tiposervicios.create') }}">¿Nuevo Tipo de Servicio?</a>
						</p>
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
				<a href="{{ route('admin.servicios.index') }}" class="btn btn-default">Regresar</a>
			</div>
		</div>
	</div>
</div>
{!! Form::close() !!}

@else
	<div class="jumbotron">
		<h1>No existen Tipo de Servicio registrados</h1>
		<p>No puede registrar un nuevo Servicio sin tener Tipo de Servicio, Por favor cree un Tipo de Servicio.</p>
		<h2><a href="{{ route('admin.tiposervicios.create') }}" class="btn btn-primary">Nuevo Tipo Servicio</a></h2>
	</div>
@endif

@endsection

@section('js')

<script>

$( document ).ready(function() {

	$(".select_tipo_serv").chosen({
		max_selected_options: 10,
		no_results_text: "Ningún resultado coincide!",
		placeholder_text_multiple: "Seleccione un Tipo de comité"
	});

});

</script>

@endsection
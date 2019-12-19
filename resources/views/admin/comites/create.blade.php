@extends ('admin.template.main')

@section('title','Admin-Comite-Create')
@section('body_class','admin_comites_create')
@section('main_class','admin_comites_create')
@section('content')

<div class="text-center page-header">
	<h1 class="text-center">Registro de Comites</h1>
</div>
@if(count($tipo_comite_all)>0)

<div class="panel panel-primary box_flot">
	<div class="panel-heading">
		<h3 class="panel-title">Registrar Comite</h3>
	</div>
	<div class="panel-body">
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-12">
				{!! Form::open(array('route' => 'admin.comites.store','method' => 'POST','class'=>'form-horizontal')) !!}
				<div class="form-group">
					{!! Form::label('tipo_comite_id', 'Tipo:',['class'=>'col-xs-12 col-sm-2 col-md-4 control-label']) !!}
					<div class="col-xs-12 col-sm-10 col-md-5">
						{!! Form::select('tipo_comite_id', $tipo_comite, null, ['class'=>'form-control select_tipo_comite']) !!}
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
				<a href="{{ route('admin.comites.index') }}" class="btn btn-default">Regresar</a>
			</div>
		</div>
	</div>
</div>
{!! Form::close() !!}

@else
	<div class="jumbotron">
		<h1>No existen Tipo de Comité registrados</h1>
		<p>No puede registrar un nuevo Comité sin tener Tipo de Comité, Por favor cree un Tipo de Comité.</p>
		<h2><a href="{{ route('admin.tipocomites.create') }}" class="btn btn-primary">Nuevo Tipo Comité</a></h2>
	</div>
@endif

@endsection

@section('js')

<script>

$( document ).ready(function() {

	$(".select_tipo_comite").chosen({
		max_selected_options: 10,
		no_results_text: "Ningún resultado coincide!",
		placeholder_text_multiple: "Seleccione un Tipo de comité"
	});

});

</script>

@endsection
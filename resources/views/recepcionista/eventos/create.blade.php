@extends ('admin.template.main')

@section('title','Recepcionista-Eventos-Create')
@section('body_class','recepcionista_eventos_create')
@section('main_class','recepcionista_eventos_create')
@section('content')

<div class="text-center page-header">
	<h1 class="text-center">Registro de Eventos</h1>
</div>
@if(count($tipo_evento_all)>0 && count($cliente_all)>0 && count($cotizacion_all)>0)
{!! Form::open(array('route' => 'recepcionista.eventos.store','method' => 'POST','class'=>'form-horizontal')) !!}
<div class="panel panel-primary box_flot">
	<div class="panel-heading">
		<h3 class="panel-title">Registrar Evento</h3>
	</div>
	<div class="panel-body">
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-12">
				<div class="form-group">
					{!! Form::label('cotizacion_id', 'Cotización:',['class'=>'col-xs-12 col-sm-2 col-md-4 control-label']) !!}
					<div class="col-xs-12 col-sm-10 col-md-5">
						{!! Form::select('cotizacion_id',$cotizacion, null, ['class'=>'form-control select_cotizacion']) !!}
					</div>
				</div>
				<div class="form-group">
					{!! Form::label('tipo_evento_id', 'Tipo Evento:',['class'=>'col-xs-12 col-sm-2 col-md-4 control-label']) !!}
					<div class="col-xs-12 col-sm-10 col-md-5">
						{!! Form::select('tipo_evento_id', $tipo_evento, null, ['class'=>'form-control select_tipo_evento']) !!}
					</div>
				</div>
				<!--<div class="form-group">
					{!! Form::label('cliente_id', 'Cliente:',['class'=>'col-xs-12 col-sm-2 col-md-4 control-label']) !!}
					<div class="col-xs-12 col-sm-10 col-md-5">
						{!! Form::select('cliente_id', $cliente, null, ['class'=>'form-control select_cliente']) !!}
					</div>
				</div>-->
				<div class="form-group">
					{!! Form::label('fecha_evento', 'Fecha Evento:',['class'=>'col-xs-12 col-sm-2 col-md-4 control-label']) !!}
					<div class="col-xs-12 col-sm-10 col-md-5">
						{!! Form::date('fecha_evento', null, ['class'=>'form-control','required']) !!}
					</div>
				</div>
				<div class="form-group">
					{!! Form::label('hora_inicio', 'Hora Inicio:',['class'=>'col-xs-12 col-sm-2 col-md-4 control-label']) !!}
					<div class="col-xs-12 col-sm-10 col-md-5">
						{!! Form::time('hora_inicio', null, ['class'=>'form-control','required']) !!}
					</div>
				</div>
				<div class="form-group">
					{!! Form::label('hora_fin', 'Hora Fin:',['class'=>'col-xs-12 col-sm-2 col-md-4 control-label']) !!}
					<div class="col-xs-12 col-sm-10 col-md-5">
						{!! Form::time('hora_fin', null, ['class'=>'form-control','required']) !!}
					</div>
				</div>
				<div class="form-group">
					{!! Form::label('nro_cuotas', 'Numero de cuotas:',['class'=>'col-xs-12 col-sm-2 col-md-4 control-label']) !!}
					<div class="col-xs-12 col-sm-10 col-md-6">
						@for ($i = 0; $i < $configrecep->indicador_cuota; $i++)
						<?php $i++ ?>
						{!! Form::radio('nro_cuotas', $i,false,['required']) !!}
						{!! Form::label('nro_cuotas', $i.' cuotas',['class'=>'control-label']) !!}
						<?php $i-- ?>
						@endfor
					</div>
				</div>
				{!! Form::hidden('estatus','Pen') !!}
			</div>
	</div>
</div>
	<div class="panel-footer">
		<div class="row">
			<div class="col-xs-12 col-sm-offset-2 col-sm-10 col-md-offset-4 col-md-8">
				{!! Form::submit('Registrar',['class'=>'btn btn-info']) !!}
				<a href="{{ route('recepcionista.eventos.create') }}" class="btn btn-primary">Cancelar</a>
				<a href="{{ route('recepcionista.eventos.index') }}" class="btn btn-default">Regresar</a>
			</div>
		</div>
	</div>
{!! Form::close() !!}

@else
	<div class="jumbotron">
		<h1>No existen registros de Tipo de Eventos, Cotizaciones o Clientes para asignarles un nuevo Evento</h1>
		<p>Para crear un Evento considere que deben existir en la Base de Datos al menos un Tipo de Evento, una Cotización y un Cliente registrados</p>
		<p>Tambien considere que las Cotizaciones deben ser confirmadas antes de asignarles un Evento</p>
		<p>Por favor registre al menos un Tipo de Evento, una Cotización y un Cliente.</p>
		<a href="{{ route('recepcionista.cotizaciones.create') }}" class="btn btn-primary">Nueva Cotización</a>
		<a href="{{ route('recepcionista.clientes.create') }}" class="btn btn-primary">Nuevo Cliente</a>
		<a href="#" data-toggle="modal" data-target="#modal-permiso-create-tipoevento" class="btn btn-primary">Nuevo Tipo Evento</a>
		<a href="{{ route('recepcionista.eventos.index') }}" class="btn btn-default">Regresar</a>
		@include('recepcionista.template.partials.modal-permiso-create-tipoevento')

	</div>
@endif

@endsection

@section('js')

<script>

$( document ).ready(function() {

	$("#cedula,#cant_hijos").keypress(function (key) {
		window.console.log(key.charCode)
		if ( 
				(key.charCode <48 || key.charCode >57) && //0-9
				(key.charCode != 127 && key.charCode != 46)//delete y punto
			)
	                return false;
	});

	$(".select_tipo_evento").chosen({
		max_selected_options: 10,
		no_results_text: "Ningún resultado coincide!",
		placeholder_text_multiple: "Seleccione un Tipo de evento"
	});

	$(".select_cotizacion").chosen({
		max_selected_options: 10,
		no_results_text: "Ningún resultado coincide!",
		placeholder_text_multiple: "Seleccione una Cotización"
	});
/*
	$(".select_cliente").chosen({
		max_selected_options: 10,
		no_results_text: "Ningún resultado coincide!",
		placeholder_text_multiple: "Seleccione un Cliente"
	});
*/
});

</script>

@endsection

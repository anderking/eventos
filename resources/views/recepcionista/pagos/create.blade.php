@extends ('admin.template.main')

@section('title','Recepcionista-Pagos-Create')
@section('body_class','recepcionista_pagos_create')
@section('main_class','recepcionista_pagos_create')
@section('content')

<div class="text-center page-header">
	<h1 class="text-center">Registro de Pagos</h1>
</div>
@if(count($evento->pagos)!=$evento->nro_cuotas)
{!! Form::open(array('route' => 'recepcionista.pagos.store','method' => 'POST','class'=>'form-horizontal')) !!}
<div class="panel panel-primary box_flot">
	<div class="panel-heading">
		<h3 class="panel-title">Registrar Pago</h3>
	</div>
	<div class="panel-body">
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-12">
				<!--<div class="form-group">
					{!! Form::label('evento_id', 'Evento:',['class'=>'col-xs-12 col-sm-2 col-md-4 control-label']) !!}
					<div class="col-xs-12 col-sm-10 col-md-5">
						{!! Form::select('evento_id', $evento, null, ['class'=>'form-control select_evento']) !!}
					</div>
				</div>-->
				<div class="form-group">
					{!! Form::label('descripcion', 'Descripción:',['class'=>'col-xs-12 col-sm-2 col-md-4 control-label']) !!}
					<div class="col-xs-12 col-sm-10 col-md-5">
						{!! Form::text('descripcion', null, ['class'=>'form-control','placeholder'=>'Descripción','required']) !!}
					</div>
				</div>
				<div class="form-group">
					{!! Form::label('fecha_pago', 'Fecha Pago:',['class'=>'col-xs-12 col-sm-2 col-md-4 control-label']) !!}
					<div class="col-xs-12 col-sm-10 col-md-5">
						{!! Form::date('fecha_pago', null, ['class'=>'form-control','required']) !!}
					</div>
				</div>
				<div class="form-group">
					{!! Form::label('importe', 'Importe:',['class'=>'col-xs-12 col-sm-2 col-md-4 control-label']) !!}
					<div class="col-xs-12 col-sm-10 col-md-5">
						{!! Form::text('importe', number_format( ($evento->cotizacion->monto_presupuesto/$evento->nro_cuotas)+($evento->cotizacion->monto_presupuesto/$evento->nro_cuotas)*$configrecep->porc_cuota, 2, '.', ''), ['class'=>'form-control','placeholder'=>'Importe','required','readonly']) !!}
					</div>
				</div>
				<div class="form-group">
					{!! Form::label('metodo_pago', 'Metodo de Pago:',['class'=>'col-xs-12 col-sm-2 col-md-4 control-label']) !!}
					<div class="col-xs-12 col-sm-10 col-md-5">
						{!! Form::select('metodo_pago', array(''=>'Seleccione un Metodo','Efectivo' => 'Efectivo', 'Transferencia' => 'Transferencia','Deposito'=>'Deposito','Debito'=>'Debito','Credito'=>'Credito'), '', ['class'=>'form-control','required']) !!}
					</div>
				</div>
				<div class="form-group">
					{!! Form::label('referencia_bancaria', 'Numero de Referencia:',['class'=>'col-xs-12 col-sm-2 col-md-4 control-label']) !!}
					<div class="col-xs-12 col-sm-10 col-md-5">
						{!! Form::text('referencia_bancaria', null, ['id'=>'referencia_bancaria','class'=>'form-control','placeholder'=>'Numero de Referencia','required']) !!}
					</div>
				</div>
				{!! Form::hidden('estatus','Pen') !!}
				{!! Form::hidden('evento_id',$evento->id) !!}

			</div>
	</div>
</div>
	<div class="panel-footer">
		<div class="row">
			<div class="col-xs-12 col-sm-offset-2 col-sm-10 col-md-offset-4 col-md-8">
				{!! Form::submit('Registrar',['class'=>'btn btn-info']) !!}
				{!! Form::reset('Cancelar',['class'=>'btn btn-primary']) !!}
				<a href="{{ route('recepcionista.pagos.index') }}" class="btn btn-default">Regresar</a>
			</div>
		</div>
	</div>
{!! Form::close() !!}
@else
	<div class="jumbotron">
		<h1>Este Evento ya tiene todas las Cuotas registradas</h1>
	</div>
		<div class="text-center">
		<a href="{{ route('recepcionista.eventos.index') }}" class="btn btn-default"><i class="fa fa-arrow-left" aria-hidden="true"></i>Regresar</a>
	</div>
@endif

@endsection

@section('js')

<script>

$( document ).ready(function() {

	$("#referencia_bancaria").keypress(function (key) {
		window.console.log(key.charCode)
		if ( 
				(key.charCode <48 || key.charCode >57) && //0-9
				(key.charCode != 127 && key.charCode != 46)//delete y punto
			)
	                return false;
	});

	$(".select_evento").chosen({
		max_selected_options: 10,
		no_results_text: "Ningún resultado coincide!",
		placeholder_text_multiple: "Seleccione un Evento"
	});

});

</script>

@endsection

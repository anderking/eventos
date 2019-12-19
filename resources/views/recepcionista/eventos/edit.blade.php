@extends ('admin.template.main')

@section('title','Recepcionista-Eventos-Edit')
@section('body_class','recepcionista_eventos_edit')
@section('main_class','recepcionista_eventos_edit')

@section('content')

<div class="text-center page-header">
	<h1 class="text-center">Actualización del Evento</h1>
</div>

{!! Form::open(array('route' => ['recepcionista.eventos.update',$evento],'method' => 'PUT','files' => true,'class'=>'form-horizontal')) !!}
<div class="panel panel-primary box_flot">
	<div class="panel-heading">
		<h3 class="panel-title">Editar Evento {{$evento->cotizacion->descripcion}}</h3>
	</div>
	<div class="panel-body">
		<div class="row">
			<div class="col-md-12">
				<div class="form-group">
					{!! Form::label('fecha_evento', 'Fecha Evento:',['class'=>'col-xs-12 col-sm-2 col-md-4 control-label']) !!}
					<div class="col-xs-12 col-sm-10 col-md-5">
						{!! Form::date('fecha_evento', $evento->fecha_evento, ['class'=>'form-control','required']) !!}
					</div>
				</div>
				<div class="form-group">
					{!! Form::label('hora_inicio', 'Hora Inicio:',['class'=>'col-xs-12 col-sm-2 col-md-4 control-label']) !!}
					<div class="col-xs-12 col-sm-10 col-md-5">
						{!! Form::time('hora_inicio', $evento->hora_inicio, ['class'=>'form-control','required']) !!}
					</div>
				</div>
				<div class="form-group">
					{!! Form::label('hora_fin', 'Hora Fin:',['class'=>'col-xs-12 col-sm-2 col-md-4 control-label']) !!}
					<div class="col-xs-12 col-sm-10 col-md-5">
						{!! Form::time('hora_fin', $evento->hora_fin, ['class'=>'form-control','required']) !!}
					</div>
				</div>
				@if(count($evento->pagos)<=0)
				<div class="form-group">
					{!! Form::label('nro_cuotas', 'Numero de cuotas:',['class'=>'col-xs-12 col-sm-2 col-md-4 control-label']) !!}
					<div class="col-xs-12 col-sm-10 col-md-6">
						@for ($i = 0; $i < $configrecep->indicador_cuota; $i++)
						<?php $i++ ?>
						@if($evento->nro_cuotas==$i)
						{!! Form::radio('nro_cuotas', $i,true,['required']) !!}
						{!! Form::label('nro_cuotas', $i.' cuotas',['class'=>'control-label']) !!}
						@else
						{!! Form::radio('nro_cuotas', $i,false,['required']) !!}
						{!! Form::label('nro_cuotas', $i.' cuotas',['class'=>'control-label']) !!}
						@endif
						<?php $i-- ?>
						@endfor
					</div>
				</div>
				@endif
			</div>
		</div>
	</div>
	<div class="panel-footer">
		<div class="row">
			<div class="col-xs-12 col-sm-offset-2 col-sm-10 col-md-offset-4 col-md-8">
				{!! Form::submit('Actualizar',['class'=>'btn btn-info']) !!}
				{!! Form::reset('Cancelar',['class'=>'btn btn-primary']) !!}
				<a href="{{ route('recepcionista.eventos.index') }}" class="btn btn-default">Regresar</a>
			</div>
		</div>
	</div>
</div>
{!! Form::close() !!}
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

});

</script>

@endsection
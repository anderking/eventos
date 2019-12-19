@extends ('admin.template.main')

@section('title','Recepcionista-Home-Config')
@section('body_class','recepcionista_home')
@section('main_class','recepcionista_home')

@section('content')

<div class="page-header">
  <h1 class="text-center">Configuraciones de Cuotas</h1>
  <h3 class="text-center">En esta sección se puede configurar los porcentajes de ganancia de las cuotas e indicar la cantidad de cuotas que se usaran para los pagos.</h3>
</div>

{!! Form::open(array('route' => 'recepcionista.configrecep.store','method' => 'POST','class'=>'form-horizontal')) !!}

<div class="panel panel-primary box_flot">
	<div class="panel-heading">
		<h3 class="panel-title">Registrar Configuracion de Cuotas</h3>
	</div>
	<div class="panel-body">
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-12">
				@if(!$configrecep)

					<div class="form-group">
						{!! Form::label('porc_cuota', 'Porcentaje de las Cuotas:',['class'=>'col-xs-12 col-sm-2 col-md-4 control-label']) !!}
						<div class="col-xs-12 col-sm-10 col-md-5">
							{!! Form::text('porc_cuota', null, ['id'=>'porc_cuota','class'=>'form-control','placeholder'=>'Procentaje Cuotas','required']) !!}
						</div>
					</div>
					<div class="form-group">
						{!! Form::label('indicador_cuota', 'Cantidad de Cuotas:',['class'=>'col-xs-12 col-sm-2 col-md-4 control-label']) !!}
						<div class="col-xs-12 col-sm-10 col-md-5">
							{!! Form::text('indicador_cuota', null, ['id'=>'indicador_cuota','class'=>'form-control','placeholder'=>'Cantidad Cuotas','required']) !!}
						</div>
					</div>

				@else
					
					<div class="form-group">
						{!! Form::label('porc_cuota', 'Porcentaje de las Cuotas:',['class'=>'col-xs-12 col-sm-2 col-md-4 control-label']) !!}
						<div class="col-xs-12 col-sm-10 col-md-5">
							{!! Form::text('porc_cuota', $configrecep->porc_cuota, ['id'=>'porc_cuota','class'=>'form-control','placeholder'=>'Procentaje Cuotas','required']) !!}
						</div>
					</div>
					<div class="form-group">
						{!! Form::label('indicador_cuota', 'Cantidad de Cuotas:',['class'=>'col-xs-12 col-sm-2 col-md-4 control-label']) !!}
						<div class="col-xs-12 col-sm-10 col-md-5">
							{!! Form::text('indicador_cuota', $configrecep->indicador_cuota, ['id'=>'indicador_cuota','class'=>'form-control','placeholder'=>'Cantidad Cuotas','required']) !!}
						</div>
					</div>

				@endif
			</div>
		</div>
	</div>
	<div class="panel-footer">
		<div class="row">
			<div class="col-xs-12 col-sm-offset-2 col-sm-10 col-md-offset-4 col-md-8">
				@if(!$configrecep)
				{!! Form::submit('Registrar',['class'=>'btn btn-info']) !!}
				@else
				{!! Form::submit('Actualizar',['class'=>'btn btn-info']) !!}
				@endif
				{!! Form::reset('Cancelar',['class'=>'btn btn-primary']) !!}
				<a href="{{ route('recepcionista.home.index') }}" class="btn btn-default">Regresar</a>
			</div>
		</div>
	</div>
</div>

@endsection

@section('js')

<script>

$( document ).ready(function() {

	$('#indicador_cuota,#porc_cuota').numeric(".");
	$("#indicador_cuota,#porc_cuota").keypress(function (key) {
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
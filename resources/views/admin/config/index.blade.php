@extends ('admin.template.main')

@section('title','Admin-Home-Config')
@section('body_class','admin_home')
@section('main_class','admin_home')

@section('content')

<div class="page-header">
  <h1 class="text-center">Configuraciones de Costos</h1>
  <h3 class="text-center">En esta sección se puede configurar los porcentajes de iva, de ganancia y la Moneda</h3>
</div>
<div class="panel panel-primary box_flot">
	<div class="panel-heading">
		<h3 class="panel-title">Registrar Configuracion de Costos</h3>
	</div>
	<div class="panel-body">
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-12">
				{!! Form::open(array('route' => 'admin.config.store','method' => 'POST','class'=>'form-horizontal')) !!}
				@if(!$config)
					<div class="form-group">
						{!! Form::label('porc_iva', 'Porcentaje del IVA:',['class'=>'col-xs-12 col-sm-2 col-md-4 control-label']) !!}
						<div class="col-xs-12 col-sm-10 col-md-5">
							{!! Form::text('porc_iva', null, ['id'=>'porc_iva','class'=>'form-control','placeholder'=>'IVA','required']) !!}
						</div>
					</div>
					<div class="form-group">
						{!! Form::label('margen_ganancia', 'Margen de Ganancia:',['class'=>'col-xs-12 col-sm-2 col-md-4 control-label']) !!}
						<div class="col-xs-12 col-sm-10 col-md-5">
							{!! Form::text('margen_ganancia', null, ['id'=>'margen_ganancia','class'=>'form-control','placeholder'=>'Margen Ganancia','required']) !!}
						</div>
					</div>
				<div class="form-group">
					{!! Form::label('moneda', 'Moneda:',['class'=>'col-xs-12 col-sm-2 col-md-4 control-label']) !!}
					<div class="col-xs-12 col-sm-10 col-md-5">
						{!! Form::select('moneda', array(''=>'Seleccione una moneda','Bsf' => 'Bolivares Fuertes', '$' => 'Dolar USA','C$'=>'Dolar Canadiense','€'=>'Euro','¥'=>'Yuan Chino','$COP'=>'Peso Colombiano','$CLP'=>'Peso Chileno','$DOP'=>'Peso Dominicano','$CUP'=>'Peso Cubano','$MXP'=>'Peso Mexicano','$URP'=>'Peso Uruguayo','$ARP'=>'Peso Argentino'), '', ['class'=>'form-control','required']) !!}
					</div>
				</div>
				@else
					<div class="form-group">
						{!! Form::label('porc_iva', 'Porcentaje del IVA:',['class'=>'col-xs-12 col-sm-2 col-md-4 control-label']) !!}
						<div class="col-xs-12 col-sm-10 col-md-5">
							{!! Form::text('porc_iva', $config->porc_iva, ['id'=>'porc_iva','class'=>'form-control','placeholder'=>'IVA','required']) !!}
						</div>
					</div>
					<div class="form-group">
						{!! Form::label('margen_ganancia', 'Margen de Ganancia:',['class'=>'col-xs-12 col-sm-2 col-md-4 control-label']) !!}
						<div class="col-xs-12 col-sm-10 col-md-5">
							{!! Form::text('margen_ganancia', $config->margen_ganancia, ['id'=>'margen_ganancia','class'=>'form-control','placeholder'=>'Margen Ganancia','required']) !!}
						</div>
					</div>
				<div class="form-group">
					{!! Form::label('moneda', 'Moneda:',['class'=>'col-xs-12 col-sm-2 col-md-4 control-label']) !!}
					<div class="col-xs-12 col-sm-10 col-md-5">
						{!! Form::select('moneda', array('Bsf' => 'Bolivares Fuertes', '$' => 'Dolar USA','C$'=>'Dolar Canadiense','€'=>'Euro','¥'=>'Yuan Chino','$COP'=>'Peso Colombiano','$CLP'=>'Peso Chileno','$DOP'=>'Peso Dominicano','$CUP'=>'Peso Cubano','$MXP'=>'Peso Mexicano','$URP'=>'Peso Uruguayo','$ARP'=>'Peso Argentino'), $config->moneda, ['class'=>'form-control','required']) !!}
					</div>
				</div>
				@endif
			</div>
		</div>
	</div>
	<div class="panel-footer">
		<div class="row">
			<div class="col-xs-12 col-sm-offset-2 col-sm-10 col-md-offset-4 col-md-8">
				@if(!$config)
				{!! Form::submit('Registrar',['class'=>'btn btn-info']) !!}
				@else
				{!! Form::submit('Actualizar',['class'=>'btn btn-info']) !!}
				@endif
				{!! Form::reset('Cancelar',['class'=>'btn btn-primary']) !!}
				<a href="{{ route('admin.home.index') }}" class="btn btn-default">Regresar</a>
			</div>
		</div>
	</div>
</div>

@endsection

@section('js')

<script>

$( document ).ready(function() {

	$('#porc_iva,#margen_ganancia').numeric(".");
	$("#porc_iva,#margen_ganancia").keypress(function (key) {
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
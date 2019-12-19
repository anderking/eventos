@extends ('admin.template.main')

@section('title','Recepcionista-Cliente-Edit')
@section('body_class','recepcionista_clientes_edit')
@section('main_class','recepcionista_clientes_edit')

@section('content')

<div class="text-center page-header">
	<h1 class="text-center">Actualización del Cliente</h1>
</div>

{!! Form::open(array('route' => ['recepcionista.clientes.update',$cliente],'method' => 'PUT','files' => true,'class'=>'form-horizontal')) !!}
<div class="panel panel-primary box_flot">
	<div class="panel-heading">
		<h3 class="panel-title">Editar Cliente {{$cliente->name}}</h3>
	</div>
	<div class="panel-body">
		<div class="row">
			<div class="col-md-12">
				<div class="form-group">
					{!! Form::label('cedula', 'Cedula:',['id'=>'cedula','class'=>'col-xs-12 col-sm-2 col-md-4 control-label']) !!}
					<div class="col-xs-12 col-sm-10 col-md-5">
						{!! Form::text('cedula', $cliente->cedula, ['class'=>'form-control','placeholder'=>'Cedula','required']) !!}
					</div>
				</div>
				<div class="form-group">
					{!! Form::label('name', 'Nombres:',['class'=>'col-xs-12 col-sm-2 col-md-4 control-label']) !!}
					<div class="col-xs-12 col-sm-10 col-md-5">
						{!! Form::text('name', $cliente->name, ['class'=>'form-control','placeholder'=>'Nombres','required']) !!}
					</div>
				</div>
				<div class="form-group">
					{!! Form::label('apellido', 'Apellidos:',['class'=>'col-xs-12 col-sm-2 col-md-4 control-label']) !!}
					<div class="col-xs-12 col-sm-10 col-md-5">
						{!! Form::text('apellido', $cliente->apellido, ['class'=>'form-control','placeholder'=>'Apellidos','required']) !!}
					</div>
				</div>
				<div class="form-group">
					{!! Form::label('type', 'Sexo:',['class'=>'col-xs-12 col-sm-2 col-md-4 control-label']) !!}
					<div class="col-xs-12 col-sm-10 col-md-5">
						@if($cliente->sex=="Masculino")
						{!! Form::label('sex', 'Masculino',['class'=>'control-label']) !!}
						{!! Form::radio('sex', 'Masculino',true,['required']) !!}
						{!! Form::label('sex', 'Femenino',['class'=>'control-label']) !!}
						{!! Form::radio('sex', 'Femenino',false,['required']) !!}
						@elseif($cliente->sex=="Femenino")
						{!! Form::label('sex', 'Masculino',['class'=>'control-label']) !!}
						{!! Form::radio('sex', 'Masculino',false,['required']) !!}
						{!! Form::label('sex', 'Femenino',['class'=>'control-label']) !!}
						{!! Form::radio('sex', 'Femenino',true,['required']) !!}
						@else
						{!! Form::label('sex', 'Masculino',['class'=>'control-label']) !!}
						{!! Form::radio('sex', 'Masculino',false,['required']) !!}
						{!! Form::label('sex', 'Femenino',['class'=>'control-label']) !!}
						{!! Form::radio('sex', 'Femenino',false,['required']) !!}
						@endif
					</div>
				</div>
				<div class="form-group">
					{!! Form::label('fecha_nac', 'Fecha de nacimiento:',['class'=>'col-xs-12 col-sm-2 col-md-4 control-label']) !!}
					<div class="col-xs-12 col-sm-10 col-md-5">
						{!! Form::date('fecha_nac', $cliente->fecha_nac, ['class'=>'form-control','required']) !!}
					</div>
				</div>
				<div class="form-group">
					{!! Form::label('type', 'Estado Civil:',['class'=>'col-xs-12 col-sm-2 col-md-4 control-label']) !!}
					<div class="col-xs-12 col-sm-10 col-md-5">
						@if($cliente->edo_civil=="Soltero")
						{!! Form::label('edo_civil', 'Soltero',['class'=>'control-label']) !!}
						{!! Form::radio('edo_civil', 'Soltero',true,['required']) !!}
						{!! Form::label('edo_civil', 'Casado',['class'=>'control-label']) !!}
						{!! Form::radio('edo_civil', 'Casado',false,['required']) !!}
						@elseif($cliente->edo_civil=="Casado")
						{!! Form::label('edo_civil', 'Soltero',['class'=>'control-label']) !!}
						{!! Form::radio('edo_civil', 'Soltero',false,['required']) !!}
						{!! Form::label('edo_civil', 'Casado',['class'=>'control-label']) !!}
						{!! Form::radio('edo_civil', 'Casado',true,['required']) !!}
						@else
						{!! Form::label('edo_civil', 'Soltero',['class'=>'control-label']) !!}
						{!! Form::radio('edo_civil', 'Soltero',false,['required']) !!}
						{!! Form::label('edo_civil', 'Casado',['class'=>'control-label']) !!}
						{!! Form::radio('edo_civil', 'Casado',false,['required']) !!}
						@endif
					</div>
				</div>
				<!--@foreach($cliente->hijos as $key=>$hijos)
				<?php $key#++ ?> 
				<div class="form-group">
					{!! Form::label('fecha_nac_hijo', 'Fecha de Nacimiento del Hijo '.$key.':',['class'=>'col-xs-12 col-sm-2 col-md-4 control-label']) !!}
					<div class="col-xs-12 col-sm-10 col-md-5">
						{!! Form::date('fecha_nac_hijo[]', $hijos->fecha_nac_hijo, ['class'=>'form-control','required']) !!}
					</div>
				</div>
				@endforeach-->
				<div class="form-group">
					{!! Form::label('email', 'E-Mail:',['class'=>'col-xs-12 col-sm-2 col-md-4 control-label']) !!}
					<div class="col-xs-12 col-sm-10 col-md-5">
						{!! Form::email('email', $cliente->email, ['class'=>'form-control','placeholder'=>'example@company.com','required']) !!}
					</div>
				</div>
				<div class="form-group">
					{!! Form::label('direccion', 'Direccion:',['class'=>'col-xs-12 col-sm-2 col-md-4 control-label']) !!}
					<div class="col-xs-12 col-sm-10 col-md-5">
						{!! Form::text('direccion', $cliente->direccion, ['class'=>'form-control','placeholder'=>'Direccion','required']) !!}
					</div>
				</div>
				<div class="form-group">
					{!! Form::label('telefono_movil', 'Teléfono Móvil:',['class'=>'col-xs-12 col-sm-2 col-md-4 control-label']) !!}
					<div class="col-xs-12 col-sm-10 col-md-5">
						{!! Form::text('telefono_movil',$cliente->telefono_movil, ['class'=>'form-control input-medium bfh-phone','data-format'=>'+58 (ddd) ddd-dddd','placeholder'=>'Ejemplo: +58 (ddd) ddd-dddd']) !!}
					</div>
				</div>
				<div class="form-group">
					{!! Form::label('telefono_ofic', 'Teléfono Oficina:',['class'=>'col-xs-12 col-sm-2 col-md-4 control-label']) !!}
					<div class="col-xs-12 col-sm-10 col-md-5">
						{!! Form::text('telefono_ofic',$cliente->telefono_ofic, ['class'=>'form-control input-medium bfh-phone','data-format'=>'+58 (ddd) ddd-dddd','placeholder'=>'Ejemplo: +58 (ddd) ddd-dddd']) !!}
					</div>
				</div>
				<div class="form-group">
					{!! Form::label('telefono_otro', 'Teléfono Otro:',['class'=>'col-xs-12 col-sm-2 col-md-4 control-label']) !!}
					<div class="col-xs-12 col-sm-10 col-md-5">
						{!! Form::text('telefono_otro',$cliente->telefono_otro, ['class'=>'form-control input-medium bfh-phone','data-format'=>'+58 (ddd) ddd-dddd','placeholder'=>'Ejemplo: +58 (ddd) ddd-dddd']) !!}
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
				<a href="{{ route('recepcionista.clientes.index') }}" class="btn btn-default">Regresar</a>
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
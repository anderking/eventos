@extends ('admin.template.main')

@section('title','Admin-Local-Create')
@section('body_class','admin_locales_create')
@section('main_class','admin_locales_create')
@section('content')

<div class="text-center page-header">
	<h1 class="text-center">Registro de Locales</h1>
</div>
@if(count($tipo_local_all)>0)
<div class="panel panel-primary box_flot">
	<div class="panel-heading">
		<h3 class="panel-title">Registrar Local</h3>
	</div>
	<div class="panel-body">
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-12">
				{!! Form::open(array('route' => 'admin.locales.store','method' => 'POST','class'=>'form-horizontal')) !!}
				<div class="form-group">
					{!! Form::label('tipo_local_id', 'Tipo Local:',['class'=>'col-xs-12 col-sm-2 col-md-4 control-label']) !!}
					<div class="col-xs-12 col-sm-10 col-md-5">
						{!! Form::select('tipo_local_id', $tipo_local, null, ['class'=>'form-control select_tipo_serv','required']) !!}
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
				<div class="form-group">
					{!! Form::label('direccion', 'Direccion:',['class'=>'col-xs-12 col-sm-2 col-md-4 control-label']) !!}
					<div class="col-xs-12 col-sm-10 col-md-5">
						{!! Form::text('direccion', null, ['class'=>'form-control','placeholder'=>'Direccion','required']) !!}
					</div>
				</div>
				<div class="form-group">
					{!! Form::label('capacidad', 'Capacidad:',['class'=>'col-xs-12 col-sm-2 col-md-4 control-label']) !!}
					<div class="col-xs-12 col-sm-10 col-md-5">
						{!! Form::text('capacidad', null, ['id'=>'capacidad','class'=>'form-control','placeholder'=>'Capacidad','required']) !!}
					</div>
				</div>
				<div class="form-group">
					{!! Form::label('type', 'Estacionamiento:',['class'=>'col-xs-12 col-sm-2 col-md-4 control-label']) !!}
					<div class="col-xs-12 col-sm-10 col-md-5">
						{!! Form::label('estacionamiento', 'Si',['class'=>'control-label']) !!}
						{!! Form::radio('estacionamiento', 'Si',false,['id'=>'estacionamiento_1','required','onchange'=>'habilitar_cantidad()']) !!}
						{!! Form::label('estacionamiento', 'No',['class'=>'control-label']) !!}
						{!! Form::radio('estacionamiento', 'No',false,['id'=>'estacionamiento_2','required','onchange'=>'habilitar_cantidad()']) !!}
					</div>
				</div>
				<div class="form-group">
					{!! Form::label('capacidad_est', 'Capacidad Estacionamiento:',['class'=>'col-xs-12 col-sm-2 col-md-4 control-label']) !!}
					<div class="col-xs-12 col-sm-10 col-md-5">
						{!! Form::text('capacidad_est', null, ['id'=>'capacidad_est','class'=>'form-control','placeholder'=>'Capacidad Estacionamiento','required','disabled']) !!}
					</div>
				</div>
				<div class="form-group">
					{!! Form::label('cant_baños', 'Cantidad de Baños:',['class'=>'col-xs-12 col-sm-2 col-md-4 control-label']) !!}
					<div class="col-xs-12 col-sm-10 col-md-5">
						{!! Form::text('cant_baños', null, ['id'=>'cant_baños','class'=>'form-control','placeholder'=>'Cantidad de Baños','required']) !!}
					</div>
				</div>
				<div class="form-group">
					{!! Form::label('vigilancia', 'Vigilancia Privada:',['class'=>'col-xs-12 col-sm-2 col-md-4 control-label']) !!}
					<div class="col-xs-12 col-sm-10 col-md-5">
						{!! Form::label('vigilancia', 'Si',['class'=>'control-label']) !!}
						{!! Form::radio('vigilancia', 'Si',false,['required']) !!}
						{!! Form::label('vigilancia', 'No',['class'=>'control-label']) !!}
						{!! Form::radio('vigilancia', 'No',false,['required']) !!}
					</div>
				</div>
				<div class="form-group">
					{!! Form::label('precio_alquiler', 'Precio Alquiler:',['class'=>'col-xs-12 col-sm-2 col-md-4 control-label']) !!}
					<div class="col-xs-12 col-sm-10 col-md-5">
						{!! Form::text('precio_alquiler', null, ['id'=>'precio_alquiler','class'=>'form-control','placeholder'=>'Precio Alquiler','required','onchange'=>'sumar()']) !!}
					</div>
				</div>
				<div class="form-group">
					{!! Form::label('IVA', 'IVA:',['class'=>'col-xs-12 col-sm-2 col-md-4 control-label']) !!}
					<div class="col-xs-12 col-sm-10 col-md-5">
						{!! Form::text('IVA', null, ['id'=>'IVA','class'=>'form-control','placeholder'=>'IVA','required','readonly']) !!}
					</div>
				</div>
				<div class="form-group">
					{!! Form::label('precio_venta', 'Precio Venta:',['class'=>'col-xs-12 col-sm-2 col-md-4 control-label']) !!}
					<div class="col-xs-12 col-sm-10 col-md-5">
						{!! Form::text('precio_venta', null, ['id'=>'precio_venta','class'=>'form-control','placeholder'=>'Precio Venta','required','readonly']) !!}
					</div>
				</div>
				<div class="form-group">
					{!! Form::label('cedula_admin', 'Cedula Administrador:',['class'=>'col-xs-12 col-sm-2 col-md-4 control-label']) !!}
					<div class="col-xs-12 col-sm-10 col-md-5">
						{!! Form::text('cedula_admin', null, ['class'=>'form-control','placeholder'=>'Cedula Administrador','required']) !!}
					</div>
				</div>
				<div class="form-group">
					{!! Form::label('name_admin', 'Nombres Administrador:',['class'=>'col-xs-12 col-sm-2 col-md-4 control-label']) !!}
					<div class="col-xs-12 col-sm-10 col-md-5">
						{!! Form::text('name_admin', null, ['class'=>'form-control','placeholder'=>'Nombres Administrador','required']) !!}
					</div>
				</div>
				<div class="form-group">
					{!! Form::label('apellido_admin', 'Apellidos Administrador:',['class'=>'col-xs-12 col-sm-2 col-md-4 control-label']) !!}
					<div class="col-xs-12 col-sm-10 col-md-5">
						{!! Form::text('apellido_admin', null, ['class'=>'form-control','placeholder'=>'Apellidos Administrador','required']) !!}
					</div>
				</div>
				<div class="form-group">
					{!! Form::label('email_admin', 'E-Mail Administrador:',['class'=>'col-xs-12 col-sm-2 col-md-4 control-label']) !!}
					<div class="col-xs-12 col-sm-10 col-md-5">
						{!! Form::email('email_admin', null, ['class'=>'form-control','placeholder'=>'example@company.com','required']) !!}
					</div>
				</div>
				<div class="form-group">
					{!! Form::label('telefono_movil', 'Teléfono Móvil:',['class'=>'col-xs-12 col-sm-2 col-md-4 control-label']) !!}
					<div class="col-xs-12 col-sm-10 col-md-5">
						{!! Form::text('telefono_movil',null, ['class'=>'form-control input-medium bfh-phone','data-format'=>'+58 (ddd) ddd-dddd','placeholder'=>'Ejemplo: +58 (ddd) ddd-dddd']) !!}
					</div>
				</div>
				<div class="form-group">
					{!! Form::label('telefono_ofic', 'Teléfono Oficina:',['class'=>'col-xs-12 col-sm-2 col-md-4 control-label']) !!}
					<div class="col-xs-12 col-sm-10 col-md-5">
						{!! Form::text('telefono_ofic',null, ['class'=>'form-control input-medium bfh-phone','data-format'=>'+58 (ddd) ddd-dddd','placeholder'=>'Ejemplo: +58 (ddd) ddd-dddd']) !!}
					</div>
				</div>
				<div class="form-group">
					{!! Form::label('telefono_otro', 'Teléfono Otro:',['class'=>'col-xs-12 col-sm-2 col-md-4 control-label']) !!}
					<div class="col-xs-12 col-sm-10 col-md-5">
						{!! Form::text('telefono_otro',null, ['class'=>'form-control input-medium bfh-phone','data-format'=>'+58 (ddd) ddd-dddd','placeholder'=>'Ejemplo: +58 (ddd) ddd-dddd']) !!}
					</div>
				</div>
				{!! Form::hidden('porc_iva',$config->porc_iva,['id'=>'porc_iva']) !!}
				{!! Form::hidden('margen_ganancia',$config->margen_ganancia,['id'=>'margen_ganancia']) !!}
			</div>
		</div>
	</div>
	<div class="panel-footer">
		<div class="row">
			<div class="col-xs-12 col-sm-offset-2 col-sm-10 col-md-offset-4 col-md-8">
				{!! Form::submit('Registrar',['class'=>'btn btn-info']) !!}
				{!! Form::reset('Cancelar',['class'=>'btn btn-primary','onclick'=>'deshabilitar()']) !!}
				<a href="{{ route('admin.locales.index') }}" class="btn btn-default">Regresar</a>
			</div>
		</div>
	</div>
</div>
{!! Form::close() !!}
@else
	<div class="jumbotron">
		<h1>No existen Tipo de Local registrados</h1>
		<p>No puede registrar un nuevo Local sin tener Tipo de Local, Por favor cree un Tipo de Local.</p>
		<h2><a href="{{ route('admin.tipolocales.create') }}" class="btn btn-primary">Nuevo Tipo Local</a></h2>
	</div>
@endif
@endsection


@section('js')

<script>

$( document ).ready(function() {

	$('#precio_alquiler').numeric(".");
	$("#precio_alquiler,#capacidad,#capacidad_est,#cant_baños,#cedula_admin").keypress(function (key) {
		window.console.log(key.charCode)
		if ( 
				(key.charCode <48 || key.charCode >57) && //0-9
				(key.charCode != 127 && key.charCode != 46)//delete y punto
			)
	                return false;
	});

});

</script>

<script>

	function sumar()
	{
		var compra = document.getElementById('precio_alquiler').value;
		var porc_iva = document.getElementById('porc_iva').value;
		var margen_ganancia = document.getElementById('margen_ganancia').value;	
		if(compra=="")
			compra=0.00;
		var iva = compra*porc_iva;
		var ganancia = compra*margen_ganancia;
		var venta = parseFloat(compra)+parseFloat(iva)+parseFloat(ganancia);
		document.getElementById('IVA').value=iva.toFixed(2);
		document.getElementById('precio_venta').value=venta.toFixed(2);
	}

	function habilitar_cantidad()
	{
		var radio_1 = document.getElementById('estacionamiento_1');
		var radio_2 = document.getElementById('estacionamiento_2');
		var capacidad_est = document.getElementById('capacidad_est');

		if(radio_1.checked && radio_1.value=="Si")
		{
			capacidad_est.disabled = false;
		}
		else if(radio_2.checked && radio_2.value=="No")
		{
			capacidad_est.disabled = true;
		}
		else
		{
			capacidad_est.disabled = true;
		}
	}
	function deshabilitar()
	{
		var capacidad_est = document.getElementById('capacidad_est');
		capacidad_est.disabled = true;
	}
</script>
@endsection
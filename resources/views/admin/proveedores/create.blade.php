@extends ('admin.template.main')

@section('title','Admin-Proveedor-Create')
@section('body_class','admin_proveedores_create')
@section('main_class','admin_proveedores_create')
@section('content')

<div class="text-center page-header">
	<h1 class="text-center">Registro de Proveedores</h1>
</div>

<div class="panel panel-primary box_flot">
	<div class="panel-heading">
		<h3 class="panel-title">Registrar Proveedor</h3>
	</div>
	<div class="panel-body">
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-12">
				{!! Form::open(array('route' => 'admin.proveedores.store','method' => 'POST','class'=>'form-horizontal')) !!}

				<div class="form-group">
					{!! Form::label('rif', 'Rif:',['class'=>'col-xs-12 col-sm-2 col-md-4 control-label']) !!}
					<div class="col-xs-12 col-sm-10 col-md-5">
						<div class="row">
							<div class="col-xs-12 col-sm-4 col-md-3">
									{!! Form::select('letra_rif', array(''=>'RIF','V'=>'V','E'=>'E','P'=>'P','G'=>'G','J'=>'J','C'=>'C'), null, ['class'=>'form-control select_item','required']) !!}
							</div>
							<div class="col-xs-12 col-sm-8 col-md-9">
								{!! Form::text('rif', null, ['id'=>'rif','class'=>'form-control','placeholder'=>'Rif','required']) !!}
							</div>
						</div>
					</div>
				</div>
				<div class="form-group">
					{!! Form::label('razon_social', 'Razon Social:',['class'=>'col-xs-12 col-sm-2 col-md-4 control-label']) !!}
					<div class="col-xs-12 col-sm-10 col-md-5">
						{!! Form::text('razon_social', null, ['class'=>'form-control','placeholder'=>'Razon Social','required']) !!}
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
					{!! Form::label('email', 'E-Mail:',['class'=>'col-xs-12 col-sm-2 col-md-4 control-label']) !!}
					<div class="col-xs-12 col-sm-10 col-md-5">
						{!! Form::email('email', null, ['class'=>'form-control','placeholder'=>'example@company.com','required']) !!}
					</div>
				</div>
				<div class="form-group">
					{!! Form::label('type', 'Tiempo de Respuesta:',['class'=>'col-xs-12 col-sm-2 col-md-4 control-label']) !!}
					<div class="col-xs-12 col-sm-10 col-md-6">
						{!! Form::label('tiempo_respuesta', 'Excelente',['class'=>'control-label']) !!}
						{!! Form::radio('tiempo_respuesta', 'Excelente',false,['required']) !!}
						{!! Form::label('tiempo_respuesta', 'Muy Bueno',['class'=>'control-label']) !!}
						{!! Form::radio('tiempo_respuesta', 'Muy Bueno',false,['required']) !!}
						{!! Form::label('tiempo_respuesta', 'Bueno',['class'=>'control-label']) !!}
						{!! Form::radio('tiempo_respuesta', 'Bueno',false,['required']) !!}
						{!! Form::label('tiempo_respuesta', 'Regular',['class'=>'control-label']) !!}
						{!! Form::radio('tiempo_respuesta', 'Regular',false,['required']) !!}
						{!! Form::label('tiempo_respuesta', 'Malo',['class'=>'control-label']) !!}
						{!! Form::radio('tiempo_respuesta', 'Malo',false,['required']) !!}
						{!! Form::label('tiempo_respuesta', 'Muy Malo',['class'=>'control-label']) !!}
						{!! Form::radio('tiempo_respuesta', 'Muy Malo',false,['required']) !!}
						{!! Form::label('tiempo_respuesta', 'Pesimo',['class'=>'control-label']) !!}
						{!! Form::radio('tiempo_respuesta', 'Pesimo',false,['required']) !!}
					</div>
				</div>
				<div class="form-group">
					{!! Form::label('type', 'Desempeño:',['class'=>'col-xs-12 col-sm-2 col-md-4 control-label']) !!}
					<div class="col-xs-12 col-sm-10 col-md-6">
						{!! Form::label('desempeño', 'Excelente',['class'=>'control-label']) !!}
						{!! Form::radio('desempeño', 'Excelente',false,['required']) !!}
						{!! Form::label('desempeño', 'Muy Bueno',['class'=>'control-label']) !!}
						{!! Form::radio('desempeño', 'Muy Bueno',false,['required']) !!}
						{!! Form::label('desempeño', 'Bueno',['class'=>'control-label']) !!}
						{!! Form::radio('desempeño', 'Bueno',false,['required']) !!}
						{!! Form::label('desempeño', 'Regular',['class'=>'control-label']) !!}
						{!! Form::radio('desempeño', 'Regular',false,['required']) !!}
						{!! Form::label('desempeño', 'Malo',['class'=>'control-label']) !!}
						{!! Form::radio('desempeño', 'Malo',false,['required']) !!}
						{!! Form::label('desempeño', 'Muy Malo',['class'=>'control-label']) !!}
						{!! Form::radio('desempeño', 'Muy Malo',false,['required']) !!}
						{!! Form::label('desempeño', 'Pesimo',['class'=>'control-label']) !!}
						{!! Form::radio('desempeño', 'Pesimo',false,['required']) !!}
					</div>
				</div>
				<div class="form-group">
					{!! Form::label('type', 'Calidad:',['class'=>'col-xs-12 col-sm-2 col-md-4 control-label']) !!}
					<div class="col-xs-12 col-sm-10 col-md-6">
						{!! Form::label('calidad', 'Excelente',['class'=>'control-label']) !!}
						{!! Form::radio('calidad', 'Excelente',false,['required']) !!}
						{!! Form::label('calidad', 'Muy Bueno',['class'=>'control-label']) !!}
						{!! Form::radio('calidad', 'Muy Bueno',false,['required']) !!}
						{!! Form::label('calidad', 'Bueno',['class'=>'control-label']) !!}
						{!! Form::radio('calidad', 'Bueno',false,['required']) !!}
						{!! Form::label('calidad', 'Regular',['class'=>'control-label']) !!}
						{!! Form::radio('calidad', 'Regular',false,['required']) !!}
						{!! Form::label('calidad', 'Malo',['class'=>'control-label']) !!}
						{!! Form::radio('calidad', 'Malo',false,['required']) !!}
						{!! Form::label('calidad', 'Muy Malo',['class'=>'control-label']) !!}
						{!! Form::radio('calidad', 'Muy Malo',false,['required']) !!}
						{!! Form::label('calidad', 'Pesimo',['class'=>'control-label']) !!}
						{!! Form::radio('calidad', 'Pesimo',false,['required']) !!}
					</div>
				</div>

				<div class="form-group">
					{!! Form::label('type', 'Responsabilidad:',['class'=>'col-xs-12 col-sm-2 col-md-4 control-label']) !!}
					<div class="col-xs-12 col-sm-10 col-md-6">
						{!! Form::label('responsabilidad', 'Excelente',['class'=>'control-label']) !!}
						{!! Form::radio('responsabilidad', 'Excelente',false,['required']) !!}
						{!! Form::label('responsabilidad', 'Muy Bueno',['class'=>'control-label']) !!}
						{!! Form::radio('responsabilidad', 'Muy Bueno',false,['required']) !!}
						{!! Form::label('responsabilidad', 'Bueno',['class'=>'control-label']) !!}
						{!! Form::radio('responsabilidad', 'Bueno',false,['required']) !!}
						{!! Form::label('responsabilidad', 'Regular',['class'=>'control-label']) !!}
						{!! Form::radio('responsabilidad', 'Regular',false,['required']) !!}
						{!! Form::label('responsabilidad', 'Malo',['class'=>'control-label']) !!}
						{!! Form::radio('responsabilidad', 'Malo',false,['required']) !!}
						{!! Form::label('responsabilidad', 'Muy Malo',['class'=>'control-label']) !!}
						{!! Form::radio('responsabilidad', 'Muy Malo',false,['required']) !!}
						{!! Form::label('responsabilidad', 'Pesimo',['class'=>'control-label']) !!}
						{!! Form::radio('responsabilidad', 'Pesimo',false,['required']) !!}
					</div>
				</div>

				<div class="form-group">
					{!! Form::label('type', 'Atención:',['class'=>'col-xs-12 col-sm-2 col-md-4 control-label']) !!}
					<div class="col-xs-12 col-sm-10 col-md-6">
						{!! Form::label('atencion', 'Excelente',['class'=>'control-label']) !!}
						{!! Form::radio('atencion', 'Excelente',false,['required']) !!}
						{!! Form::label('atencion', 'Muy Bueno',['class'=>'control-label']) !!}
						{!! Form::radio('atencion', 'Muy Bueno',false,['required']) !!}
						{!! Form::label('atencion', 'Bueno',['class'=>'control-label']) !!}
						{!! Form::radio('atencion', 'Bueno',false,['required']) !!}
						{!! Form::label('atencion', 'Regular',['class'=>'control-label']) !!}
						{!! Form::radio('atencion', 'Regular',false,['required']) !!}
						{!! Form::label('atencion', 'Malo',['class'=>'control-label']) !!}
						{!! Form::radio('atencion', 'Malo',false,['required']) !!}
						{!! Form::label('atencion', 'Muy Malo',['class'=>'control-label']) !!}
						{!! Form::radio('atencion', 'Muy Malo',false,['required']) !!}
						{!! Form::label('atencion', 'Pesimo',['class'=>'control-label']) !!}
						{!! Form::radio('atencion', 'Pesimo',false,['required']) !!}
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
				<div class="form-group">
					{!! Form::label('name_prov', 'Nombres del Representante:',['class'=>'col-xs-12 col-sm-2 col-md-4 control-label']) !!}
					<div class="col-xs-12 col-sm-10 col-md-5">
						{!! Form::text('name_prov', null, ['class'=>'form-control','placeholder'=>'Nombre Representante','required']) !!}
					</div>
				</div>
				<div class="form-group">
					{!! Form::label('apellido_prov', 'Apellidos del Representante:',['class'=>'col-xs-12 col-sm-2 col-md-4 control-label']) !!}
					<div class="col-xs-12 col-sm-10 col-md-5">
						{!! Form::text('apellido_prov', null, ['class'=>'form-control','placeholder'=>'Apellidos Representante','required']) !!}
					</div>
				</div>
				<div class="form-group">
					{!! Form::label('cedula_prov', 'Cedula del Representante:',['class'=>'col-xs-12 col-sm-2 col-md-4 control-label']) !!}
					<div class="col-xs-12 col-sm-10 col-md-5">
						{!! Form::text('cedula_prov',null, ['id'=>'cedula','class'=>'form-control','placeholder'=>'Cedula Representante','required']) !!}
					</div>
				</div>
				<div class="form-group">
					{!! Form::label('email_prov', 'E-Mail del Representante:',['class'=>'col-xs-12 col-sm-2 col-md-4 control-label']) !!}
					<div class="col-xs-12 col-sm-10 col-md-5">
						{!! Form::email('email_prov', null, ['class'=>'form-control','placeholder'=>'example@company.com','required']) !!}
					</div>
				</div>
				<div class="form-group">
					{!! Form::label('telefono_movil_prov', 'Teléfono Movil del Representante:',['class'=>'col-xs-12 col-sm-2 col-md-4 control-label']) !!}
					<div class="col-xs-12 col-sm-10 col-md-5">
						{!! Form::text('telefono_movil_prov',null, ['class'=>'form-control input-medium bfh-phone','data-format'=>'+58 (ddd) ddd-dddd','placeholder'=>'Ejemplo: +58 (ddd) ddd-dddd']) !!}
					</div>
				</div>
				<div class="form-group">
					{!! Form::label('telefono_ofic_prov', 'Teléfono Oficina del Representante:',['class'=>'col-xs-12 col-sm-2 col-md-4 control-label']) !!}
					<div class="col-xs-12 col-sm-10 col-md-5">
						{!! Form::text('telefono_ofic_prov',null, ['class'=>'form-control input-medium bfh-phone','data-format'=>'+58 (ddd) ddd-dddd','placeholder'=>'Ejemplo: +58 (ddd) ddd-dddd']) !!}
					</div>
				</div>
				<div class="form-group">
					{!! Form::label('telefono_otro_prov', 'Teléfono Otro del Representante:',['class'=>'col-xs-12 col-sm-2 col-md-4 control-label']) !!}
					<div class="col-xs-12 col-sm-10 col-md-5">
						{!! Form::text('telefono_otro_prov',null, ['class'=>'form-control input-medium bfh-phone','data-format'=>'+58 (ddd) ddd-dddd','placeholder'=>'Ejemplo: +58 (ddd) ddd-dddd']) !!}
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
				<a href="{{ route('admin.proveedores.index') }}" class="btn btn-default">Regresar</a>
			</div>
		</div>
	</div>
</div>
{!! Form::close() !!}

@endsection

 @section('js')

 <script>
	$("#rif,#cedula").keypress(function (key) {
		window.console.log(key.charCode)
		if (
				(key.charCode <47 || key.charCode >58) && //0-9
				(key.charCode != 127)
			)
	                return false;
	});
</script>

@endsection
@extends ('admin.template.main')

@section('title','Admin-User-Create')
@section('body_class','admin_users_create')
@section('main_class','admin_users_create')
@section('content')

<div class="text-center page-header">
	<h1 class="text-center">Registro de Usuarios</h1>
</div>

@if(count($rol_all)>0)

<div class="panel panel-primary box_flot">
	<div class="panel-heading">
		<h3 class="panel-title">Registrar Usuario</h3>
	</div>
	<div class="panel-body">
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-12">
				{!! Form::open(array('route' => 'admin.users.store','method' => 'POST','class'=>'form-horizontal')) !!}
				<div class="form-group">
					{!! Form::label('rol_id', 'Rol:',['class'=>'col-xs-12 col-sm-2 col-md-4 control-label']) !!}
					<div class="col-xs-12 col-sm-10 col-md-5">
						{!! Form::select('rol_id', $rol, null, ['class'=>'form-control select_tipo_serv','required']) !!}
					</div>
				</div>
				<div class="form-group">
					{!! Form::label('email', 'E-Mail:',['class'=>'col-xs-12 col-sm-2 col-md-4 control-label']) !!}
					<div class="col-xs-12 col-sm-10 col-md-5">
						{!! Form::email('email', null, ['class'=>'form-control','placeholder'=>'example@company.com','required']) !!}
					</div>
				</div>
				<div class="form-group">
					{!! Form::label('password', 'Contraseña:',['class'=>'col-xs-12 col-sm-2 col-md-4 control-label']) !!}
					<div class="col-xs-12 col-sm-10 col-md-5">
						{!! Form::password('password', ['class'=>'form-control','placeholder'=>'Password','required']) !!}
					</div>
				</div>
				<div class="form-group">
					{!! Form::label('cedula', 'Cedula:',['class'=>'col-xs-12 col-sm-2 col-md-4 control-label']) !!}
					<div class="col-xs-12 col-sm-10 col-md-5">
						{!! Form::text('cedula', null, ['class'=>'form-control','placeholder'=>'Cedula','required']) !!}
					</div>
				</div>
				<div class="form-group">
					{!! Form::label('name', 'Nombres:',['class'=>'col-xs-12 col-sm-2 col-md-4 control-label']) !!}
					<div class="col-xs-12 col-sm-10 col-md-5">
						{!! Form::text('name', null, ['class'=>'form-control','placeholder'=>'Nombres','required']) !!}
					</div>
				</div>
				<div class="form-group">
					{!! Form::label('apellido', 'Apellidos:',['class'=>'col-xs-12 col-sm-2 col-md-4 control-label']) !!}
					<div class="col-xs-12 col-sm-10 col-md-5">
						{!! Form::text('apellido', null, ['class'=>'form-control','placeholder'=>'Apellidos','required']) !!}
					</div>
				</div>
				<div class="form-group">
					{!! Form::label('type', 'Sexo:',['class'=>'col-xs-12 col-sm-2 col-md-4 control-label']) !!}
					<div class="col-xs-12 col-sm-10 col-md-5">
						{!! Form::label('sex', 'Masculino',['class'=>'control-label']) !!}
						{!! Form::radio('sex', 'Masculino',false,['required']) !!}
						{!! Form::label('sex', 'Femenino',['class'=>'control-label']) !!}
						{!! Form::radio('sex', 'Femenino',false,['required']) !!}
					</div>
				</div>
				<div class="form-group">
					{!! Form::label('fecha', 'Fecha de nacimiento:',['class'=>'col-xs-12 col-sm-2 col-md-4 control-label']) !!}
					<div class="col-xs-12 col-sm-10 col-md-5">
						{!! Form::date('fecha', null, ['class'=>'form-control','required']) !!}
					</div>
				</div>
				<div class="form-group">
					{!! Form::label('direccion', 'Dirección:',['class'=>'col-xs-12 col-sm-2 col-md-4 control-label']) !!}
					<div class="col-xs-12 col-sm-10 col-md-5">
						{!! Form::text('direccion',null, ['class'=>'form-control','placeholder'=>'Nombre']) !!}
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
			</div>
		</div>
	</div>
	<div class="panel-footer">
		<div class="row">
			<div class="col-xs-12 col-sm-offset-2 col-sm-10 col-md-offset-4 col-md-8">
				{!! Form::submit('Registrar',['class'=>'btn btn-info']) !!}
				{!! Form::reset('Cancelar',['class'=>'btn btn-primary']) !!}
				<a href="{{ route('admin.users.index') }}" class="btn btn-default">Regresar</a>
			</div>
		</div>
	</div>
</div>
{!! Form::close() !!}

@else
	<div class="jumbotron">
		<h1>No existen Roles registrados</h1>
		<p>No puede registrar un nuevo Usuario sin tener Roles, Por favor cree un Rol.</p>
		<h2><a href="{{ route('admin.roles.create') }}" class="btn btn-primary">Nuevo Rol</a></h2>
	</div>
@endif

@endsection
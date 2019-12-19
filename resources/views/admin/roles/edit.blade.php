@extends ('admin.template.main')

@section('title','Admin-Rol-Edit')
@section('body_class','admin_roles_edit')
@section('main_class','admin_roles_edit')

@section('content')

<div class="text-center page-header">
	<h1 class="text-center">Actualización del Rol</h1>
</div>

{!! Form::open(array('route' => ['admin.roles.update',$rol],'method' => 'PUT','files' => true,'class'=>'form-horizontal')) !!}
<div class="panel panel-primary box_flot">
	<div class="panel-heading">
		<h3 class="panel-title">Editar Rol {{$rol->name}}</h3>
	</div>
	<div class="panel-body">
		<div class="row">
			<div class="col-md-12">
				<!--<div class="form-group">
					{!! Form::label('name', 'Nombre:',['class'=>'col-xs-12 col-sm-2 col-md-4 control-label']) !!}
					<div class="col-xs-12 col-sm-10 col-md-5">
						{!! Form::select('name', array('Administrador' => 'Administrador', 'Recepcionista' => 'Recepcionista'), null, ['class'=>'form-control','required']) !!}
					</div>
				</div>-->
				<div class="form-group">
					{!! Form::label('descripcion', 'Descripcion:',['class'=>'col-xs-12 col-sm-2 col-md-4 control-label']) !!}
					<div class="col-xs-12 col-sm-10 col-md-5">
						{!! Form::text('descripcion', $rol->descripcion, ['class'=>'form-control','placeholder'=>'Descripcion','required']) !!}
					</div>
				</div>
				<div class="form-group">
					{!! Form::label('estatus', 'Estatus:',['class'=>'col-xs-12 col-sm-2 col-md-4 control-label']) !!}
					<div class="col-xs-12 col-sm-10 col-md-5">
						{!! Form::select('estatus', array('A' => 'Activo', 'I' => 'Inactivo'), $rol->estatus, ['class'=>'form-control','required']) !!}
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
				<a href="{{ route('admin.roles.index') }}" class="btn btn-default">Regresar</a>
			</div>
		</div>
	</div>
</div>
{!! Form::close() !!}
@endsection
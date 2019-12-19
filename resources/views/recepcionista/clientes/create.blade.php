@extends ('admin.template.main')

@section('title','Recepcionista-Cliente-Create')
@section('body_class','recepcionista_clientes_create')
@section('main_class','recepcionista_clientes_create')
@section('content')

<div class="text-center page-header">
	<h1 class="text-center">Registro de Clientes</h1>
</div>

<div class="panel panel-primary box_flot">
	<div class="panel-heading">
		<h3 class="panel-title">Registrar Cliente</h3>
	</div>
	<div class="panel-body">
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-12">
				{!! Form::open(array('route' => 'recepcionista.clientes.store','method' => 'POST','class'=>'form-horizontal')) !!}

				<div class="form-group">
					{!! Form::label('cedula', 'Cedula:',['id'=>'cedula','class'=>'col-xs-12 col-sm-2 col-md-4 control-label']) !!}
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
					{!! Form::label('fecha_nac', 'Fecha de nacimiento:',['class'=>'col-xs-12 col-sm-2 col-md-4 control-label']) !!}
					<div class="col-xs-12 col-sm-10 col-md-5">
						{!! Form::date('fecha_nac', date('Y-m-d'), ['class'=>'form-control','required']) !!}
					</div>
				</div>
				<div class="form-group">
					{!! Form::label('type', 'Estado Civil:',['class'=>'col-xs-12 col-sm-2 col-md-4 control-label']) !!}
					<div class="col-xs-12 col-sm-10 col-md-5">
						{!! Form::label('edo_civil', 'Soltero',['class'=>'control-label']) !!}
						{!! Form::radio('edo_civil', 'Soltero',false,['required']) !!}
						{!! Form::label('edo_civil', 'Casado',['class'=>'control-label']) !!}
						{!! Form::radio('edo_civil', 'Casado',false,['required']) !!}
					</div>
				</div>
				<!--div class="form-group">
					{!! Form::label('cant_hijos', 'Cantidad de Hijos:',['id'=>'cant_hijos','class'=>'col-xs-12 col-sm-2 col-md-4 control-label']) !!}
					<div class="col-xs-12 col-sm-10 col-md-5">
						{!! Form::text('cant_hijos', null, ['id'=>'cant_hijos','class'=>'form-control','placeholder'=>'Cantidad de Hijos','required']) !!}
					</div>
				</div>-->
				
				<!--<div id ="input1" class="form-group clonedInput">
					{!! Form::label('fecha_nac_hijo', 'Fecha de nacimiento Hijo(Si tiene):',['class'=>'col-xs-12 col-sm-2 col-md-4 control-label']) !!}
					<div class="col-xs-12 col-sm-8 col-md-5">
						{!! Form::date('fecha_nac_hijo[]', null, ['class'=>'form-control']) !!}
					</div>
				</div>

				<div class="form-group">
					{!! Form::label('hijos', 'Agregar si tiene mas hijos:',['class'=>'col-xs-12 col-sm-2 col-md-4 control-label']) !!}
					<div class="col-xs-12 col-sm-2 col-md-3">
						{!! Form::button('Agregar',['id'=>'btnAdd','class'=>'btn btn-primary']) !!}
						{!! Form::button('Quitar',['id'=>'btnDel','class'=>'btn btn-danger']) !!}
					</div>
				</div>-->

				<div class="form-group">
					{!! Form::label('email', 'E-Mail:',['class'=>'col-xs-12 col-sm-2 col-md-4 control-label']) !!}
					<div class="col-xs-12 col-sm-10 col-md-5">
						{!! Form::email('email', null, ['class'=>'form-control','placeholder'=>'example@company.com','required']) !!}
					</div>
				</div>
				<div class="form-group">
					{!! Form::label('direccion', 'Direccion:',['class'=>'col-xs-12 col-sm-2 col-md-4 control-label']) !!}
					<div class="col-xs-12 col-sm-10 col-md-5">
						{!! Form::text('direccion', null, ['class'=>'form-control','placeholder'=>'Direccion','required']) !!}
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
				<a href="{{ route('recepcionista.clientes.index') }}" class="btn btn-default">Regresar</a>
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

$('#btnDel').attr('disabled','disabled');
  $('#btnAdd').click(function() {
    var num = $('.clonedInput').length; // how many "duplicatable" input fields we currently have
    var newNum = new Number(num + 1); // the numeric ID of the new input field being added
 
    // create the new element via clone(), and manipulate it's ID using newNum value
    var newElem = $('#input' + num).clone().attr('id', 'input' + newNum);
 
    // manipulate the name/id values of the input inside the new element
    //newElem.children(':last>input').attr('id', 'name' + newNum).attr('name', 'name' + newNum);
 
    // insert the new element after the last "duplicatable" input field
    $('#input' + num).after(newElem);
 
    // enable the "remove" button
    $('#btnDel').attr('disabled',false);
 
    // business rule: you can only add 10 names
    if (newNum == 10)
      $('#btnAdd').attr('disabled','disabled');
  });
 
  $('#btnDel').click(function() {
    var num = $('.clonedInput').length; // how many "duplicatable" input fields we currently have
    $('#input' + num).remove(); // remove the last element
 
    // enable the "add" button
    $('#btnAdd').attr('disabled',false);
 
    // if only one element remains, disable the "remove" button
    if (num-1 == 1)
      $('#btnDel').attr('disabled','disabled');
  });

});

</script>

@endsection

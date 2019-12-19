@extends ('admin.template.main')

@section('title','Admin-Proveedor-Edit')
@section('body_class','admin_proveedores_edit')
@section('main_class','admin_proveedores_edit')

@section('content')

<div class="text-center page-header">
	<h1 class="text-center">Actualización del Proveedor</h1>
</div>

{!! Form::open(array('route' => ['admin.proveedores.update',$proveedor],'method' => 'PUT','files' => true,'class'=>'form-horizontal')) !!}
<div class="panel panel-primary box_flot">
	<div class="panel-heading">
		<h3 class="panel-title">Editar Proveedor {{$proveedor->razon_social}}</h3>
	</div>
	<div class="panel-body">
		<div class="row">
			<div class="col-md-12">

				<div class="form-group">
					{!! Form::label('rif', 'Rif:',['class'=>'col-xs-12 col-sm-2 col-md-4 control-label']) !!}
					<div class="col-xs-12 col-sm-10 col-md-5">
						<div class="row">
							<div class="col-xs-12 col-sm-4 col-md-3">
									{!! Form::select('letra_rif', array('V'=>'V','E'=>'E','P'=>'P','G'=>'G','J'=>'J','C'=>'C'), $proveedor->letra_rif, ['class'=>'form-control select_item','required']) !!}
							</div>
							<div class="col-xs-12 col-sm-8 col-md-9">
								{!! Form::text('rif', $proveedor->rif, ['id'=>'rif','class'=>'form-control','placeholder'=>'Rif','required']) !!}
							</div>
						</div>
					</div>
				</div>
				<div class="form-group">
					{!! Form::label('razon_social', 'Razon Social:',['class'=>'col-xs-12 col-sm-2 col-md-4 control-label']) !!}
					<div class="col-xs-12 col-sm-10 col-md-5">
						{!! Form::text('razon_social', $proveedor->razon_social, ['class'=>'form-control','placeholder'=>'Razon Social','required']) !!}
					</div>
				</div>
				<div class="form-group">
					{!! Form::label('descripcion', 'Descripcion:',['class'=>'col-xs-12 col-sm-2 col-md-4 control-label']) !!}
					<div class="col-xs-12 col-sm-10 col-md-5">
						{!! Form::text('descripcion', $proveedor->descripcion, ['class'=>'form-control','placeholder'=>'Descripcion','required']) !!}
					</div>
				</div>
				<div class="form-group">
					{!! Form::label('direccion', 'Direccion:',['class'=>'col-xs-12 col-sm-2 col-md-4 control-label']) !!}
					<div class="col-xs-12 col-sm-10 col-md-5">
						{!! Form::text('direccion', $proveedor->direccion, ['class'=>'form-control','placeholder'=>'Direccion','required']) !!}
					</div>
				</div>
				<div class="form-group">
					{!! Form::label('email', 'E-Mail:',['class'=>'col-xs-12 col-sm-2 col-md-4 control-label']) !!}
					<div class="col-xs-12 col-sm-10 col-md-5">
						{!! Form::email('email', $proveedor->email, ['class'=>'form-control','placeholder'=>'example@company.com','required']) !!}
					</div>
				</div>
				<div class="form-group">
					{!! Form::label('type', 'Tiempo de Respuesta:',['class'=>'col-xs-12 col-sm-2 col-md-4 control-label']) !!}
					<div class="col-xs-12 col-sm-10 col-md-6">
						@if($proveedor->tiempo_respuesta=="Excelente")
						{!! Form::label('tiempo_respuesta', 'Excelente',['class'=>'control-label']) !!}
						{!! Form::radio('tiempo_respuesta', 'Excelente',true,['required']) !!}
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
						@elseif($proveedor->tiempo_respuesta=="Muy Bueno")
						{!! Form::label('tiempo_respuesta', 'Excelente',['class'=>'control-label']) !!}
						{!! Form::radio('tiempo_respuesta', 'Excelente',false,['required']) !!}
						{!! Form::label('tiempo_respuesta', 'Muy Bueno',['class'=>'control-label']) !!}
						{!! Form::radio('tiempo_respuesta', 'Muy Bueno',true,['required']) !!}
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
						@elseif($proveedor->tiempo_respuesta=='Bueno')
						{!! Form::label('tiempo_respuesta', 'Excelente',['class'=>'control-label']) !!}
						{!! Form::radio('tiempo_respuesta', 'Excelente',false,['required']) !!}
						{!! Form::label('tiempo_respuesta', 'Muy Bueno',['class'=>'control-label']) !!}
						{!! Form::radio('tiempo_respuesta', 'Muy Bueno',true,['required']) !!}
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
						@elseif($proveedor->tiempo_respuesta=='Regular')
						{!! Form::label('tiempo_respuesta', 'Excelente',['class'=>'control-label']) !!}
						{!! Form::radio('tiempo_respuesta', 'Excelente',false,['required']) !!}
						{!! Form::label('tiempo_respuesta', 'Muy Bueno',['class'=>'control-label']) !!}
						{!! Form::radio('tiempo_respuesta', 'Muy Bueno',false,['required']) !!}
						{!! Form::label('tiempo_respuesta', 'Bueno',['class'=>'control-label']) !!}
						{!! Form::radio('tiempo_respuesta', 'Bueno',false,['required']) !!}
						{!! Form::label('tiempo_respuesta', 'Regular',['class'=>'control-label']) !!}
						{!! Form::radio('tiempo_respuesta', 'Regular',true,['required']) !!}
						{!! Form::label('tiempo_respuesta', 'Malo',['class'=>'control-label']) !!}
						{!! Form::radio('tiempo_respuesta', 'Malo',false,['required']) !!}
						{!! Form::label('tiempo_respuesta', 'Muy Malo',['class'=>'control-label']) !!}
						{!! Form::radio('tiempo_respuesta', 'Muy Malo',false,['required']) !!}
						{!! Form::label('tiempo_respuesta', 'Pesimo',['class'=>'control-label']) !!}
						{!! Form::radio('tiempo_respuesta', 'Pesimo',false,['required']) !!}
						@elseif($proveedor->tiempo_respuesta=="Malo")
						{!! Form::label('tiempo_respuesta', 'Excelente',['class'=>'control-label']) !!}
						{!! Form::radio('tiempo_respuesta', 'Excelente',false,['required']) !!}
						{!! Form::label('tiempo_respuesta', 'Muy Bueno',['class'=>'control-label']) !!}
						{!! Form::radio('tiempo_respuesta', 'Muy Bueno',false,['required']) !!}
						{!! Form::label('tiempo_respuesta', 'Bueno',['class'=>'control-label']) !!}
						{!! Form::radio('tiempo_respuesta', 'Bueno',false,['required']) !!}
						{!! Form::label('tiempo_respuesta', 'Regular',['class'=>'control-label']) !!}
						{!! Form::radio('tiempo_respuesta', 'Regular',false,['required']) !!}
						{!! Form::label('tiempo_respuesta', 'Malo',['class'=>'control-label']) !!}
						{!! Form::radio('tiempo_respuesta', 'Malo',true,['required']) !!}
						{!! Form::label('tiempo_respuesta', 'Muy Malo',['class'=>'control-label']) !!}
						{!! Form::radio('tiempo_respuesta', 'Muy Malo',false,['required']) !!}
						{!! Form::label('tiempo_respuesta', 'Pesimo',['class'=>'control-label']) !!}
						{!! Form::radio('tiempo_respuesta', 'Pesimo',false,['required']) !!}
						@elseif($proveedor->tiempo_respuesta=="Muy Malo")
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
						{!! Form::radio('tiempo_respuesta', 'Muy Malo',true,['required']) !!}
						{!! Form::label('tiempo_respuesta', 'Pesimo',['class'=>'control-label']) !!}
						{!! Form::radio('tiempo_respuesta', 'Pesimo',false,['required']) !!}
						@elseif($proveedor->tiempo_respuesta=="Pesimo")
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
						{!! Form::radio('tiempo_respuesta', 'Pesimo',true,['required']) !!}
						@else
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
						@endif
					</div>
				</div>
				<div class="form-group">
					{!! Form::label('type', 'Desempeño:',['class'=>'col-xs-12 col-sm-2 col-md-4 control-label']) !!}
					<div class="col-xs-12 col-sm-10 col-md-6">
						@if($proveedor->desempeño=="Excelente")
						{!! Form::label('desempeño', 'Excelente',['class'=>'control-label']) !!}
						{!! Form::radio('desempeño', 'Excelente',true,['required']) !!}
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
						@elseif($proveedor->desempeño=="Muy Bueno")
						{!! Form::label('desempeño', 'Excelente',['class'=>'control-label']) !!}
						{!! Form::radio('desempeño', 'Excelente',false,['required']) !!}
						{!! Form::label('desempeño', 'Muy Bueno',['class'=>'control-label']) !!}
						{!! Form::radio('desempeño', 'Muy Bueno',true,['required']) !!}
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
						@elseif($proveedor->desempeño=='Bueno')
						{!! Form::label('desempeño', 'Excelente',['class'=>'control-label']) !!}
						{!! Form::radio('desempeño', 'Excelente',false,['required']) !!}
						{!! Form::label('desempeño', 'Muy Bueno',['class'=>'control-label']) !!}
						{!! Form::radio('desempeño', 'Muy Bueno',true,['required']) !!}
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
						@elseif($proveedor->desempeño=='Regular')
						{!! Form::label('desempeño', 'Excelente',['class'=>'control-label']) !!}
						{!! Form::radio('desempeño', 'Excelente',false,['required']) !!}
						{!! Form::label('desempeño', 'Muy Bueno',['class'=>'control-label']) !!}
						{!! Form::radio('desempeño', 'Muy Bueno',false,['required']) !!}
						{!! Form::label('desempeño', 'Bueno',['class'=>'control-label']) !!}
						{!! Form::radio('desempeño', 'Bueno',false,['required']) !!}
						{!! Form::label('desempeño', 'Regular',['class'=>'control-label']) !!}
						{!! Form::radio('desempeño', 'Regular',true,['required']) !!}
						{!! Form::label('desempeño', 'Malo',['class'=>'control-label']) !!}
						{!! Form::radio('desempeño', 'Malo',false,['required']) !!}
						{!! Form::label('desempeño', 'Muy Malo',['class'=>'control-label']) !!}
						{!! Form::radio('desempeño', 'Muy Malo',false,['required']) !!}
						{!! Form::label('desempeño', 'Pesimo',['class'=>'control-label']) !!}
						{!! Form::radio('desempeño', 'Pesimo',false,['required']) !!}
						@elseif($proveedor->desempeño=="Malo")
						{!! Form::label('desempeño', 'Excelente',['class'=>'control-label']) !!}
						{!! Form::radio('desempeño', 'Excelente',false,['required']) !!}
						{!! Form::label('desempeño', 'Muy Bueno',['class'=>'control-label']) !!}
						{!! Form::radio('desempeño', 'Muy Bueno',false,['required']) !!}
						{!! Form::label('desempeño', 'Bueno',['class'=>'control-label']) !!}
						{!! Form::radio('desempeño', 'Bueno',false,['required']) !!}
						{!! Form::label('desempeño', 'Regular',['class'=>'control-label']) !!}
						{!! Form::radio('desempeño', 'Regular',false,['required']) !!}
						{!! Form::label('desempeño', 'Malo',['class'=>'control-label']) !!}
						{!! Form::radio('desempeño', 'Malo',true,['required']) !!}
						{!! Form::label('desempeño', 'Muy Malo',['class'=>'control-label']) !!}
						{!! Form::radio('desempeño', 'Muy Malo',false,['required']) !!}
						{!! Form::label('desempeño', 'Pesimo',['class'=>'control-label']) !!}
						{!! Form::radio('desempeño', 'Pesimo',false,['required']) !!}
						@elseif($proveedor->desempeño=="Muy Malo")
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
						{!! Form::radio('desempeño', 'Muy Malo',true,['required']) !!}
						{!! Form::label('desempeño', 'Pesimo',['class'=>'control-label']) !!}
						{!! Form::radio('desempeño', 'Pesimo',false,['required']) !!}
						@elseif($proveedor->desempeño=="Pesimo")
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
						{!! Form::radio('desempeño', 'Pesimo',true,['required']) !!}
						@else
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
						@endif
					</div>
				</div>
				<div class="form-group">
					{!! Form::label('type', 'Calidad:',['class'=>'col-xs-12 col-sm-2 col-md-4 control-label']) !!}
					<div class="col-xs-12 col-sm-10 col-md-6">
						@if($proveedor->calidad=="Excelente")
						{!! Form::label('calidad', 'Excelente',['class'=>'control-label']) !!}
						{!! Form::radio('calidad', 'Excelente',true,['required']) !!}
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
						@elseif($proveedor->calidad=="Muy Bueno")
						{!! Form::label('calidad', 'Excelente',['class'=>'control-label']) !!}
						{!! Form::radio('calidad', 'Excelente',false,['required']) !!}
						{!! Form::label('calidad', 'Muy Bueno',['class'=>'control-label']) !!}
						{!! Form::radio('calidad', 'Muy Bueno',true,['required']) !!}
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
						@elseif($proveedor->calidad=='Bueno')
						{!! Form::label('calidad', 'Excelente',['class'=>'control-label']) !!}
						{!! Form::radio('calidad', 'Excelente',false,['required']) !!}
						{!! Form::label('calidad', 'Muy Bueno',['class'=>'control-label']) !!}
						{!! Form::radio('calidad', 'Muy Bueno',true,['required']) !!}
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
						@elseif($proveedor->calidad=='Regular')
						{!! Form::label('calidad', 'Excelente',['class'=>'control-label']) !!}
						{!! Form::radio('calidad', 'Excelente',false,['required']) !!}
						{!! Form::label('calidad', 'Muy Bueno',['class'=>'control-label']) !!}
						{!! Form::radio('calidad', 'Muy Bueno',false,['required']) !!}
						{!! Form::label('calidad', 'Bueno',['class'=>'control-label']) !!}
						{!! Form::radio('calidad', 'Bueno',false,['required']) !!}
						{!! Form::label('calidad', 'Regular',['class'=>'control-label']) !!}
						{!! Form::radio('calidad', 'Regular',true,['required']) !!}
						{!! Form::label('calidad', 'Malo',['class'=>'control-label']) !!}
						{!! Form::radio('calidad', 'Malo',false,['required']) !!}
						{!! Form::label('calidad', 'Muy Malo',['class'=>'control-label']) !!}
						{!! Form::radio('calidad', 'Muy Malo',false,['required']) !!}
						{!! Form::label('calidad', 'Pesimo',['class'=>'control-label']) !!}
						{!! Form::radio('calidad', 'Pesimo',false,['required']) !!}
						@elseif($proveedor->calidad=="Malo")
						{!! Form::label('calidad', 'Excelente',['class'=>'control-label']) !!}
						{!! Form::radio('calidad', 'Excelente',false,['required']) !!}
						{!! Form::label('calidad', 'Muy Bueno',['class'=>'control-label']) !!}
						{!! Form::radio('calidad', 'Muy Bueno',false,['required']) !!}
						{!! Form::label('calidad', 'Bueno',['class'=>'control-label']) !!}
						{!! Form::radio('calidad', 'Bueno',false,['required']) !!}
						{!! Form::label('calidad', 'Regular',['class'=>'control-label']) !!}
						{!! Form::radio('calidad', 'Regular',false,['required']) !!}
						{!! Form::label('calidad', 'Malo',['class'=>'control-label']) !!}
						{!! Form::radio('calidad', 'Malo',true,['required']) !!}
						{!! Form::label('calidad', 'Muy Malo',['class'=>'control-label']) !!}
						{!! Form::radio('calidad', 'Muy Malo',false,['required']) !!}
						{!! Form::label('calidad', 'Pesimo',['class'=>'control-label']) !!}
						{!! Form::radio('calidad', 'Pesimo',false,['required']) !!}
						@elseif($proveedor->calidad=="Muy Malo")
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
						{!! Form::radio('calidad', 'Muy Malo',true,['required']) !!}
						{!! Form::label('calidad', 'Pesimo',['class'=>'control-label']) !!}
						{!! Form::radio('calidad', 'Pesimo',false,['required']) !!}
						@elseif($proveedor->calidad=="Pesimo")
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
						{!! Form::radio('calidad', 'Pesimo',true,['required']) !!}
						@else
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
						@endif
					</div>
				</div>

				<div class="form-group">
					{!! Form::label('type', 'Responsabilidad:',['class'=>'col-xs-12 col-sm-2 col-md-4 control-label']) !!}
					<div class="col-xs-12 col-sm-10 col-md-6">
						@if($proveedor->responsabilidad=="Excelente")
						{!! Form::label('responsabilidad', 'Excelente',['class'=>'control-label']) !!}
						{!! Form::radio('responsabilidad', 'Excelente',true,['required']) !!}
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
						@elseif($proveedor->responsabilidad=="Muy Bueno")
						{!! Form::label('responsabilidad', 'Excelente',['class'=>'control-label']) !!}
						{!! Form::radio('responsabilidad', 'Excelente',false,['required']) !!}
						{!! Form::label('responsabilidad', 'Muy Bueno',['class'=>'control-label']) !!}
						{!! Form::radio('responsabilidad', 'Muy Bueno',true,['required']) !!}
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
						@elseif($proveedor->responsabilidad=='Bueno')
						{!! Form::label('responsabilidad', 'Excelente',['class'=>'control-label']) !!}
						{!! Form::radio('responsabilidad', 'Excelente',false,['required']) !!}
						{!! Form::label('responsabilidad', 'Muy Bueno',['class'=>'control-label']) !!}
						{!! Form::radio('responsabilidad', 'Muy Bueno',true,['required']) !!}
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
						@elseif($proveedor->responsabilidad=='Regular')
						{!! Form::label('responsabilidad', 'Excelente',['class'=>'control-label']) !!}
						{!! Form::radio('responsabilidad', 'Excelente',false,['required']) !!}
						{!! Form::label('responsabilidad', 'Muy Bueno',['class'=>'control-label']) !!}
						{!! Form::radio('responsabilidad', 'Muy Bueno',false,['required']) !!}
						{!! Form::label('responsabilidad', 'Bueno',['class'=>'control-label']) !!}
						{!! Form::radio('responsabilidad', 'Bueno',false,['required']) !!}
						{!! Form::label('responsabilidad', 'Regular',['class'=>'control-label']) !!}
						{!! Form::radio('responsabilidad', 'Regular',true,['required']) !!}
						{!! Form::label('responsabilidad', 'Malo',['class'=>'control-label']) !!}
						{!! Form::radio('responsabilidad', 'Malo',false,['required']) !!}
						{!! Form::label('responsabilidad', 'Muy Malo',['class'=>'control-label']) !!}
						{!! Form::radio('responsabilidad', 'Muy Malo',false,['required']) !!}
						{!! Form::label('responsabilidad', 'Pesimo',['class'=>'control-label']) !!}
						{!! Form::radio('responsabilidad', 'Pesimo',false,['required']) !!}
						@elseif($proveedor->responsabilidad=="Malo")
						{!! Form::label('responsabilidad', 'Excelente',['class'=>'control-label']) !!}
						{!! Form::radio('responsabilidad', 'Excelente',false,['required']) !!}
						{!! Form::label('responsabilidad', 'Muy Bueno',['class'=>'control-label']) !!}
						{!! Form::radio('responsabilidad', 'Muy Bueno',false,['required']) !!}
						{!! Form::label('responsabilidad', 'Bueno',['class'=>'control-label']) !!}
						{!! Form::radio('responsabilidad', 'Bueno',false,['required']) !!}
						{!! Form::label('responsabilidad', 'Regular',['class'=>'control-label']) !!}
						{!! Form::radio('responsabilidad', 'Regular',false,['required']) !!}
						{!! Form::label('responsabilidad', 'Malo',['class'=>'control-label']) !!}
						{!! Form::radio('responsabilidad', 'Malo',true,['required']) !!}
						{!! Form::label('responsabilidad', 'Muy Malo',['class'=>'control-label']) !!}
						{!! Form::radio('responsabilidad', 'Muy Malo',false,['required']) !!}
						{!! Form::label('responsabilidad', 'Pesimo',['class'=>'control-label']) !!}
						{!! Form::radio('responsabilidad', 'Pesimo',false,['required']) !!}
						@elseif($proveedor->responsabilidad=="Muy Malo")
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
						{!! Form::radio('responsabilidad', 'Muy Malo',true,['required']) !!}
						{!! Form::label('responsabilidad', 'Pesimo',['class'=>'control-label']) !!}
						{!! Form::radio('responsabilidad', 'Pesimo',false,['required']) !!}
						@elseif($proveedor->responsabilidad=="Pesimo")
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
						{!! Form::radio('responsabilidad', 'Pesimo',true,['required']) !!}
						@else
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
						@endif
					</div>
				</div>

				<div class="form-group">
					{!! Form::label('type', 'Atención:',['class'=>'col-xs-12 col-sm-2 col-md-4 control-label']) !!}
					<div class="col-xs-12 col-sm-10 col-md-6">
						@if($proveedor->atencion=="Excelente")
						{!! Form::label('atencion', 'Excelente',['class'=>'control-label']) !!}
						{!! Form::radio('atencion', 'Excelente',true,['required']) !!}
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
						@elseif($proveedor->atencion=="Muy Bueno")
						{!! Form::label('atencion', 'Excelente',['class'=>'control-label']) !!}
						{!! Form::radio('atencion', 'Excelente',false,['required']) !!}
						{!! Form::label('atencion', 'Muy Bueno',['class'=>'control-label']) !!}
						{!! Form::radio('atencion', 'Muy Bueno',true,['required']) !!}
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
						@elseif($proveedor->atencion=='Bueno')
						{!! Form::label('atencion', 'Excelente',['class'=>'control-label']) !!}
						{!! Form::radio('atencion', 'Excelente',false,['required']) !!}
						{!! Form::label('atencion', 'Muy Bueno',['class'=>'control-label']) !!}
						{!! Form::radio('atencion', 'Muy Bueno',true,['required']) !!}
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
						@elseif($proveedor->atencion=='Regular')
						{!! Form::label('atencion', 'Excelente',['class'=>'control-label']) !!}
						{!! Form::radio('atencion', 'Excelente',false,['required']) !!}
						{!! Form::label('atencion', 'Muy Bueno',['class'=>'control-label']) !!}
						{!! Form::radio('atencion', 'Muy Bueno',false,['required']) !!}
						{!! Form::label('atencion', 'Bueno',['class'=>'control-label']) !!}
						{!! Form::radio('atencion', 'Bueno',false,['required']) !!}
						{!! Form::label('atencion', 'Regular',['class'=>'control-label']) !!}
						{!! Form::radio('atencion', 'Regular',true,['required']) !!}
						{!! Form::label('atencion', 'Malo',['class'=>'control-label']) !!}
						{!! Form::radio('atencion', 'Malo',false,['required']) !!}
						{!! Form::label('atencion', 'Muy Malo',['class'=>'control-label']) !!}
						{!! Form::radio('atencion', 'Muy Malo',false,['required']) !!}
						{!! Form::label('atencion', 'Pesimo',['class'=>'control-label']) !!}
						{!! Form::radio('atencion', 'Pesimo',false,['required']) !!}
						@elseif($proveedor->atencion=="Malo")
						{!! Form::label('atencion', 'Excelente',['class'=>'control-label']) !!}
						{!! Form::radio('atencion', 'Excelente',false,['required']) !!}
						{!! Form::label('atencion', 'Muy Bueno',['class'=>'control-label']) !!}
						{!! Form::radio('atencion', 'Muy Bueno',false,['required']) !!}
						{!! Form::label('atencion', 'Bueno',['class'=>'control-label']) !!}
						{!! Form::radio('atencion', 'Bueno',false,['required']) !!}
						{!! Form::label('atencion', 'Regular',['class'=>'control-label']) !!}
						{!! Form::radio('atencion', 'Regular',false,['required']) !!}
						{!! Form::label('atencion', 'Malo',['class'=>'control-label']) !!}
						{!! Form::radio('atencion', 'Malo',true,['required']) !!}
						{!! Form::label('atencion', 'Muy Malo',['class'=>'control-label']) !!}
						{!! Form::radio('atencion', 'Muy Malo',false,['required']) !!}
						{!! Form::label('atencion', 'Pesimo',['class'=>'control-label']) !!}
						{!! Form::radio('atencion', 'Pesimo',false,['required']) !!}
						@elseif($proveedor->atencion=="Muy Malo")
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
						{!! Form::radio('atencion', 'Muy Malo',true,['required']) !!}
						{!! Form::label('atencion', 'Pesimo',['class'=>'control-label']) !!}
						{!! Form::radio('atencion', 'Pesimo',false,['required']) !!}
						@elseif($proveedor->atencion=="Pesimo")
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
						{!! Form::radio('atencion', 'Pesimo',true,['required']) !!}
						@else
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
						@endif
					</div>
				</div>

				<div class="form-group">
					{!! Form::label('telefono_movil', 'Teléfono Móvil:',['class'=>'col-xs-12 col-sm-2 col-md-4 control-label']) !!}
					<div class="col-xs-12 col-sm-10 col-md-5">
						{!! Form::text('telefono_movil',$proveedor->telefono_movil, ['class'=>'form-control input-medium bfh-phone','data-format'=>'+58 (ddd) ddd-dddd','placeholder'=>'Ejemplo: +58 (ddd) ddd-dddd']) !!}
					</div>
				</div>
				<div class="form-group">
					{!! Form::label('telefono_ofic', 'Teléfono Oficina:',['class'=>'col-xs-12 col-sm-2 col-md-4 control-label']) !!}
					<div class="col-xs-12 col-sm-10 col-md-5">
						{!! Form::text('telefono_ofic',$proveedor->telefono_ofic, ['class'=>'form-control input-medium bfh-phone','data-format'=>'+58 (ddd) ddd-dddd','placeholder'=>'Ejemplo: +58 (ddd) ddd-dddd']) !!}
					</div>
				</div>
				<div class="form-group">
					{!! Form::label('telefono_otro', 'Teléfono Otro:',['class'=>'col-xs-12 col-sm-2 col-md-4 control-label']) !!}
					<div class="col-xs-12 col-sm-10 col-md-5">
						{!! Form::text('telefono_otro',$proveedor->telefono_otro, ['class'=>'form-control input-medium bfh-phone','data-format'=>'+58 (ddd) ddd-dddd','placeholder'=>'Ejemplo: +58 (ddd) ddd-dddd']) !!}
					</div>
				</div>
				<div class="form-group">
					{!! Form::label('name_prov', 'Nombres del Representante:',['class'=>'col-xs-12 col-sm-2 col-md-4 control-label']) !!}
					<div class="col-xs-12 col-sm-10 col-md-5">
						{!! Form::text('name_prov', $proveedor->name_prov, ['class'=>'form-control','placeholder'=>'Nombre Representante','required']) !!}
					</div>
				</div>
				<div class="form-group">
					{!! Form::label('apellido_prov', 'Apellidos del Representante:',['class'=>'col-xs-12 col-sm-2 col-md-4 control-label']) !!}
					<div class="col-xs-12 col-sm-10 col-md-5">
						{!! Form::text('apellido_prov', $proveedor->apellido_prov, ['class'=>'form-control','placeholder'=>'Apellidos Representante','required']) !!}
					</div>
				</div>
				<div class="form-group">
					{!! Form::label('cedula_prov', 'Cedula del Representante:',['class'=>'col-xs-12 col-sm-2 col-md-4 control-label']) !!}
					<div class="col-xs-12 col-sm-10 col-md-5">
						{!! Form::text('cedula_prov',$proveedor->cedula_prov, ['id'=>'cedula','class'=>'form-control','placeholder'=>'Cedula Representante','required']) !!}
					</div>
				</div>
				<div class="form-group">
					{!! Form::label('email_prov', 'E-Mail del Representante:',['class'=>'col-xs-12 col-sm-2 col-md-4 control-label']) !!}
					<div class="col-xs-12 col-sm-10 col-md-5">
						{!! Form::email('email_prov', $proveedor->email_prov, ['class'=>'form-control','placeholder'=>'example@company.com','required']) !!}
					</div>
				</div>
				<div class="form-group">
					{!! Form::label('telefono_movil_prov', 'Teléfono Movil del Representante:',['class'=>'col-xs-12 col-sm-2 col-md-4 control-label']) !!}
					<div class="col-xs-12 col-sm-10 col-md-5">
						{!! Form::text('telefono_movil_prov',$proveedor->telefono_movil_prov, ['class'=>'form-control input-medium bfh-phone','data-format'=>'+58 (ddd) ddd-dddd','placeholder'=>'Ejemplo: +58 (ddd) ddd-dddd']) !!}
					</div>
				</div>
				<div class="form-group">
					{!! Form::label('telefono_ofic_prov', 'Teléfono Oficina del Representante:',['class'=>'col-xs-12 col-sm-2 col-md-4 control-label']) !!}
					<div class="col-xs-12 col-sm-10 col-md-5">
						{!! Form::text('telefono_ofic_prov',$proveedor->telefono_ofic_prov, ['class'=>'form-control input-medium bfh-phone','data-format'=>'+58 (ddd) ddd-dddd','placeholder'=>'Ejemplo: +58 (ddd) ddd-dddd']) !!}
					</div>
				</div>
				<div class="form-group">
					{!! Form::label('telefono_otro_prov', 'Teléfono Otro del Representante:',['class'=>'col-xs-12 col-sm-2 col-md-4 control-label']) !!}
					<div class="col-xs-12 col-sm-10 col-md-5">
						{!! Form::text('telefono_otro_prov',$proveedor->telefono_otro_prov, ['class'=>'form-control input-medium bfh-phone','data-format'=>'+58 (ddd) ddd-dddd','placeholder'=>'Ejemplo: +58 (ddd) ddd-dddd']) !!}
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
				<a href="{{ route('admin.proveedores.index') }}" class="btn btn-default">Regresar</a>
			</div>
		</div>
	</div>
</div>
{!! Form::close() !!}
@endsection
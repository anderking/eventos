@extends ('admin.template.main')
<?php
  $ruta = Request::Url();
  $fullruta = Request::fullUrl();
?>
@section('title','Admin-Proveedor')
@section('body_class','admin_proveedores_index')
@section('main_class','admin_proveedores_index')
@section('content')

<h1 class="text-center">Lista de Proveedores</h1>

<div class="row">
  <div class="col-xs-12 col-sm-6 col-md-6 text-center">
		<a href="{{ route('admin.proveedores.create') }}" class="btn btn-primary">Nuevo Proveedor</a>
  </div>
  <div class="col-xs-12 col-sm-6 col-md-6 text-center">
  	{!! Form::open(array('route' => 'admin.proveedores.index','method' => 'GET','class'=>'navbar-form')) !!}
    <div class="input-group">
      {!! Form::text('rif', null, ['class'=>'form-control','placeholder'=>'Buscar...','aria-describedby'=>'search','required']) !!}
      <span class="input-group-btn" >
        <button class="btn btn-info" type="submit"><i class="fa fa-search"></i></button>
      </span>
    </div>
    {!! Form::close() !!}
  </div>
</div>

@if (count($proveedor)>0)
<div class="table-responsive">
	<table class="table table-hover table-condensed">
		<thead>
			<tr>
				<th>ID</th>
				<th>Rif</th>
				<th>Razon Social</th>
				<th>Descripción</th>
				<th>Dirección</th>
        <th>Email</th>
        <th>Teléfono Movil</th>
        <th>Acción</th>
			</tr>
		</thead>
		<tbody>
			@foreach($proveedor as $proveedores)
			<tr>
				@if($proveedores->id<=9)
				<td><a href="{{ route('admin.proveedores.show',$proveedores->id) }}">P00{{ $proveedores->id }}</a></td>
				@elseif($proveedores->id>9 and $proveedores->id<=99)
				<td><a href="{{ route('admin.proveedores.show',$proveedores->id) }}">P0{{ $proveedores->id }}</a></td>
				@endif
				<td>{{ $proveedores->letra_rif }}{{ $proveedores->rif }}</td>
				<td>{{ $proveedores->razon_social }}</td>
				<td>{{ $proveedores->descripcion }}</td>
				<td>{{ $proveedores->direccion }}</td>
				<td><a>{{ $proveedores->email }}</a></td>
				<td>{{ $proveedores->telefono_movil }}</td>
				<td>
					<a class="btn btn-info" href="{{ route('admin.proveedores.edit',$proveedores->id)}}">Modificar</a>
					<a class="btn btn-danger" href="#" data-toggle="modal" data-target="#modal-delete-proveedores-{{$proveedores->id}}"><b>Eliminar</b>
				</td>
			</tr>
			@include('admin.template.partials.modal-delete-proveedores')
			@endforeach
		</tbody>
	</table>
</div>
@else
	<div class="jumbotron">
		<h1 class="text-center">No existen registros de Proveedores en nuestra Base de Datos</h1>
	</div>
	<div class="text-center">
		<a href="{{ URL::previous() }}" class="btn btn-default"><i class="fa fa-arrow-left" aria-hidden="true"></i>Regresar</a>
	</div>
@endif

@if(count($proveedor)>0)
	@if($ruta!=$fullruta)
		<div class="text-center">
			<a href="{{ URL::previous() }}" class="btn btn-default"><i class="fa fa-arrow-left" aria-hidden="true"></i>Regresar</a>
		</div>
	@endif
@endif

@endsection
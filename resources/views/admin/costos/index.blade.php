@extends ('admin.template.main')
<?php
  $ruta = Request::Url();
  $fullruta = Request::fullUrl();
?>
@section('title','Admin-Costo')
@section('body_class','admin_costos_index')
@section('main_class','admin_costos_index')
@section('content')

<h1 class="text-center">Lista de Costos</h1>

<div class="row">
  <div class="col-xs-12 col-sm-6 col-md-6 text-center">
		<a href="{{ route('admin.costos.create') }}" class="btn btn-primary">Nuevo Costo</a>
  </div>
  <div class="col-xs-12 col-sm-6 col-md-6 text-center">
  	{!! Form::open(array('route' => 'admin.costos.index','method' => 'GET','class'=>'navbar-form')) !!}
    <div class="input-group">
      {!! Form::text('id', null, ['class'=>'form-control','placeholder'=>'Buscar...','aria-describedby'=>'search','required']) !!}
      <span class="input-group-btn" >
        <button class="btn btn-info" type="submit"><i class="fa fa-search"></i></button>
      </span>
    </div>
    {!! Form::close() !!}
  </div>
</div>

@if (count($costo)>0)
<div class="table-responsive">
	<table class="table table-hover table-condensed">
		<thead>
			<tr>
				<th>ID</th>
        <th>Item</th>
        <th>Proveedor</th>
        <th>Fecha</th>
        <th>Precio Compra</th>
        <th>IVA</th>
        <th>Precio Venta</th>
        <th>Ganancia</th>
        <th>Acción</th>
			</tr>
		</thead>
		<tbody>
			@foreach($costo as $costos)
			<tr>
				@if($costos->id<=9)
				<td><a href="{{ route('admin.costos.show',$costos->id) }}">C00{{ $costos->id }}</a></td>
				@elseif($costos->id>9 and $costos->id<=99)
				<td><a href="{{ route('admin.costos.show',$costos->id) }}">C0{{ $costos->id }}</a></td>
				@endif
				<td><a href="{{ route('admin.items.show',$costos->item_id)}}">{{ $costos->item->descripcion}}</a></td>
				<td><a href="{{ route('admin.proveedores.show',$costos->proveedor_id)}}">{{ $costos->proveedor->razon_social}}</a></td>
				<td>{{ $costos->created_at }}</td>
				@if($config)
				<td>{{ $costos->precio_compra }} <b>{{$config->moneda}}</b></td>
				<td>{{ $costos->IVA }} <b>{{$config->moneda}}</b></td>
				<td>{{ $costos->precio_venta }} <b>{{$config->moneda}}</b></td>
				<td>{{ (1 - ($costos->precio_compra/$costos->precio_venta))*$costos->precio_venta }} <b>{{$config->moneda}}</b></td>
				@else
				<td>{{ $costos->precio_compra }}</td>
				<td>{{ $costos->IVA }}</td>
				<td>{{ $costos->precio_venta }}</td>
				<td>{{ (1 - ($costos->precio_compra/$costos->precio_venta))*$costos->precio_venta }}</td>
				@endif
				<td>
					<a class="btn btn-info" href="{{ route('admin.costos.edit',$costos->id)}}">Modificar</a>
					<a class="btn btn-danger" href="#" data-toggle="modal" data-target="#modal-delete-costos-{{$costos->id}}"><b>Eliminar</b>
				</td>
			</tr>
			@include('admin.template.partials.modal-delete-costos')
			@endforeach
		</tbody>
	</table>
</div>
@else
	<div class="jumbotron">
		<h1 class="text-center">No existen registros de Costos en nuestra Base de Datos</h1>
	</div>
	<div class="text-center">
		<a href="{{ URL::previous() }}" class="btn btn-default"><i class="fa fa-arrow-left" aria-hidden="true"></i>Regresar</a>
	</div>
@endif

@if(count($costo)>0)
	@if($ruta!=$fullruta)
		<div class="text-center">
			<a href="{{ URL::previous() }}" class="btn btn-default"><i class="fa fa-arrow-left" aria-hidden="true"></i>Regresar</a>
		</div>
	@endif
@endif

@endsection
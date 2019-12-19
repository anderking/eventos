@extends ('admin.template.main')
<?php
  $ruta = Request::Url();
  $fullruta = Request::fullUrl();
?>
@section('title','Admin-Item')
@section('body_class','admin_items_index')
@section('main_class','admin_items_index')
@section('content')

<h1 class="text-center">Lista de Items</h1>

<div class="row">
  <div class="col-xs-12 col-sm-6 col-md-6 text-center">
		<a href="{{ route('admin.items.create') }}" class="btn btn-primary">Nuevo Item</a>
  </div>
  <div class="col-xs-12 col-sm-6 col-md-6 text-center">
  	{!! Form::open(array('route' => 'admin.items.index','method' => 'GET','class'=>'navbar-form')) !!}
    <div class="input-group">
      {!! Form::text('id', null, ['class'=>'form-control','placeholder'=>'Buscar...','aria-describedby'=>'search','required']) !!}
      <span class="input-group-btn" >
        <button class="btn btn-info" type="submit"><i class="fa fa-search"></i></button>
      </span>
    </div>
    {!! Form::close() !!}
  </div>
</div>

@if (count($item)>0)
<div class="table-responsive">
	<table class="table table-hover table-condensed">
		<thead>
			<tr>
				<th>ID</th>
				<th>Tipo Servicio</th>
        <th>Servicio</th>
        <th>Descripcion</th>
        <th>Stock</th>
        <th>Acción</th>
			</tr>
		</thead>
		<tbody>
			@foreach($item as $items)
			<tr>
				@if($items->id<=9)
				<td><a href="{{ route('admin.items.show',$items->id) }}">I00{{ $items->id }}</a></td>
				@elseif($items->id>9 and $items->id<=99)
				<td><a href="{{ route('admin.items.show',$items->id) }}">I0{{ $items->id }}</a></td>
				@endif
				<td><a href="{{ route('admin.tiposervicios.show',$items->servicio->tipo_servicio->id) }}">{{ $items->servicio->tipo_servicio->name }}</a></td>
				<td><a href="{{ route('admin.servicios.show',$items->servicio->id) }}">{{ $items->servicio->name }}</a></td>
				<td>{{ $items->descripcion }}</td>
				<td>{{ $items->stock }}</td>
				<td>
					<a class="btn btn-info" href="{{ route('admin.items.edit',$items->id)}}">Modificar</a>
					<a class="btn btn-danger" href="#" data-toggle="modal" data-target="#modal-delete-items-{{$items->id}}"><b>Eliminar</b>
				</td>
			</tr>
			@include('admin.template.partials.modal-delete-items')
			@endforeach
		</tbody>
	</table>
</div>
@else
	<div class="jumbotron">
		<h1 class="text-center">No existen registros de Items en nuestra Base de Datos</h1>
	</div>
	<div class="text-center">
		<a href="{{ URL::previous() }}" class="btn btn-default"><i class="fa fa-arrow-left" aria-hidden="true"></i>Regresar</a>
	</div>
@endif

@if(count($item)>0)
	@if($ruta!=$fullruta)
		<div class="text-center">
			<a href="{{ URL::previous() }}" class="btn btn-default"><i class="fa fa-arrow-left" aria-hidden="true"></i>Regresar</a>
		</div>
	@endif
@endif

@endsection
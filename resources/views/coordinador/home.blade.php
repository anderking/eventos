@extends ('admin.template.main')

@section('title','Recepcionista-Home')
@section('body_class','recepcionista_home')
@section('main_class','recepcionista_home')

@section('content')

<div class="page-header">
	<h1 class="text-center">Bienvenido {{Auth::user()->rol->name}} {{ Auth::user()->name }} {{ Auth::user()->apellido }}</h1>
  <h1 class="text-center">Gestion de configuraciones</h1>
</div>

@endsection
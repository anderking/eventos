@extends ('admin.template.main')

@section('title','Planificador-Home')
@section('body_class','planificador_home')
@section('main_class','planificador_home')

@section('content')

<div class="page-header">
	<h1 class="text-center">Bienvenido {{Auth::user()->rol->name}} {{ Auth::user()->name }} {{ Auth::user()->apellido }}</h1>
</div>
<div class="jumbotron">
	<h1 class="text-center">Tienes {{ count($evento)}} Eventos por Planificar</h1>
	<div class="text-center">
		<a href="{{ route('planificador.listaeventos.index') }}" class="btn btn-primary">Ver Eventos</a>
	</div>
</div>
@endsection
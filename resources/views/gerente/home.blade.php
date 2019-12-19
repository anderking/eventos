@extends ('admin.template.main')

@section('title','Recepcionista-Home')
@section('body_class','planificador_home')
@section('main_class','planificador_home')

@section('content')


<div class="page-header">
	<h1 class="text-center">Bienvenido {{Auth::user()->rol->name}} {{ Auth::user()->name }} {{ Auth::user()->apellido }}</h1>
  <h1 class="text-center">Gestion de Reportes</h1>
</div>
<div class="jumbotron">
	<div class="container">
		<h1 class="text-center">Reportes Estadisticos</h1>
		<div class="row">
			<div class="col-md-12">
					<div class="text-center">
						<a href="#" data-toggle="modal" data-target="#modal-lista-servicios" class="btn btn-primary">Lista de Servicios registrados</a>
					</div>
					<div class="text-center">
						<a href="#" data-toggle="modal" data-target="#modal-lista-clientes" class="btn btn-primary">Lista de Clientes registrados</a>
					</div>
					<div class="text-center">
						<a href="#" class="btn btn-primary" data-toggle="collapse" data-target="#demo">Ver Grafica de Porcentaje de eventos de cada tipo solicitados mensualmente</a>
					</div>
					<div id="demo" class="collapse">
						<div id="container" style="width:100%; height:400px;"></div>
					</div>
					<div class="text-center">
						<a href="#" class="btn btn-primary" data-toggle="modal" data-target="#modal-porc-cotizaciones-confirmadas-noconfirmadas">Ver Grafica de Porcentaje de cotizaciones confirmadas y no confirmadas por los clientes mensualmente</a>
					</div>
				<div class="text-center">
						<a href="#" class="btn btn-primary" data-toggle="modal" data-target="#modal-porc-tareas-realizadas-y-pendientes">Ver Grafica de Porcentaje de tareas realizadas y pendientes mensualmente</a>
				</div>
					<!--<div class="text-center">
						<a href="#" class="btn btn-primary" data-toggle="modal" data-target="#modal-total-ganancias-obtenidas">Ver Grafica de Porcentaje de tareas con y sin incidencias reportadas mensualmente</a>
					</div>
					<div class="text-center">
						<a href="#" class="btn btn-primary" data-toggle="modal" data-target="#modal-total-ganancias-obtenidas">Ver Grafica de Porcentaje de incidencias reportadas por cada tipo</a>
					</div>

					<div class="text-center">
						<a href="#" class="btn btn-primary" data-toggle="modal" data-target="#modal-total-ganancias-obtenidas">Ver Grafica de Porcentaje de incidencias reportadas por comité</a>
					</div>
					<div class="text-center">
						<a href="#" class="btn btn-primary" data-toggle="modal" data-target="#modal-total-ganancias-obtenidas">Ver Grafica de Porcentaje de asistencia respecto a la asistencia estimada de un evento finalizado</a>
					</div>
					<div class="text-center">
						<a href="#" class="btn btn-primary" data-toggle="modal" data-target="#modal-total-ganancias-obtenidas">Ver Grafica de Porcentaje de personas que asistieron al evento por publicidad de la empresa.</a>
					</div>
					<div class="text-center">
						<a href="#" class="btn btn-primary" data-toggle="modal" data-target="#modal-total-ganancias-obtenidas">Ver Grafica de Tasa de Satisfacción del Cliente</a>
					</div>
					<div class="text-center">
						<a href="#" class="btn btn-primary" data-toggle="modal" data-target="#modal-total-ganancias-obtenidas">Ver Grafica de Total de ganancias obtenidos por evento mensualmente</a>
					</div>-->
				</div>
			</div>
		</div>
	</div>

@include('gerente.template.partials.modal-porc-eventos-cada-tipo')
@include('gerente.template.partials.modal-porc-cotizaciones-confirmadas-noconfirmadas')
@include('gerente.template.partials.modal-porc-tareas-realizadas-y-pendientes')
@include('gerente.template.partials.modal-total-ganancias-obtenidas')
@include('gerente.template.partials.modal-lista-clientes')
@include('gerente.template.partials.modal-lista-servicios')




@endsection

@section('js')
<script>
	$(function () { 
    var myChart = 		

Highcharts.chart('container', {
    chart: {
        plotBackgroundColor: null,
        plotBorderWidth: null,
        plotShadow: false,
        type: 'pie'
    },
    title: {
        text: 'Tipos de eventos'
    },
    tooltip: {
        pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
    },
    plotOptions: {
        pie: {
            allowPointSelect: true,
            cursor: 'pointer',
            dataLabels: {
                enabled: true,
                format: '<b>{point.name}</b>: {point.percentage:.1f} %',
                style: {
                    color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
                }
            }
        }
    },
    series: [{
        name: 'Brands',
        colorByPoint: true,
        data: [{
            name: 'Reunion',
            y: 56.33
        }, {
            name: 'Boda',
            y: 24.03,
            sliced: true,
            selected: true
        }, {
            name: 'Seminario',
            y: 10.38
        }, {
            name: 'BabyShower',
            y: 4.77
        }, {
            name: 'Fiesta',
            y: 0.91
        }, {
            name: 'Cumpleaños',
            y: 0.2
        }]
    }]
});
});
</script>
@endsection
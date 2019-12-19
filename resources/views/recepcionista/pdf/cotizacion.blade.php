<!DOCTYPE html>
<html lang="en">
  
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Comprobante Cotización</title>
    {!! Html::style('assets/plugins/css/pdf2.css') !!}
  </head>
  <style>
  .text-left {
  text-align: left;
}
.text-right {
  text-align: right;
}
.text-center {
  text-align: center;
}
.text-justify {
  text-align: justify;
}
.table .table {
  background-color: #fff;
}
th {
  text-align: left;
}
.table {
  width: 100%;
  max-width: 100%;
  margin-bottom: 20px;
}
.table > thead > tr > th,
.table > tbody > tr > th,
.table > tfoot > tr > th,
.table > thead > tr > td,
.table > tbody > tr > td,
.table > tfoot > tr > td {
  padding: 8px;
  vertical-align: top;
  border-top: 1px solid #ddd;
}

.table > caption + thead > tr:first-child > th,
.table > colgroup + thead > tr:first-child > th,
.table > thead:first-child > tr:first-child > th,
.table > caption + thead > tr:first-child > td,
.table > colgroup + thead > tr:first-child > td,
.table > thead:first-child > tr:first-child > td {
  border-top: 0;
}
.table-condensed > thead > tr > th,
.table-condensed > tbody > tr > th,
.table-condensed > tfoot > tr > th,
.table-condensed > thead > tr > td,
.table-condensed > tbody > tr > td,
.table-condensed > tfoot > tr > td {
  padding: 5px;
}
.table > tbody + tbody {
  border-top: 2px solid #ddd;
}
  </style>
  <body>
    <main>

      @if($data['id']<=9)
        <h1 class="text-center">Comprobante para la Cotizacion CZ00{{ $data['id'] }}</h1>
      @elseif($data['id']>9 and $data['id']<=99)
        <h1>Evento CZ0{{ $data['id'] }}</h1>
      @endif

      <h3 class="text-center">{{ $data['date'] }}</h3>
      
      <p class="text-justify">La presente Cotización registrada el {{$data['fecha_registro']->toDateString() }} con el fin de realizar un evento en {{ $data['lugar_nombre'] }} con dirección {{ $data['direccion'] }} pertenenciente al Cliente <b>{{ $data['nombres'] }} {{ $data['apellidos']}}</b> con cedula de identidad <b>{{ $data['cedula']}}</b> tiene una cantidad de {{ $data['cant_servicios'] }} servicios cotizados distribuidos de la siguiente manera:</p>
      
      <h2 class="text-center">Servicios</h2>
      
      <h3 class="text-center">Lugar</h3>
      <table class="table table-condensed">
        <thead>
          <tr>
            <th>Tipo Lugar</th>
            <th>Nombre Lugar</th>
            <th>Dirección</th>
            <th>Capacidad</th>
            <th>Precio Venta</th>
            <th>Precio IVA</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>{{ $data['lugar']->tipo_local->name }}</td>
            <td>{{ $data['lugar_nombre'] }}</td>
            <td>{{ $data['lugar']->direccion }}</td>
            <td>{{ $data['lugar']->capacidad }}</td>
            <td>{{ $data['lugar']->precio_venta }} {{ $data['moneda'] }}</td>
            <td>{{ $data['lugar']->IVA }} {{ $data['moneda'] }}</td>
          </tr>
        </tbody>
      </table>

      <div style="page-break-after:always;"></div>

      <h3 class="text-center">Costos</h3>
      <table class="table table-condensed">
        <thead>
          <tr>
            <th>Servicio</th>
            <th>Item</th>
            <th>Proveedor</th>
            <th>Precio Venta</th>
            <th>Precio IVA</th>
          </tr>
        </thead>
        <tbody>
          @foreach($data['costos'] as $costo)
          <tr>
            <td>{{ $costo->item->servicio->name }}</td>
            <td>{{ $costo->item->descripcion }}</td>
            <td>{{ $costo->proveedor->razon_social }}</td>
            <td>{{ $costo->precio_venta }} {{ $data['moneda'] }}</td>
            <td>{{ $costo->IVA }} {{ $data['moneda'] }}</td>
          </tr>
          @endforeach
        </tbody>
      </table>

      <div style="page-break-after:always;"></div>

      <h3 class="text-center">Total</h3>
      <table class="table table-condensed">
        <thead>
          <tr>
            <th>Total Venta</th>
            <th>Total IVA</th>
            <th>Total Presupuesto</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>Total {{ $data['monto_total_venta'] }} {{ $data['moneda'] }}</td>
            <td>Total {{ $data['monto_total_iva'] }} {{ $data['moneda'] }}</td>
            <td>Total {{ $data['monto_presupuesto'] }} {{ $data['moneda'] }}</td>
          </tr>
        </tbody>
      </table>
      
      <div style="page-break-after:always;"></div>

      <p class="text-center">
        Este Comprobante ha sido generado por GestEvent UCLA C.A
      </p>
      <h2 class="text-center">Politica del Comprobante</h2>
      <h3 class="text-center">Esta Cotizacion es Valida por 15 Dias</h3>
      <p class="text-justify">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dignissimos id officia, maxime animi repellat voluptatibus modi vel, vero omnis corporis recusandae, aut ullam odit molestias earum enim ad ipsa nulla.Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab soluta quia voluptatum magnam iusto ut beatae atque accusamus earum pariatur labore odit vero temporibus aspernatur sequi, voluptate sunt ducimus tempora.Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quae tempore autem mollitia, quaerat numquam et assumenda asperiores ipsum qui eos culpa sapiente harum totam? Error, nobis! Necessitatibus earum porro libero.Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dignissimos id officia, maxime animi repellat voluptatibus modi vel, vero omnis corporis recusandae, aut ullam odit molestias earum enim ad ipsa nulla.Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab soluta quia voluptatum magnam iusto ut beatae atque accusamus earum pariatur labore odit vero temporibus aspernatur sequi, voluptate sunt ducimus tempora.Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quae tempore autem mollitia, quaerat numquam et assumenda asperiores ipsum qui eos culpa sapiente harum totam? Error, nobis! Necessitatibus earum porro libero.</p>
    
    </main>
  </body>

</html>
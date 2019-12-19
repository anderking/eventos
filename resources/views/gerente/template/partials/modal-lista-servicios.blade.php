<div id="modal-lista-servicios" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <div class="modal-content">

      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h3 class="text-center modal-title">Lista de Servicios</h3>
      </div>

      <div class="modal-body">
        <table class="table table-striped">
          <thead>
            <tr>
              <th>Tipo Servicio</th>
              <th>Servicio</th>
              <th>Descripcion</th>
            </tr>
          </thead>
          <tbody>
            @foreach($servicio as $servicios)
            <tr>
              <td>{{ $servicios->tipo_servicio->name }}</td>
              <td>{{ $servicios->name }}</td>
              <td>{{ $servicios->descripcion }}</td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
      
    </div>

  </div>
</div>
<div id="modal-lista-clientes" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">

    <div class="modal-content">

      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h3 class="text-center modal-title">Lista de Clientes Registrados</h3>
      </div>

      <div class="modal-body">
        <table class="table table-striped">
          <thead>
            <tr>
              <th>Cedula</th>
              <th>Nombre</th>
              <th>Apellido</th>
              <th>E-mail</th>
              <th>Telefono</th>
            </tr>
          </thead>
          <tbody>
            @foreach($cliente as $clientes)
            <tr>
              <td>{{ $clientes->cedula }}</td>
              <td>{{ $clientes->name }}</td>
              <td>{{ $clientes->apellido }}</td>
              <td>{{ $clientes->email }}</td>
              <td>{{ $clientes->telefono_movil }}</td>
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
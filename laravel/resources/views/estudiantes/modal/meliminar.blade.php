
  <div id="modal-delete-{{$id}}" class="modal">
    <form  action="{{route('estudiante.destroy', $id)}}" method="POST">
        {{@method_field('DELETE')}}
        {{@csrf_field()}}
        <p><h3>CAMBIO DE ESTADO</h3></p>
        <label for="">Estado:</label>
        <select name="estado" id="estado" class="form-control select2">
          <option value="TRASLADO">TRASLADO</option>
          <option value="RETIRO">RETIRO</option>
          <option value="SUSPENSION">SUSPENSION</option>
        </select>
        <div class="modal-footer">
            <button class="btn btn-primary btn-icon-text" type="submit">Aceptar <i class="icon-check btn-icon-prepend"></i></button>
            <a href="#" rel="modal:close" class="btn btn-danger btn-icon-text">Cerrar</a>
        </div>
    </form>
  </div>





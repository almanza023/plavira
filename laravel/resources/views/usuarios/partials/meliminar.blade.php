
  <div id="modal-delete-{{$item->id}}" class="modal">
    <form  action="{{route('usuarios.destroy', $item->id)}}" method="POST">
        {{@method_field('DELETE')}}
        {{@csrf_field()}}
        <p><h3>¿Desea eliminar esté Usuario?</h3></p>
        <div class="modal-footer">
            <button class="btn btn-primary btn-icon-text" type="submit">Aceptar <i class="icon-check btn-icon-prepend"></i></button>
            <a href="#" rel="modal:close" class="btn btn-danger btn-icon-text">Cerrar</a>
        </div>
    </form>
  </div>





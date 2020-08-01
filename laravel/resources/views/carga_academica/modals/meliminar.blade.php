
  <div id="modal-delete-{{$carga->id}}" class="modal">
    <form  action="{{route('cargaacademica.destroy', $carga->id)}}" method="POST">
        {{@method_field('DELETE')}}
        {{@csrf_field()}}
        <p><h3>¿Desea eliminar está Carga Académica?</h3></p>
        <div class="modal-footer">
           <input type="submit" class="btn bnt-primary" value="Aceptar">
            <a href="#" rel="modal:close" class="btn btn-danger btn-icon-text">Cerrar</a>
        </div>
    </form>
  </div>





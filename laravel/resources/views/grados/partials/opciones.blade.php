<div class="btn-group">
    <button type="button" class="btn btn-warning btn-flat">Opciones</button>
    <button type="button" class="btn btn-warning btn-flat dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
      <span class="caret"></span>
      <span class="sr-only">Toggle Dropdown</span>
    </button>
    <ul class="dropdown-menu" role="menu">
       <li><a href="{{route('grados.show', $id)}}">Ver</a></li>
       <li><a href="{{route('grados.edit', $id)}}">Actualizar</a></li>
       <li>
           <a href="#modal-delete-{{$id}}" rel="modal:open">Eliminar</a>
      
        </li>  
    </ul>
  </div>

  
  
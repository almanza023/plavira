<div class="btn-group">
    <button type="button" class="btn btn-warning btn-flat">Opciones</button>
    <button type="button" class="btn btn-warning btn-flat dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
      <span class="caret"></span>
      <span class="sr-only">Toggle Dropdown</span>
    </button>
    <ul class="dropdown-menu" role="menu">       
       <li><a href="{{route('actividades.edit', $id)}}">Actualizar</a></li>
       <li>
           <a href="#modal-delete-{{$id}}" rel="modal:open" style="background-color: #F76363; color: black;" >Eliminar</a>
      
        </li>  

        <li>
          <a href="{{ route('descargar.archivo', $ruta) }}"><i class="fa fa-download"></i>DESCARGAR </a>
        </li>
    </ul>
  </div>
  @include('actividades.partials.meliminar')

<div class="btn-group">
    <button type="button" class="btn btn-warning btn-flat">Opciones</button>
    <button type="button" class="btn btn-warning btn-flat dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
      <span class="caret"></span>
      <span class="sr-only">Toggle Dropdown</span>
    </button>
    <ul class="dropdown-menu" role="menu">       
       <li><a href="{{route('cargaacademica.edit', $carga->id)}}">Actualizar</a></li>
       <li>
        <form  action="{{route('cargaacademica.destroy', $carga->id)}}" method="POST" class="form-inline">
          {{@method_field('DELETE')}}
          {{@csrf_field()}}             
          <input type="submit" class="btn bnt-primary" value="Eliminar">
             
          
      </form>
      
        </li>  
    </ul>
  </div>

  
<table  class="table table-bordered table-striped">
    <thead>
    <tr>
      <th>CICLO</th>
      <th>AREA</th>
      <th>FECHA ENTREGA</th> 
      <th>OBSERVACIONES</th>  
      <th>ACCIONES</th>                        
    </tr>
    </thead>
    <tbody>      
        @foreach ($actividades as $actividad)
            <tr>
                <td>
                    {{ $actividad->ciclo }}
                </td>
                <td>
                    {{ $actividad->area }}
                </td>
                <td>
                    {{ $actividad->fecha_entrega }}
                </td>
                <td>
                    {{ $actividad->observaciones }}
                </td>

                <td>
                    <div class="btn-group">
    <button type="button" class="btn btn-warning btn-flat">Opciones</button>
    <button type="button" class="btn btn-warning btn-flat dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
      <span class="caret"></span>
      <span class="sr-only">Toggle Dropdown</span>
    </button>
    <ul class="dropdown-menu" role="menu">       
       <li><a href="{{route('actividades.edit', $actividad->id)}}">Actualizar</a></li>
       <li>
           <a href="#modal-delete-{{$actividad->id}}" rel="modal:open">Eliminar</a>
      
        </li>  
    </ul>
  </div>

  
                </td>

               
            </tr>
        @endforeach    
    </tbody>              
  </table>
  @include('actividades.partials.meliminar')
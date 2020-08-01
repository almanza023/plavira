@extends('theme.layaout')
@section('content')
<div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title">Usuarios</h3><br><br>
          <a href="{{ route('usuarios.create') }}" class="btn btn-primary btn-lg">Crear </a><br>
          
        </div>
      </div>
        <!-- /.box-header -->
        <div class="box box-solid box-primary">
          <div class="box-header">
            <h3 class="box-title">Listado</h3>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <table  class="table table-bordered table-striped">
              <thead>
              <tr>
                <th>Nombre</th>
                <th>Documento</th>
                <th>Correo</th> 
                <th>Teléfono</th>                          
              </tr>
              </thead>
              <tbody>      
                  @foreach ($usuarios as $item)
                      <tr>
                          <td>{{ $item->nombres.' '.$item->apellidos}}</td>
                          <td>{{ $item->documento}}</td> 
                          <td>{{ $item->email}}</td>   
                          <td>{{ $item->telefono}}</td>                          
                          <td>
                            <div class="btn-group">
                              <button type="button" class="btn btn-warning btn-flat">Opciones</button>
                              <button type="button" class="btn btn-warning btn-flat dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                <span class="caret"></span>
                                <span class="sr-only">Toggle Dropdown</span>
                              </button>
                              <ul class="dropdown-menu" role="menu">
                                 <li><a href="{{route('usuarios.show', $item->id)}}">Ver</a></li>
                                 <li><a href="{{route('usuarios.edit', $item->id)}}">Actualizar</a></li>
                                 <li>
                                     <a href="#modal-delete-{{$item->id}}" rel="modal:open">Eliminar</a>
                                
                                  </li>  
                              </ul>
                            </div>
                            
                            
                           
                          </td>
                                           
                      </tr>
                      @include('usuarios.partials.meliminar')
                  @endforeach          
              </tbody>              
            </table>
          </div>
          <!-- /.box-body -->
        </div>                
            </div>
        </div>
    </div>
</div>
@endsection

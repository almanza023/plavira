<div class="box box-solid box-primary" >
    <div class="box-header">
      <h3 class="box-title">Listado</h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
      <table  class="table table-hover table-striped">
        <thead>
        <tr>
          <th>DOCENTE</th>
          <th>AREÁ/ASIGNATURA</th>
          <th>IHS</th>
          <th>GRADO</th>
          <th>SEDE</th>             
        </tr>
        </thead>
        
        <tbody>      
           @foreach ($cargas as $carga)
               <tr>
                   <td>{{$carga->nombres.' '.$carga->apellidos}}</td>
                   <td>{{$carga->asignatura}}</td>
                   <td>{{$carga->ihs}}</td>
                   <td>{{$carga->grado}}</td>
                   <td>{{$carga->sede}}</td>
                   <td>
                    @include('carga_academica.partials.opciones')
                   </td>
                   
               </tr>
               @include('carga_academica.modals.meliminar')
           @endforeach
                
            
        </tbody>              
      </table>
    </div>
    <!-- /.box-body -->
  </div>
<div class="box box-solid box-success">
    <div class="box-header">
      <h3 class="box-title">LISTADO POR FILTRO </h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
      <table  class="table table-bordered table-hover table-responsive" id="estudiantes">
        <thead>
        <tr>
          <th>N°</th>
          <th>Estudiante</th>
          <th>Tipo Documento</th> 
          <th>Número Documento</th>
          <th>Folio</th>
          <th>Grado</th>
          <th>Sede</th>
          <th>Estado</th>                          
        </tr>
        </thead>
        <tbody> 
         @foreach ($estudiantes as $item)
             <tr>
                 <td>{{$loop->iteration}}</td>
                 <td>{{$item->estudiante}}</td>
                 <td>{{$item->tipo_doc}}</td>
                 <td>{{$item->num_doc}}</td>
                 <td>{{$item->folio}}</td>
                 <td>{{$item->grado}}</td>
                 <td>{{$item->sede}}</td>
                 <td>{{$item->estado}}</td>
             </tr>
         @endforeach          
        </tbody>              
      </table>
      
    </div>
    <!-- /.box-body -->
  </div>                
  </div>
@extends('theme.layaout')
@section('estilos')
<link rel="stylesheet" href="{{ asset('assets/lte/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css')}}">   
<link rel="stylesheet" href="{{ asset('assets/lte/bower_components/jquery-modal/jquery.modal.min.css')}}">   

@endsection
@section('content')
<div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title">ACTIVIDADES</h3><br><br>
          <a href="{{ route('actividades.create') }}" class="btn btn-success btn-lg"><i class="fa fa-book"></i></i> Crear </a><br>
          
        </div>
      </div>
        <!-- /.box-header -->
        <div class="box box-solid box-primary">
          <div class="box-header">
            <h3 class="box-title">ACTIVIDADES ASIGNADAS </h3>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
           <div class="table-responsive">
            <table id="actividades" class="table table-bordered table-striped">
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
                  
             
            
                        
              </tbody>              
            </table>
           
           </div>
          </div>
          <!-- /.box-body -->
        </div>                
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')

<!-- DataTables -->
<script src="{{asset('assets/lte/bower_components/datatables.net/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('assets/lte/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js')}}"></script>
<script src="{{asset('assets/lte/bower_components/jquery-modal/jquery.modal.min.js')}}"></script>

<script>
  $(document).ready(function(){
  $('#actividades').DataTable( {
    processing:true,
    serverSide: true,
    ajax: "{{ route('tabla-actv') }}",
    columns:[
      {data:'ciclo'},
      {data:'area'},           
      {data:'fecha_entrega'},
      
      {data:'observaciones'},
      
      {data:'opciones'}              
     
    ],
    language:{
      "sProcessing":     "Procesando...",
                  "sLengthMenu":     "Mostrar _MENU_ registros",
                  "sZeroRecords":    "No se encontraron resultados",
                  "sEmptyTable":     "Ningún dato disponible en esta tabla =(",
                  "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
                  "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
                  "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
                  "sInfoPostFix":    "",
                  "sSearch":         "Buscar:",
                  "sUrl":            "",
                  "sInfoThousands":  ",",
                  "sLoadingRecords": "Cargando...",
                  "oPaginate": {
                      "sFirst":    "Primero",
                      "sLast":     "Último",
                      "sNext":     "Siguiente",
                      "sPrevious": "Anterior"
                  },
                  "oAria": {
                      "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
                      "sSortDescending": ": Activar para ordenar la columna de manera descendente"
                  },
                  "buttons": {
                      "copy": "Copiar",
                      "colvis": "Visibilidad"
                  }
  }

} );

})
</script>
@endsection
@extends('theme.layaout')
@section('estilos')

<link rel="stylesheet" href="{{ asset('assets/lte/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css')}}">
@endsection
@section('content')
<div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title">ARÉAS</h3><br><br>
          <a href="{{ route('areas.create') }}" class="btn btn-success btn-lg">Crear </a><br>
          
        </div>
      </div>
        <!-- /.box-header -->
        <div class="box box-solid box-primary">
          <div class="box-header">
            <h3 class="box-title">LISTADO GENERAL</h3>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <table  class="table table-bordered table-hover" id="asignaturas">
              <thead>
              <tr>
                <th>Nombre</th>
                <th>Acrónimo</th>              
                <th>Opciones</th>             

              </tr>
              </thead>
              <tbody>      
                  
              </tbody>              
            </table>
          </div>
          <!-- /.box-body -->
        </div>                
            </div>
        </div>
    </div>
</div>

@section('scripts')

<!-- DataTables -->
<script src="{{asset('assets/lte/bower_components/datatables.net/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('assets/lte/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js')}}"></script>
@if (session()->has('success'))
<script type="text/javascript">
  
  swal("Exito!", `{{ session('success') }}`, "success");

</script>
@endif
<script>
  $(function() {

  });
  

  $('#asignaturas').DataTable( {
    processing:true,
    serverSide: true,
    ajax: "{{ route('tabla-areas') }}",
    columns:[
      {data:'nombre'},
      {data:'acronimo'},     
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






</script>
@endsection

@endsection
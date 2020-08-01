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
          <h3 class="box-title">Estudiantes</h3><br><br>
          <a href="{{ route('estudiante.create') }}" class="btn btn-primary btn-lg">NUEVO </a>
          <a href="#mconsultar" rel="modal:open" class="btn btn-success btn-lg">CONSULTAR POR CRITERIO</a>
          
        </div>
      </div>
        <!-- /.box-header -->
      @include('estudiantes.modal.mconsultar')
        
        <div class="box box-solid box-primary" id="listado">
          <div class="box-header">
            <h3 class="box-title">LISTADO GENERAL DE ESTUDIANTES </h3>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <table  class="table table-bordered table-striped" id="estudiantes">
              <thead>
              <tr>
                <th>Estudiante</th>
                <th>Tipo Documento</th> 
                <th>Número Documento</th>
                <th>Folio</th>
                <th>Grado</th>
                <th>Sede</th>
                <th>Estado</th>
                <th>Opciones</th>                          
              </tr>
              </thead>
              <tbody>        
              </tbody>              
            </table>
          </div>
          <!-- /.box-body -->
        </div>  
        <div id="datos"></div>              
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
  $('#estudiantes').DataTable( {
    processing:true,
    serverSide: true,
    ajax: "{{ route('tabla-est') }}",
    columns:[
      {data:'estudiante'},
      {data:'tipo_doc'},           
      {data:'num_doc'},
      {data:'folio'},
      {data:'grado'},
      {data:'sede'} ,
      {data:'estado'} ,
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

$("#buscar").click(function() {
  var grado_id = $("#grado_id").val();  
  var sede_id = $("#sede_id").val();
  var estad = $("#estad").val();
  if (sede_id == 0) {
      toastr.warning('Debe Seleccionar una Sede')
      $("#sede_id").focus();
  } else
  if (grado_id == 0) {
      toastr.warning('Debe Seleccionar un Grado')
      $("#grado_id").focus();
  } else {
      var request = $.ajax({
          url: "{{ route('consultar.est') }}",
          method: "GET",
          data: {
              'grado_id': grado_id,
              'sede_id': sede_id,
              'estad': estad,              
              "_token": "{{ csrf_token() }}"
          },
          dataType: "html"
      });

      request.done(function(data) {
          if (data == 1) {
            $("#mconsultar").modal('hide'); //ocultamos el modal 
              swal('', 'No Existen Datos')
          } else {
            $("#mconsultar").modal('hide'); //ocultamos el modal 
            var img="<center><img src='https://pa1.narvii.com/6707/20576190733bb67e82c266681eaa9916a3960290_hq.gif'></center>";
            $('#datos').html(img);
            setTimeout(function(){
              $('#datos').html(data);  
            }, 3000); 
              $('#listado').hide();
             
          }
      });

      request.fail(function(data) {
          alert('Error')
      });
  }
});
});


</script>
@endsection

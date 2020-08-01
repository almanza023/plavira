@extends('theme.layaout')
@section('estilos')
<link rel="stylesheet" href="{{ asset('assets/lte/bower_components/jquery-modal/jquery.modal.min.css')}}">   
    
@endsection
@section('content')
<div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title">Carga Académica</h3><br><br>
          
             <a href="{{ route('cargaacademica.create') }}" class="btn btn-primary btn-lg">Crear </a>
             <a href="#modal-default" rel="modal:open" class="btn btn-success btn-lg">Consultar</a>
             <a href="#modal-docentes" rel="modal:open" class="btn btn-warning btn-lg">Docentes</a>
                
          
        </div>
      </div>
        <!-- /.box-header -->
       
        <div id="datos">
        </div> 
        
       
            </div>
        </div>
  
@endsection
@section('scripts')
<script src="{{asset('assets/lte/bower_components/jquery-modal/jquery.modal.min.js')}}"></script>

<script>
  $( document ).ready(function() {  

  $( "#buscar" ).click(function() {
    var sede=$("#sede").val();
    var grado=$("#grado").val();
    
    var request = $.ajax({
      url: "{{ route('obtcarga') }}",      
      method: "POST",
      data: { 
      'grado' : grado, 
      'sede' : sede,    
      "_token": "{{ csrf_token() }}" },
      dataType: "html"
    });
     
    request.done(function( data ) {
      $("#modal-default").modal('hide');//ocultamos el modal       
      $("#datos").html(data);
      
    });
     
    request.fail(function(data ) {
      alert('Fallo Envio')
  });  
});

$( "#buscar2" ).click(function() {
  var user_id=$("#user_id").val();
  
  
  var request = $.ajax({
    url: "{{ route('obtcarga-doc') }}",      
    method: "POST",
    data: { 
    'user_id' : user_id,       
    "_token": "{{ csrf_token() }}" },
    dataType: "html"
  });   
  request.done(function( data ) {
    if(data==1){
      swal('No Existen Datos')
    }else {
      $("#datos").html(data);
    } 
    
    
  });   
  request.fail(function(data ) {
    alert('Fallo Envio')
});  
});
});
</script>
@endsection
@extends('theme.layaout')
@section('estilos')
<link rel="stylesheet" href="{{ asset('assets/lte/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css')}}">   

@endsection
@section('content')
<div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title">GRADOS</h3><br><br>
         
          
          <a   href="#ex1" rel="modal:open" class="btn btn-success btn-lg"
         ><i class="fa fa-paper-plane"></i>NUEVO </a>
         
          
        </div>
      </div>
        <!-- /.box-header -->
      
        <div class="box box-solid box-primary" id="listado">
          <div class="box-header">
            <h3 class="box-title">LISTADO GENERAL </h3>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <table  class="table table-bordered table-striped" id="ciclos">
              <thead>
              <tr>
                <th>DESCRIPCION</th>                
                <th>NÚMERO</th>                
                <th>ACCION</th>                                   
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
        @include('grados.modals.modal-crear')
        
        </div>
    </div>
</div>
@endsection
@section('scripts')

<!-- DataTables -->
<script src="{{asset('assets/lte/bower_components/datatables.net/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('assets/lte/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js')}}"></script>

<script src="{{ asset('js/Ciclos.js') }}">


</script>
@endsection

@extends('theme.layaout')
@section('content')
@include('sweet::alert')
 <div class="row">
   <div class="col-md-12">
    <div class="box box-solid box-primary">
      <div class="box-header with-border">
        <h3 class="box-title">REGISTRO DE DATOS</h3>
      </div>  
      <div class="box-body">
        {!! Form::open(['route'=>'areas.store']) !!}
        @include('areas.partials.form')                    
        {!! Form::close() !!}
      </div>                    
                
    </div>
   </div>
 </div>
    


@endsection
@section('scripts')

<!-- DataTables -->
<script src="{{asset('assets/lte/bower_components/datatables.net/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('assets/lte/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js')}}"></script>

<script>
  $(document).ready(function(){
  const success = (mensaje) => {
  return swal("Exito!", `${mensaje}`, "success");
}


});


</script>
@endsection
@if (session()->has('success'))
<script type="text/javascript">
	success('{{ session('success') }}');
</script>
@endif
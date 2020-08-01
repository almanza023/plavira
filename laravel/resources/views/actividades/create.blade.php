@extends('theme.layaout')
@section('content')
 <div class="row">
   <div class="col-md-12">
    <div class="box box-solid box-primary" id="divdatos">
      <div class="box-header with-border">
        <h3 class="box-title">REGISTRO DE GUIAS VIRTUALES</h3>
      </div>  
      <div class="box-body">
        {!! Form::open([ 'id'=>'form', 'route'=>'actividades.store', 'method'=>'POST', 'files'=>true]) !!}
        @include('actividades.partials.form')                    
        {!! Form::close() !!}
      </div>                    
                
    </div>

    <div class="box-body" id="cargando" style="background-color: white">
      <center>
        <img src="{{ asset('img/logo-ineda.png') }}" alt="" width="120px" height="120px">
        <img src="{{ asset('img/cargando.gif') }}" alt="" width="350px" height="200px"><br>
       
      </center>
    </div>
   </div>
 </div>
    


@endsection
@section('scripts')
    <script src="{{ asset('js/Actividades.js') }}"></script>
@endsection

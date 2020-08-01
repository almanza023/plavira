@extends('theme.layaout')
@section('content')
 <div class="row">
   <div class="col-md-12">
    <div class="box box-solid box-primary">
      <div class="box-header with-border">
        <h3 class="box-title">Registro</h3>
      </div>  
      <div class="box-body">
        {!! Form::open(['route'=>'usuarios.store']) !!}
        @include('usuarios.partials.form')                    
        {!! Form::close() !!}
      </div>                    
                
    </div>
   </div>
 </div>
    


@endsection

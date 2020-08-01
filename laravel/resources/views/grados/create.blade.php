@extends('theme.layaout')
@section('content')
 <div class="row">
   <div class="col-md-12">
    <div class="box box-solid box-primary">
      <div class="box-header with-border">
        <h3 class="box-title">REGISTRO </h3>
      </div>  
      <div class="box-body">
        {!! Form::open(['route'=>'ciclos.store']) !!}
        @include('grados.partials.form')                    
        {!! Form::close() !!}
      </div>                    
                
    </div>
   </div>
 </div>
    


@endsection

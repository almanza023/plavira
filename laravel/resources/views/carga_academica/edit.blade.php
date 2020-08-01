@extends('theme.layaout')

@section('content')
 <div class="row">
   <div class="col-md-12">
    <div class="box box-solid box-primary">
      <div class="box-header with-border">
        <h3 class="box-title">Actualizar Carga:  </h3>
      </div>  
      <div class="box-body">
        {!! Form::model($carga, ['route'=>['cargaacademica.update', $carga->id], 'method'=>'PUT']) !!}
        @include('carga_academica.partials.form')                    
         {!! Form::close() !!}        
    
      </div>                   
                
    </div>
   </div>
 </div>
    


@endsection


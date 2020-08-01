@extends('theme.layaout')
@section('content')
 <div class="row">
   <div class="col-md-12">
    <div class="box box-solid box-primary">
      <div class="box-header with-border">
        <h3 class="box-title">Actualizar Actividad:  </h3>
      </div>  
      <div class="box-body">
        {!! Form::model($actividad, ['route'=>['actividades.update', $actividad->id], 'method'=>'PUT']) !!}
        @include('actividades.partials.form')                    
         {!! Form::close() !!}      
    
      </div>                 
    </div>
   </div>
 </div>
    


@endsection

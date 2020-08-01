@extends('theme.layaout')
@section('content')
 <div class="row">
   <div class="col-md-12">
    <div class="box box-solid box-primary">
      <div class="box-header with-border">
        <h3 class="box-title">Actulizar Asignatura: <b>{{ $area->nombre }}</b> </h3>
      </div>  
      <div class="box-body">
        {!! Form::model($area, ['route'=>['areas.update', $area->id], 'method'=>'PUT']) !!}
        @include('areas.partials.form')                    
         {!! Form::close() !!}        
    
      </div>                    
                
    </div>
   </div>
 </div>
    


@endsection

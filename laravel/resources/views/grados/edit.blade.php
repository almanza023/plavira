@extends('theme.layaout')
@section('content')
 <div class="row">
   <div class="col-md-12">
    <div class="box box-solid box-primary">
      <div class="box-header with-border">
        <h3 class="box-title">Actualizar Grado: <b>{{ $ciclo->descripcion }}</b> </h3>
      </div>  
      <div class="box-body">
        {!! Form::model($ciclo, [ 'id'=>'form_edit', 'route'=>['ciclos.update', $ciclo->id], 'method'=>'PUT']) !!}
        @include('grados.partials.form')                    
            
         <div class="form-group">
          <button type="submit" class="btn btn-success" id="btnupdate"><i class="fa fa-save"></i> GUARDAR</button>
          </div>
          {!! Form::close() !!}    
          
      </div>                 
    </div>
   </div>
 </div>
    


@endsection

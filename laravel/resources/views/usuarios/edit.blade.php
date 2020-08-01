@extends('theme.layaout')
@section('content')
 <div class="row">
   <div class="col-md-12">
    <div class="box box-solid box-primary">
      <div class="box-header with-border">
        <h3 class="box-title">Actulizar Usuario: <b>{{ $usuario->nombres.' '.$usuario->apellidos }}</b> </h3>
      </div>  
      <div class="box-body">
        {!! Form::model($usuario, ['route'=>['usuarios.update', $usuario->id], 'method'=>'PUT']) !!}
        <div class="form-group ">
          {!! Form::label('password', 'Password:') !!}
          {!! Form::password('password', ['class'=>'form-control', 'id'=>'password']) !!}
        </div>  
        @include('usuarios.partials.form')                    
         {!! Form::close() !!}       
    
      </div>                 
    </div>
   </div>
 </div>
    


@endsection

@extends('theme.layaout')
@section('content')
@include('sweet::alert')
 <div class="row">
  {!! Form::open(['route'=>'cargaacademica.store']) !!}
   <div class="col-md-9">
    <div class="box box-solid box-primary">
      <div class="box-header with-border">
        <h3 class="box-title">Datos Básicos</h3>
      </div>  
      <div class="box-body">        
        @include('carga_academica.partials.form')      
      </div>                
    </div>
   </div>
   <div class="col-md-3">
    <div class="box box-solid box-primary">
      <div class="box-header with-border">
        <h3 class="box-title">Docentes</h3>
      </div>  
      <div class="box-body">        
        @foreach($docentes as $item)        
          {{Form::label('docente',$item->nombres.' '.$item->apellidos)}}
          {{Form::radio('user_id',$item->id,false,['class'=>'form-control2, required'])}}
          <br>        
        @endforeach             
        
      </div>                    
                
    </div>
   </div>

   {!! Form::close() !!}
 </div>
    


@endsection
@section('scripts')
    <script>
      $(document).ready(function(){

        function productos(){
          var tbody = $('#lista_productos tbody');
          var fila_contenido = tbody.find('tr').first().html();
          //Agregar fila nueva.
          $('#lista_productos .button_agregar_producto').click(function(){
            var fila_nueva = $('<tr></tr>');
            fila_nueva.append(fila_contenido);
            tbody.append(fila_nueva);
          });
          //Eliminar fila.
          $('#lista_productos').on('click', '.button_eliminar_producto', function(){		
            $(this).parents('tr').eq(0).remove();
          });
        }

        productos();
      });
      
      
    </script>
@endsection

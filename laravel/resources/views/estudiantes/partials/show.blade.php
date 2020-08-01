@extends('theme.layaout')
@section('estilos')
@endsection
@section('content')
 <div class="row">
   <div class="col-md-12">
    <div class="box box-solid box-primary">
      <div class="box-header with-border">
        <h3 class="box-title">DETALLES DE ESTUDIANTES</h3>
      </div>  
      <div class="box-body">        
         <table class="table table-responsive table-hover">
             <tr>
                 <th colspan="5" ><center>INFORMACIÓN BASICA</center></th>
             </tr>
             <tr>
                 <th>NOMBRE</th>
                 <th>APELLIDOS</th>
                 <th>TIPO DOCUMENTO</th>
                 <th>N° DOCUMENTO</th>
                 <th>FECHA NACIMIENTO</th>
             </tr>
             <tr>
                <td>{{$estudiante->nombres}}</td>
                <td>{{$estudiante->apellidos}}</td>
                <td>{{$estudiante->tipo_doc}}</td>
                <td>{{$estudiante->num_doc}}</td>
                <td>{{$estudiante->fecha_nac}}</td>
             </tr>
             <tr>
                <th>LUGAR NACIMIENTO</th>
                <th>ESTRATO</th>
                <th>DIRECCION</th>                
                <th>EPS</th>
            </tr>
            <tr>
                <td>{{$estudiante->lugar_nac}}</td>
                <td>{{$estudiante->estrato}}</td>
                <td>{{$estudiante->direccion}}</td>
                <td>{{$estudiante->eps}}</td>
            </tr>
            <tr>
                <th>ZONA</th>
                <th>TIPO SANGRE</th>
                <th>GENERO</th>
                <th>DESPLAZADP</th>
                
            </tr>
            <tr>
                <td>{{$estudiante->zona}}</td>
                <td>{{$estudiante->tipo_san}}</td>
                <td>{{$estudiante->genero}}</td>
                <td>{{$estudiante->desplazado}}</td>
            </tr>
            <tr>
                <th>MADRE</th>
                <th>PADRE</th>               
                <th>ACUDIENTE</th> 
                <th>N° DOCUMENTO ACU</th>     
                <th>TELEFONO</th>               
            </tr>
            <tr>
                <td>{{$estudiante->nombre_madre}}</td>
                <td>{{$estudiante->nombre_padre}}</td>
                <td>{{$estudiante->nombre_acu}}</td>
                <td>{{$estudiante->num_acu}}</td>
                <td>{{$estudiante->telefono_acu}}</td>
            </tr>
            <tr>
                <th colspan="5" ><center>INFORMACIÓN ACADÉMICA</center></th>
            </tr>
            <tr>
                <th>FOLIO</th>
                <th>GRADO</th>               
                <th>SEDE</th>                      
                <th>ESTADO</th>               
            </tr>
            <tr>
                <td>{{$estudiante->folio}}</td>
                <td>{{$estudiante->grado->descripcion}}</td>
                <td>{{$estudiante->sede->descripcion}}</td>
                <td>{{$estudiante->estado}}</td>


            </tr>
        </table>   
      </div>                
                
    </div>
   </div>
 </div>
    


@endsection

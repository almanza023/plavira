<table id="lista_productos" class="table table-striped">
  <thead>
    <tr>
      <th> CICLO </th>
      <th> ARÉA </th>
      <th> IHS </th>     
      <th>  </th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td>  
        {!! Form::select('grado_id[]', $ciclos, null, ['class'=>'form-control', 'id'=>'grado_id', 'required']) !!}
      </td>
      <td>
        {!! Form::select('asignatura_id[]', $areas, null, ['class'=>'form-control', 'id'=>'asignatura_id', 'required']) !!}
      </td>
      <td>
        {!! Form::number('ihs[]', null, ['class'=>'form-control', 'id'=>'ihs', 'required']) !!}
      </td>
      
      <td> 
        <button type="button" class="btn btn-danger button_eliminar_producto"> - </button> 
      </td>
    </tr>
  </tbody>
  <tfoot>
    <tr>
      <td colspan="4">  </td>
      <td>
        <button type="button" class="btn btn-info button_agregar_producto"> + </button>
      </td>
    </tr>
  </tfoot>
</table>    
    
   
    <div class="form-group">
    {!! Form::submit('Guardar', ['class'=>'btn btn-success btn-block']) !!}
    </div>
    
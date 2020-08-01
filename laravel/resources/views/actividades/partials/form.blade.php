<div class="table-responsive">
  <table class="table table-hover">
    <tr>
      <th>CICLO (*)</th>
      <td>
        {!! Form::select('grado_id', $grados, null, ['class'=>'form-control', 'id'=>'grado_id', 'required']) !!}
      </td>
    </tr>
  
    <tr>
      <th>ARÉA/ASIGNATURA (*)</th>
      <td>
        {!! Form::select('area_id', $areas, null, ['class'=>'form-control', 'id'=>'area_id', 'required']) !!}
      </td>
    </tr>    
  
    <tr>
      <th>ARCHIVO (*)</th>
      <td>
        <input class="form-control" name="archivo" id="archivo" type="file" accept=".doc, .docx, .pdf, .png, .jpg" required onchange="validar()" />
      </td>
    </tr>
  
    <tr>
      <th>LINK DE VIDEO</th>
      <td>
        {!! Form::text('link_video', null, ['class'=>'form-control', 'id'=>'link_video']) !!}
      </td>
    </tr>
  
    <tr>
      <th>LINK OPCIONAL</th>
      <td>
        {!! Form::text('link_opcional', null, ['class'=>'form-control', 'id'=>'link_opcional']) !!}
        
      </td>
    </tr>
    <tr>
      <th>OBSERVACIONES</th>
      <td>
        {!! Form::textarea('observaciones', null, ['class'=>'form-control', 'id'=>'observaciones', 'rows'=>3, 'cols'=>3]) !!}
      </td>
    </tr>
    <tr>
      <td>
        <button type="button" class="btn btn-success" id="Guardar"> <i class="fa fa-save"></i> GUARDAR </button>
      </td>
    </tr>
  </table>
</div>
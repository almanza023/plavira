<div id="mconsultar" class="modal">
  {!! Form::open() !!}
        <div class="form-group ">
          <label for="">SEDE</label>
          <select class="form-control " name="sede_id" id="sede_id">
            <option value="0">Seleccione</option>
            @foreach ($sedes as $item)
                <option value="{{$item->id}}">{{$item->descripcion}}</option>
            @endforeach
           </select>
      </div>        
      <div class="form-group ">
        <label for="">GRADO</label>
        <select class="form-control " name="grado_id" id="grado_id">
          <option value="0">Seleccione</option>
          @foreach ($grados as $item)
              <option value="{{$item->id}}">{{$item->descripcion}}</option>
          @endforeach
         </select>
       </div>
       <div class="form-group ">
        <label for="">ESTADO</label>
        <select class="form-control select2" name="estado" id="estad">          
          <option value="ACTIVO"> ACTIVO</option>
          <option value="RETIRADO"> RETIRADO</option>
          <option value="DESPLAZADO">DESPLAZADO</option>
          <option value="TRASLADO">TRASLADO</option>
          
         </select>
       </div>
       <div class="form-group ">
        <button type="button" id="buscar" class="btn btn-info">CONSULTAR</button>
        <a href="#" rel="modal:close" class="btn btn-danger">CERRAR</a>
       </div>
       {!! Form::close() !!}
</div>
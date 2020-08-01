<div id="modal-docentes" class="modal">   
    {!! Form::open() !!}
    <div class="form-group ">
      {!! Form::label('docentes', 'Docentes') !!}
      <select name="user_id" id="user_id" class="form-control select2">
          @foreach ($docentes as $item)
              <option value="{{$item->id}}">{{$item->nombres.' '.$item->apellidos}}</option>
          @endforeach
      </select>
  </div>          
  <div class="modal-footer">
    <button type="button" class="btn btn-primary" id="buscar2">Buscar </button>
    <a href="#" rel="modal:close" class="btn btn-danger btn-icon-text">Cerrar</a>
    
    {!! Form::close() !!}
 

</div>
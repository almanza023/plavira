<div id="modal-default" class="modal">
    
     
          {!! Form::open() !!}
          <div class="form-group ">
            {!! Form::label('name', 'Sede') !!}
            {!! Form::select('sede', $sedes, null, ['class'=>'form-control', 'id'=>'sede']) !!}
        </div>        
        <div class="form-group ">
              {!! Form::label('name', 'Grado') !!}
              {!! Form::select('grado', $grados, null, ['class'=>'form-control', 'id'=>'grado']) !!}
         </div>
          
        
        <div class="modal-footer">
          <button type="button" class="btn btn-primary" id="buscar">Buscar </button>
          <a href="#" rel="modal:close" class="btn btn-danger btn-icon-text">Cerrar</a>
          
          {!! Form::close() !!}
       
    
  </div>
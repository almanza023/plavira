<div id="ex1" class="modal">
  
          {!! Form::open(['id'=>'form', 'route'=>'grados.store', 'method'=>'POST']) !!}
          @include('grados.partials.form')      
          <div class="form-group">
            <button type="button" class="btn btn-success" id="btnsave"><i class="fa fa-save"></i> GUARDAR</button>
            </div>              
          {!! Form::close() !!}
                         
                  
     
    <div class="modal-footer">
        <a href="#" rel="modal:close" class="btn btn-danger"><i class="fa fa-close"></i>CERRAR</a>
    </div>
  </div>
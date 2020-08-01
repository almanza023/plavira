
    <div class="form-group ">
          {!! Form::label('nombres', 'Nombres') !!}
          {!! Form::text('nombres', null, ['class'=>'form-control', 'id'=>'nombres', 'placeholder'=>'Nombres']) !!}
    </div>

      <div class="form-group ">
      {!! Form::label('apellidos', 'Apellidos:') !!}
      {!! Form::text('apellidos', null, ['class'=>'form-control', 'id'=>'apellidos', 'placeholder'=>'Apellidos']) !!}
      </div>  

      <div class="form-group ">
        {!! Form::label('documento', 'Documento:') !!}
        {!! Form::number('documento', null, ['class'=>'form-control', 'id'=>'documento', 'placeholder'=>'Documento']) !!}
      </div>

      <div class="form-group ">
        {!! Form::label('correo', 'Correo:') !!}
        {!! Form::email('email', null, ['class'=>'form-control', 'id'=>'email', 'placeholder'=>'Correo']) !!}
      </div>

      <div class="form-group ">
        {!! Form::label('telefono', 'Teléfono') !!}
        {!! Form::number('telefono', null, ['class'=>'form-control', 'id'=>'telefono', 'placeholder'=>'Teléfono']) !!}
      </div>

      <div class="form-group ">
        {!! Form::label('direccion', 'Dirección:') !!}
        {!! Form::text('direccion', null, ['class'=>'form-control', 'id'=>'direccion', 'placeholder'=>'Dirección']) !!}
        </div>  
      
        <div class="form-group ">
          {!! Form::label('escalafon', 'Escalafón:') !!}
          {!! Form::text('escalafon', null, ['class'=>'form-control', 'id'=>'escalafon', 'placeholder'=>'Escalafón']) !!}
        </div>  

        <div class="form-group ">
          {!! Form::label('especialidad', 'Especialidad:') !!}
          {!! Form::text('especialidad', null, ['class'=>'form-control', 'id'=>'especialidad', 'placeholder'=>'Especialidad']) !!}
        </div>  

       
        <div class="form-group ">
          {!! Form::label('tipo', 'Tipo:') !!}
          {!! Form::select('tipo', ['0'=>'Seleccione', '1'=>'ADMINISTRADOR', '2'=>'DOCENTE'], null, ['class'=>'form-control']) !!}
        </div>      
    
    <div class="form-group">
    {!! Form::submit('Guardar', ['class'=>'btn btn-success btn-block']) !!}
    </div>
    
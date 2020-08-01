
    <div class="form-group ">
          {!! Form::label('name', 'Nombre') !!}
          {!! Form::text('nombre', null, ['class'=>'form-control', 'id'=>'nombre', 'placeholder'=>'Ingresa Nombre']) !!}
    </div>

      <div class="form-group ">
      {!! Form::label('name', 'Acrónimo') !!}
      {!! Form::text('acronimo', null, ['class'=>'form-control', 'id'=>'acronimo', 'placeholder'=>'Ingresa Acrónimo']) !!}
      </div>

      
    <div class="form-group">
    {!! Form::submit('Guardar', ['class'=>'btn btn-success btn-block']) !!}
    </div>
    
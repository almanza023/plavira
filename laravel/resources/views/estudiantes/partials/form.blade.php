<div class="tab-content">
    <div class="tab-pane active" role="tabpanel" id="step1">

        <div class="form-group">
          {!! Form::label('nombres', 'Nombres') !!}
          {!! Form::text('nombres', null, ['class'=>'form-control', 'id'=>'nombres']) !!}          
        </div>

        <div class="form-group">
            {!! Form::label('apellidos', 'Nombres') !!}
            {!! Form::text('apellidos', null, ['class'=>'form-control', 'id'=>'apellidos']) !!}  
        </div>

        <div class="form-group">
            {!! Form::label('apellidos', 'Tipo Documento') !!}
            {!! Form::select('tipo_doc', ['0'=>'Seleccione', 'RC'=>'REGISTRO CIVIL',
            'TI'=>'TARJETA DE IDENTIDAD', 'CC'=>'CEDULA DE CIUDADANIA', 'DE'=>'DOCUMENTO EXTRANJERO'], 
            NULL, ['class'=>'form-control select2', 'id'=>'tipo_doc']) !!}           
        </div>

        <div class="form-group">
          
          {!! Form::label('apellidos', 'Número de Documento') !!}
          {!! Form::number('num_doc', null, ['class'=>'form-control', 'id'=>'num_doc']) !!}  
        </div>

        <div class="form-group">
          <label>Fecha de Nacimiento:</label>

          <div class="input-group date">
            <div class="input-group-addon">
              <i class="fa fa-calendar"></i>
            </div>

            {!! Form::text('fecha_nac', null, ['class'=>'form-control pull-right', 'id'=>'datepicker']) !!} 
            
          </div>
          <!-- /.input group -->
        </div>

        <div class="form-group">
          <label for="">Lugar de Nacimiento:</label>
          {!! Form::text('lugar_nac', null, ['class'=>'form-control', 'id'=>'lugar_nac']) !!} 
          
        </div>

        <div class="form-group">
          <label for="">Estrato:</label>
          {!! Form::label('apellidos', 'Tipo Documento') !!}
            {!! Form::select('estrato', ['0'=>'Seleccione', '1'=>'1',
            '2'=>'2', '3'=>'4', '5'=>'5'], 
            NULL, ['class'=>'form-control select2', 'id'=>'estrato']) !!}    
        </div>

        <div class="form-group">
          <label for="">Genéro:</label>
          <div class="radio">
            <label>
            {!! Form::radio('genero', 'option1', null, ['id'=>'genero']) !!}              
            Masculino
            </label>
          </div>
          <div class="radio">
            <label>
                {!! Form::radio('genero', 'option2', null, ['id'=>'genero']) !!}  
                Femenino
            </label>
          </div>
         
        </div>

        <div class="form-group">
          <label for="">Direccion:</label>
          {!! Form::text('direccion', null, ['class'=>'form-control', 'id'=>'direccion']) !!} 
         
        </div>

        <div class="form-group">
          <label for="">EPS:</label>
          {!! Form::text('eps', null, ['class'=>'form-control', 'id'=>'eps']) !!} 

        </div>

        <div class="form-group">
          <label for="zona">Zona:</label>          
            {!! Form::select('zona', ['0'=>'Seleccione', 'RURAL'=>'RURAL',
            'URBANA'=>'URBANA'],NULL, ['class'=>'form-control select2', 'id'=>'zona']) !!}  
          
        </div>

        <div class="form-group">
          <label for="zona">Tipo Sangre:</label>
          {!! Form::select('tipo_san', ['0'=>'Seleccione', 'A+'=>'A+',
            'A-'=>'A-', 'B-'=>'B-', 'B+'=>'B+', 'O-'=>'O-', 'O+'=>'O+', 'AB'=>'AB'],NULL, ['class'=>'form-control select2', 'id'=>'tipo_san']) !!}
        </div>       

        

        <ul class="list-inline pull-right">
            <li><button type="button" class="btn btn-primary next-step">Siguiente</button></li>
        </ul>
    </div>
    <div class="tab-pane" role="tabpanel" id="step2">
      <div class="form-group">
        <label for="">Nombre Madre:</label>
        {!! Form::text('nombre_madre', null, ['class'=>'form-control', 'id'=>'nombre_madre']) !!}       
      </div>

      <div class="form-group">
        <label for="">Nombre Padre:</label>
        {!! Form::text('nombre_padre', null, ['class'=>'form-control', 'id'=>'nombre_padre']) !!} 
        
      </div>

      <div class="form-group">
        <label for="">Nombre Acudiente:</label>
        {!! Form::text('nombre_acu', null, ['class'=>'form-control', 'id'=>'nombre_acu']) !!}       
      </div>

      <div class="form-group">
        <label for="">Documento Acudiente:</label>
        {!! Form::number('num_acu', null, ['class'=>'form-control', 'id'=>'num_acu']) !!} 

      </div>

      <div class="form-group">
        <label for="">Teléfono Acudiente:</label>
        {!! Form::number('telefono_acu', null, ['class'=>'form-control', 'id'=>'telefono_acu']) !!} 
        
      </div>


        <ul class="list-inline pull-right">
            <li><button type="button" class="btn btn-default prev-step">Atrás</button></li>
            <li><button type="button" class="btn btn-primary next-step">Siguiente</li>
        </ul>
    </div>
    <div class="tab-pane" role="tabpanel" id="step3">
         <div class="form-group">
        <label for="">Folio:</label>
        {!! Form::text('folio', null, ['class'=>'form-control', 'id'=>'folio']) !!} 
       
      </div>

      <div class="form-group">
        <label for="zona">Grado:</label>
        {!! Form::select('grado_id', $grados, null, ['class'=>'form-control select2', 'id'=>'grado_id']) !!}
        </div>
      
      <div class="form-group">
        <label for="zona">Sede:</label>
        {!! Form::select('sede_id', $sedes, null, ['class'=>'form-control select2', 'id'=>'sede_id']) !!}

      </div>
        <ul class="list-inline pull-right">
            <li><button type="button" class="btn btn-default prev-step">Atrás</button></li>
            
            <li><button type="button" class="btn btn-primary btn-info-full next-step">Siguiente</button></li>
        </ul>
    </div>
    <div class="tab-pane" role="tabpanel" id="complete">
        <h3>Formulario Completado</h3>
        <button type="submit" class="btn btn-success btn-block">Guardar</button>
    </div>
    <div class="clearfix"></div>
</div>
    
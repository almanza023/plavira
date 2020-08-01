@extends('theme.layaout')
@section('estilos')
@endsection
@section('content')
 <div class="row">
   <div class="col-md-12">
    <div class="box box-solid box-primary">
      <div class="box-header with-border">
        <h3 class="box-title">Actualización de datos</h3>
      </div>  
      <div class="box-body">        
            <section>
                <div class="wizard">
                    <div class="wizard-inner">
                        <div class="connecting-line"></div>
                        <ul class="nav nav-tabs" role="tablist">        
                            <li role="presentation" class="active">
                                <a href="#step1" data-toggle="tab" aria-controls="step1" role="tab" title="Datos Básicos">
                                    <span class="round-tab">
                                        <i class="glyphicon glyphicon-folder-open"></i>
                                        
                                    </span>
                                </a>
                            </li>
        
                            <li role="presentation" class="disabled"> 
                                <a href="#step2" data-toggle="tab" aria-controls="step2" role="tab" title="Datos Familiares">
                                    <span class="round-tab">
                                        <i class="glyphicon glyphicon-pencil"></i>
                                    </span>
                                </a>
                            </li>
                            <li role="presentation" class="disabled">
                                <a href="#step3" data-toggle="tab" aria-controls="step3" role="tab" title="Datos Académicos">
                                    <span class="round-tab">
                                        <i class="glyphicon glyphicon-picture"></i>
                                    </span>
                                </a>
                            </li>
        
                            <li role="presentation" class="disabled">
                                <a href="#complete" data-toggle="tab" aria-controls="complete" role="tab" title="Completado">
                                    <span class="round-tab">
                                        <i class="glyphicon glyphicon-ok"></i>
                                    </span>
                                </a>
                            </li>
                        </ul>
                    </div>
                    
                    {!! Form::model($estudiante, ['route'=>['estudiante.update', $estudiante->id], 'method'=>'PUT']) !!}
                    @include('estudiantes.partials.form')                    
                    {!! Form::close() !!}     
                    
                </div>
            </section>           
      </div>                
                
    </div>
   </div>
 </div>
    


@endsection
@section('scripts')
    <script>
      $(document).ready(function () {
        //Initialize tooltips
        $('.select2').select2()
        $('#datepicker').datepicker({
          autoclose: true
        })

        $('.nav-tabs > li a[title]').tooltip();
        
        //Wizard
        $('a[data-toggle="tab"]').on('show.bs.tab', function (e) {
    
            var $target = $(e.target);
        
            if ($target.parent().hasClass('disabled')) {
                return false;
            }
        });
    
        $(".next-step").click(function (e) {
    
            var $active = $('.wizard .nav-tabs li.active');
            $active.next().removeClass('disabled');
            nextTab($active);
    
        });
        $(".prev-step").click(function (e) {
    
            var $active = $('.wizard .nav-tabs li.active');
            prevTab($active);
    
        });
    });
    
    function nextTab(elem) {
        $(elem).next().find('a[data-toggle="tab"]').click();
    }
    function prevTab(elem) {
        $(elem).prev().find('a[data-toggle="tab"]').click();
    }
    </script>
@endsection
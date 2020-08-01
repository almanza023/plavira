<!DOCTYPE html>
<html>
<head><meta charset="euc-jp">
  
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>INICIO DE SESION</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="{{ asset('assets/lte/bower_components/bootstrap/dist/css/bootstrap.min.css') }}">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('assets/lte/bower_components/font-awesome/css/font-awesome.min.css')}}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="{{ asset('assets/lte/bower_components/Ionicons/css/ionicons.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('assets/lte/dist/css/AdminLTE.min.css')}}">
  <!-- iCheck -->
  <link rel="stylesheet" href="{{ asset('assets/lte/plugins/iCheck/square/blue.css')}}">
   <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  <link rel="stylesheet" href="{{ asset('assets/lte/plugins/bootstrap-sweetalert-master/sweetalert.css')}}">
<link rel="stylesheet" href="{{ asset('assets/lte/plugins/toastr-master/toastr.min.css')}}">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  
  <!-- /.login-logo -->
  <div class="login-box-body">
    <br>
    <p class="login-box-msg"><b>PLATAFORMA VIRTUAL DE APRENDIZAJE </b></p>
    <center><img src="{{ asset('img/logo-ineda.png') }}" width="110px" width="110px" alt="Logo"></center><br>

    <p class="login-box-msg"><b>INICIO DE SESION</b></p>

    <form id="login" >
        @csrf
        <div class="form-group row">
            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Usuario:') }}</label>

            <div class="col-md-12">
                <input id="documento" type="number" class="form-control @error('documento') is-invalid @enderror" name="documento" id="documento" value="{{ old('documento') }}"  autocomplete="documento" autofocus>

                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <div class="form-group row">
            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Contraseña') }}</label>

            <div class="col-md-12">
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password"  autocomplete="current-password">

               
            </div>
        </div>       

        <div class="form-group row mb-0">
            <div class="col-md-12 offset-md-4">
                <button type="submit" class="btn btn-primary btn-block">
                  <i class="fa fa-save"></i>  {{ __('INGRESAR') }}
                </button>

             
            </div>
        </div>
    </form>
    <!-- /.social-auth-links --> 

  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<!-- jQuery 3 -->
<script src="{{  asset('assets/lte/bower_components/jquery/dist/jquery.min.js')}}"></script>
<!-- Bootstrap 3.3.7 -->
<script src="{{ asset('assets/lte/bower_components/bootstrap/dist/js/bootstrap.min.js')}}"></script>
<script src="{{  asset('assets/lte/bower_components/bootstrap/dist/js/bootstrap.min.js')}}"></script>
<script src="{{ asset('assets/lte/plugins/toastr-master/toastr.min.js')}}"></script>
<script src="{{ asset('assets/lte/plugins/bootstrap-sweetalert-master/sweetalert.min.js')}}"></script>

<script>
    $( document ).ready(function() {    
        $("#login").submit(function( event ) {            
            var documento=$('#documento').val();
            var password=$('#password').val();
            if(!documento>0 && !$.isNumeric(documento)){
                toastr.warning('Campo Usuario es Obligatorio');
                $('#usuario').focus();
            } else if(!password>0){
                toastr.warning('Campo Contraseña es Obligatorio');
                $('#password').focus();
            }else {            
            var request = $.ajax({
                url: "{{ route('login') }}",      
                method: "POST",
                data: { 
                'documento' : documento, 
                'password' : password,    
                "_token": "{{ csrf_token() }}" },
                dataType: "html"
              });
               
              request.done(function( data ) {
                if(data==1){
                    swal({
                        title: "ACCESO AL SISTEMAS",
                        text: "Bienvenido a la Plataforma Virtual",
                        type: "success",
                        showCancelButton: false,
                        confirmButtonClass: "btn-danger",
                        confirmButtonText: "Aceptar",
                        closeOnConfirm: false
                      },
                      function(){
                        window.location.href = '{{ route("areas.index") }}'
                      });
                   
                }else {
                    swal('', 'Usuario y/o Contraseña incorrectos.Intente nuevamente', 'error')  
                    
                }
                
                
              });
               
              request.fail(function(data ) {
                console.log(data)
            });
        }
            event.preventDefault();
          });
    });
</script>

</body>
</html>




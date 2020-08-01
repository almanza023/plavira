<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
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

</head>
<body class="hold-transition login-page">
<div class="login-box">
  
  <!-- /.login-logo -->
  <div class="login-box-body">
    <br>
    <center><img src="{{ asset('img/logo.png') }}" width="180px" width="180px" alt="Logo"></center><br>

    <p class="login-box-msg"><b>INICIO DE SESION</b></p>

    <form id="login"
        @csrf

        <div class="form-group row">
            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Usuario') }}</label>

            <div class="col-md-12">
                <input id="documento" type="number" class="form-control" name="documento" id="documento" value="{{ old('documento') }}" >
              
            </div>
        </div>

        <div class="form-group row">
            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Contraseña') }}</label>

            <div class="col-md-12">
                <input id="password" type="password" class="form-control" name="password" id="password" >

               
            </div>
        </div>

        <div class="form-group row mb-0">
            <div class="col-md-12 offset-md-4">
                <button type="submit" class="btn btn-primary btn-block">
                    {{ __('INGRESAR') }}
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
<script>
    $( document ).ready(function() {
        $( "#login" ).submit(function( event ) {
            var documento=$('#documento').val();
            var password=$('#password').val();
            if(!documento>0 && !$.isNumeric(documento)){
                swal('Campo Usuario es obligatorio', 'warning');
            } else if(!password>0){
                swal('Campo Contraseña es obligatorio', 'warning');
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
                console.log(data)
                
              });
               
              request.fail(function(data ) {
                alert('Fallo Envio')
            });
        }
            event.preventDefault();
          });
    });
</script>

</body>
</html>




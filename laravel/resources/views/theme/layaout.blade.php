<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>{{ config('app.name', 'Laravel') }}</title>
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
    <!-- AdminLTE Skins. Choose a skin from the css/skins
        folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="{{ asset('assets/lte/dist/css/skins/_all-skins.min.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/lte/bower_components/bootstrap-daterangepicker/daterangepicker.css')}}">
  <!-- bootstrap datepicker -->
  <link rel="stylesheet" href="{{ asset('assets/lte/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css')}}">

<link rel="stylesheet" href="{{ asset('assets/lte/plugins/bootstrap-sweetalert-master/sweetalert.css')}}">
<link rel="stylesheet" href="{{ asset('assets/lte/plugins/toastr-master/toastr.min.css')}}">
<link rel="stylesheet" href="{{ asset('assets/lte/bower_components/jquery-modal/jquery.modal.min.css')}}">   
    
@yield('estilos')
   
  
  <!-- Google Font -->
  <!-- <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic"> -->
</head>
<!-- ADD THE CLASS layout-top-nav TO REMOVE THE SIDEBAR. -->
<body class="hold-transition skin-blue layout-top-nav">
<div class="wrapper">
  @include('theme.header')
  <!-- Full Width Column -->
  <div class="content-wrapper">
    <div class="container">
      <section class="content-header">
        <h1>
          PLATAFORMA VIRTUAL DE APRENDIZAJE 
          <small>PLAVIRA</small>
        </h1>       
      </section>
      
      <section class="content">
      @yield('content')
      </section>
      <!-- /.content -->
    </div>
    <!-- /.container -->
  </div>
  <!-- /.content-wrapper -->
  @include('theme.footer')
</div>
<!-- ./wrapper -->
<!-- jQuery 3 -->
@include('theme.scripts')
@yield('scripts')
</body>
</html>

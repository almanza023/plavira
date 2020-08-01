<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>CONSULTA DE ACTIVIDADES VIRTUALES</title>
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
 
<link rel="stylesheet" href="{{ asset('assets/lte/plugins/bootstrap-sweetalert-master/sweetalert.css')}}">

  <!-- Google Font -->
  <!-- <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic"> -->
</head>
<!-- ADD THE CLASS layout-top-nav TO REMOVE THE SIDEBAR. -->
<body class="hold-transition skin-blue layout-top-nav">
<div class="wrapper">

    <header class="main-header">
        <nav class="navbar navbar-static-top" style="background-color: green">
          <div class="container">
            <div class="navbar-header">
                <img src="{{ asset('img/logo-ineda.png') }}" alt="" width="60px" height="60px">
             
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
          
            <!-- /.navbar-collapse -->
            <!-- Navbar Right Menu -->
           
            <center><h4 style="color: white"><b>INSTITUCION EDUCATIVA DON ALONSO</b></h4></center>
        
            <center><h5 style="color: white"><b>SABER- ESFUERZO - ESPERANZA</b></h5></center>
            <!-- /.navbar-custom-menu -->
          </div>
          <!-- /.container-fluid -->
        </nav>
      </header>








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
    
        
        <div class="row">
          <div class="col-xs-12">
            <div class="box box-success">
              <div class="box-header">
                  <div class="row">
                      
                    <div class="col-md-6">
                       <a href="{{ url('consulta') }}"> <img src="{{ asset('img/estudiantes.png') }}" alt="" width="200px" height="200px"></a> 
                    </div>
                  

                  
                    <div class="col-md-6">
                      <a href="{{ url('login') }}">
                        <img src="{{ asset('img/docentes.png') }}" alt="" width="200px" height="200px"></a>
                    </div>
                  </div>              
                
              </div>
            </div>
          </div>
        </div>
        

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
<script src="{{ asset('assets/lte/bower_components/jquery/dist/jquery.min.js')}}"></script>
<!-- Bootstrap 3.3.7 -->
<script src="{{ asset('assets/lte/bower_components/bootstrap/dist/js/bootstrap.min.js')}}"></script>
<!-- SlimScroll -->
<script src="{{ asset('assets/lte//bower_components/jquery-slimscroll/jquery.slimscroll.min.js')}}"></script>
<!-- FastClick -->
<script src="{{ asset('assets/lte/bower_components/fastclick/lib/fastclick.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('assets/lte/dist/js/adminlte.min.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ asset('assets/lte/dist/js/demo.js')}}"></script>
<script src="{{ asset('js/Consulta.js') }}"></script>
</body>
</html>

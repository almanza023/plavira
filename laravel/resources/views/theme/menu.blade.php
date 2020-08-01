<div class="collapse navbar-collapse pull-left" id="navbar-collapse">
    <ul class="nav navbar-nav">
      @if (auth()->user()->tipo==2)
      <li ><a href="{{route('actividades.index')}}"><i class="fa fa-book"></i> Actividades <span class="sr-only">(current)</span></a></li>
      @endif
      
      @if (auth()->user()->tipo==1)
      <li ><a href="{{route('estudiante.index')}}"><i class="far fa-people-arrows"></i> Estudiantes <span class="sr-only">(current)</span></a></li>
      <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Configuraciones <span class="caret"></span></a>
        <ul class="dropdown-menu" role="menu">
          <li><a href="{{route('grados.index')}}">Grados</a></li>         
          <li><a href="{{route('areas.index')}}">Aréas</a></li>
          <li><a href="{{route('cargaacademica.index')}}">Carga Académica</a></li>
          <li><a href="{{route('usuarios.index')}}">Usuarios</a></li>
         
        </ul>
      </li>
      @endif
      
    </ul>
    
  </div>
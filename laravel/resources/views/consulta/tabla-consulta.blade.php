@forelse ($actividades as $actividad)
   

<div class="well well-lg">
    <h4><b>{{ $actividad->area.' - '.$actividad->ciclo }}</b></h4>
  
    
    <img src="{{ asset('img/youtube.png') }}" alt="" width="20px" height="20px"><a href="{{ $actividad->link_video }}"
        target="_blank">
        {{ $actividad->link_video }}
    </a>
    <h5><b>OBSERVACIONES</b></h5>
    <p>{{ $actividad->observaciones }}</p>
    <h5><b>FECHA ENTREGA</b></h5>
    <p>{{ $actividad->fecha_entrega }}</p>
    <h5><b>INFORMACION ADICIONAL</b></h5>
    @empty($actividad->link_opcional)
    <P>NINGUNA</P>    
    @endempty
    <p>{{ $actividad->link_opcional }}</p>
    <a href="{{ route('descargar.archivo', $actividad->ruta) }}" class="btn btn-primary"><i class="fa fa-download"></i>DESCARGAR </a>

</div>

@empty
    <h4>NO EXISTEN ACTIVIDADES</h4>
@endforelse
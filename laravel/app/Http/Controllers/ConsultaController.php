<?php

namespace App\Http\Controllers;

use App\Actividad;
use App\Ciclo;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Prophecy\Call\Call;

class ConsultaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ciclos=Ciclo::orderBy('id', 'ASC')->pluck('descripcion', 'id');  
       return view('consulta.index', compact('ciclos')); 
        
    }
    
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $actividades=Actividad::FindCicloId($request->ciclo_id)->get();
        return view('consulta.tabla-consulta', compact('actividades'));

    }

    public function descargar($name)
    {

       
        $public_path = public_path();
        $url = $public_path.'/archivos/'.$name;
        if (is_file($url)){
           header('Content-Type: application/force-download');
           header('Content-Disposition: attachment; filename='.$name);
           header('Content-Transfer-Encoding: binary');
           header('Content-Length: '.filesize($url));
           readfile($url);
        }
        abort(404);
      
       
        

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        
        
    }

    
}

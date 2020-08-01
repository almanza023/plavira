<?php

namespace App\Http\Controllers;

use App\Asignatura;
use App\Calificacion;
use App\CargaAcademica;
use App\Estudiante;
use App\Grado;
use App\LogroAcademico;
use App\Sede;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CalificacionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $grados=Grado::all();
        $sedes=Sede::all();
       return view('calificaciones.index', compact('grados', 'sedes')); 
        
    }

    public function calificar(){
        $id=auth()->user()->id;
        if(auth()->user()->tipo==2){
         $grados = DB::table('carga_academicas')
        ->join('grados', 'grados.id', '=', 'carga_academicas.grado_id')        
        ->select('grados.id', 'grados.descripcion', 'grados.numero')
        ->where('carga_academicas.user_id','=',$id)->distinct()->get(); 
        $sede=User::find($id);         
        return view('calificaciones.calificar', compact('grados'));
        }        
        $grados=Grado::all();
        $sedes=Sede::all();
        return view('calificaciones.calificar', compact('grados', 'sedes'));
        
        
        
    }

    public function vistaEditar(){
        $id=auth()->user()->id;
        if(auth()->user()->tipo==2){
            $grados = DB::table('carga_academicas')
        ->join('grados', 'grados.id', '=', 'carga_academicas.grado_id')        
        ->select('grados.id', 'grados.descripcion')
        ->where('carga_academicas.user_id','=',$id)->distinct()->get(); 
        $sedes=User::find($id); 
        } else {
            $grados=Grado::all();
            $sedes=Sede::all();
        }
        
        return view('calificaciones.editar', compact('grados', 'sedes'));
    }

    public function vistaIndividual(){
        $id=auth()->user()->id;
        if(auth()->user()->tipo==2){
         $grados = DB::table('carga_academicas')
        ->join('grados', 'grados.id', '=', 'carga_academicas.grado_id')        
        ->select('grados.id', 'grados.descripcion', 'grados.numero')
        ->where('carga_academicas.user_id','=',$id)->distinct()->get(); 
        $sede=User::find($id);         
        return view('calificaciones.calificar_individual', compact('grados'));
        }        
        $grados=Grado::all();
        $sedes=Sede::all();
        return view('calificaciones.calificar_individual', compact('grados', 'sedes'));
    }

      

    public function obtenerEstudiantes(Request $request){
        
        $periodo=$request->periodo;
        $asignatura=$request->asignatura_id;
        $grado=$request->grado_id;
        $sede=$request->sede_id;
        
        $logros=LogroAcademico::where('asignatura_id', $asignatura)
        ->where('grado_id', $grado)
        ->where('sede_id', $sede)
        ->get();

        if($request->tipo==2){
            $estudiante=$request->estudiante_id;
            if(Calificacion::contarCalificacionInd($estudiante, $asignatura, $periodo)>0){
                return 1;
            }
            $estudiantes=Estudiante::where('id', $estudiante)->get();
            return view('calificaciones.partials.estudiantes', 
            compact('estudiantes', 'periodo', 'asignatura', 'sede', 'grado', 'logros'));
        }

        if(Calificacion::contarCalificaciones($sede, $grado, $asignatura, $periodo)>1){
            return 1;
        }
        $estudiantes=Estudiante::where('grado_id', $request->grado_id)->get();
        return view('calificaciones.partials.estudiantes', 
        compact('estudiantes', 'periodo', 'asignatura', 'sede', 'grado', 'logros'));


    }


    public function obtenerEstudiantesActualizar(Request $request){
        
        $periodo=$request->periodo;
        $asignatura=$request->asignatura_id;
        $grado=$request->grado_id;
        $sede=$request->sede_id;
        $logros=LogroAcademico::where('asignatura_id', $asignatura)
        ->where('grado_id', $grado)
        ->where('sede_id', $sede)
        ->get();
        $calificaciones=Calificacion::obtenerCalificaciones($sede, $grado, $asignatura, $periodo)->get();
        if(count($calificaciones)>0){
            return view('calificaciones.partials.estudiantesActualizar', 
            compact('calificaciones', 'logros'));  
        }else {
            return 1;
        }
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $estudiante_id = $request->input('estudiante_id');  
        $nota = $request->input('nota'); 
        $logro_d = $request->input('logro_d');    
        $sede=$request->sede_id;
        $grado=$request->grado_id;
        $periodo=$request->periodo;
        $asignatura=$request->asignatura_id;  

        
        foreach ($request->input('estudiante_id') as $key => $value) { 
            $objModel = new Calificacion();           
            $objModel->estudiante_id = $estudiante_id[$key];
            $objModel->nota = $request->nota[$key];
            $objModel->logro_d = $logro_d[$key];
            $objModel->logro_c = $request->logro_c;
            $objModel->grado_id = $grado;
            $objModel->sede_id = $sede;
            $objModel->periodo = $periodo;
            $objModel->asignatura_id = $asignatura;
            $objModel->save();   
        }
        $calificaciones=Calificacion::obtenerCalificaciones($sede, $grado, $asignatura, $periodo)->get();
        return view('calificaciones.show', compact('calificaciones'));
    }

    public function obtenerCalificaciones(Request $request){
        $sede=$request->sede_id;
        $grado=$request->grado_id;
        $periodo=$request->periodo;
        $asignatura=$request->asignatura_id;  
        $calificaciones=Calificacion::obtenerCalificaciones($sede, $grado, $asignatura, $periodo)->get();
        if(count($calificaciones)==0){
            return 1;
        }
        return view('calificaciones.partials.resultado', compact('calificaciones'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $id = $request->input('id');  
        $nota = $request->input('nota'); 
        $logro_d = $request->input('logro_d');       
        foreach ($request->input('id') as $key => $value) { 
            $objModel =Calificacion::find($id[$key]);               
            $objModel->nota = $request->nota[$key];
            $objModel->logro_d = $logro_d[$key];
            $objModel->logro_c = $request->logro_c;                
            $objModel->save();   
        }
        $objModel =Calificacion::find($id[0]);        
        $sede=$objModel->sede_id;
        $grado=$objModel->grado_id;
        $asignatura=$objModel->asignatura_id;
        $periodo=$objModel->periodo;
        $calificaciones=Calificacion::obtenerCalificaciones($sede, $grado, $asignatura, $periodo)->get();
        return view('calificaciones.show', compact('calificaciones')); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $calificaciones=Calificacion::where('grado_id', '=', $request->grado_id)
        ->where('sede_id', '=', $request->sede_id)
        ->where('asignatura_id', '=', $request->asignatura_id)
        ->where('periodo','=', $request->periodo)->delete();        
        return $calificaciones;
    }
}

<?php

namespace App\Http\Controllers;

use App\Area;
use App\CargaAcademica;
use App\Ciclo;
use App\Sede;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CargaAcademicaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware(['auth', 'admin']);        
    }
    
    public function index()
    {
       
        $ciclos=Ciclo::pluck('descripcion', 'id');
        $docentes=User::where('tipo', 2)->get();
        return view('carga_academica.index', compact('ciclos', 'docentes'));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $docentes=User::where('tipo', 2)->get();
        $areas=Area::all()->pluck('nombre', 'id');
       
        $ciclos=Ciclo::orderBy('id', 'ASC')->pluck('descripcion', 'id');  
        return view('carga_academica.create', compact('docentes', 'areas', 'ciclos'));
    }

    public function obtenerCarga(Request $request){

        $cargas=CargaAcademica::obtenerCarga($request->sede, $request->grado)->get();
        return view('carga_academica.partials.resultado', compact('cargas'));
        
    }
    public function obtenerCargaDocente(Request $request){

        $cargas=CargaAcademica::obtenerCargaDocente($request->user_id)->get();
        if(count($cargas)==0){
            return 1;
        }
        return view('carga_academica.partials.resultado', compact('cargas'));
        
    }
    public function obtenerAsignaturas(Request $request, $id){
        if($request->ajax()){
        if(auth()->user()->tipo==2){
        $asignaturas = DB::table('carga_academicas as c')
        ->join('asignaturas as a', 'a.id', '=', 'c.asignatura_id')        
        ->select('a.id', 'a.nombre', 'c.porcentaje')
        ->where('c.user_id','=',auth()->user()->id)
        ->where('c.grado_id','=',$id)->get(); 
        }else {
            $asignaturas = DB::table('carga_academicas as c')
            ->join('asignaturas as a', 'a.id', '=', 'c.asignatura_id')        
            ->select('a.id', 'a.nombre', 'c.porcentaje')            
            ->where('c.grado_id','=',$id)->get(); 
        } 
        return response()->json($asignaturas);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $grado_id = $request->input('grado_id');  
        $area_id = $request->input('asignatura_id'); 
        $ihs = $request->input('ihs');           
        $user_id=$request->user_id;
        $user=User::find($user_id);
        
        $sede=$user->sede_id;
        
        foreach ($grado_id as $key => $value) { 
            $objModel = new CargaAcademica();           
            $objModel->ciclo_id = $grado_id[$key];
            $objModel->area_id = $request->asignatura_id[$key];
            $objModel->ihs = $ihs[$key];
           
            $objModel->user_id = $request->user_id;
            
            $objModel->save();   
        }        
        return redirect()->route('cargaacademica.index');
        
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
    public function edit($id)
    {
        $carga=CargaAcademica::find($id);
        $asignaturas=Area::all()->pluck('nombre', 'id');
       
        $grados=Ciclo::orderBy('id', 'ASC')->pluck('descripcion', 'id'); 
        return view('carga_academica.edit', compact('carga', 'asignaturas', 'grados'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $grado_id = $request->input('grado_id');  
         
        $carga=CargaAcademica::find($id);
        $carga->grado_id=$grado_id[0];
        $carga->asignatura_id=$request->asignatura_id[0];
        $carga->ihs=$request->ihs[0];
        $carga->porcentaje=$request->porcentaje[0];
        $carga->save();
        return redirect()->route('cargaacademica.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $carga=CargaAcademica::find($id);
        $carga->delete();
        return redirect()->route('cargaacademica.index');

    }
}

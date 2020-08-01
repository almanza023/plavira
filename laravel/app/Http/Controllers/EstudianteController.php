<?php

namespace App\Http\Controllers;

use App\Estudiante;
use App\Grado;
use App\Sede;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

class EstudianteController extends Controller
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
        $grados=Grado::all();
        $sedes=Sede::all();
       return view('estudiantes.index', compact('sedes', 'grados'));

    }

    public function tabla()
    {
        $estudiantes=Estudiante::ObtenerEstudiantes(0, 0, 0)->get();        
        return datatables()->of($estudiantes)
       
         ->addColumn('opciones', 'estudiantes.partials.opciones')
         ->rawColumns(['opciones'])
         ->addIndexColumn()
        
         ->toJson();
         
    }

    public function getEstudiantes(Request $request, $id){
        if($request->ajax()){      
        $estudiantes = Estudiante::getEstudianteGrado($id);
        }
        return $estudiantes;
    }
    

    public function obtenerEstudiantes(Request $request){
        $sede=$request->sede_id;
        $grado=$request->grado_id;
        $estado=$request->estad;        
        $estudiantes=Estudiante::ObtenerEstudiantes($sede, $grado, $estado)->get();
        
        if(count($estudiantes)==0){
            return 1;
        }
        return view('estudiantes.partials.resultado', compact('estudiantes'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $grados=Grado::pluck('descripcion', 'id');
        $sedes=Sede::pluck('descripcion', 'id');
        return view('estudiantes.create', compact('grados', 'sedes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Estudiante::create($request->all());
        return redirect()->route('estudiante.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Estudiante $estudiante)
    {
        return view('estudiantes.partials.show', compact('estudiante'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $estudiante=Estudiante::findOrFail($id);
        $grados=Grado::pluck('descripcion', 'id');
        $sedes=Sede::pluck('descripcion', 'id');
        return view('estudiantes.edit', compact('estudiante', 'grados', 'sedes'));
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
        $estudiante=Estudiante::find($id);
        $estudiante->update($request->all());
        return redirect()->route('estudiante.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Estudiante $estudiante, Request $request)
    {
        $estudiante->estado=$request->estado;
        return redirect()->route('estudiante.index');
    }
}

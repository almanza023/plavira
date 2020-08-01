<?php

namespace App\Http\Controllers;

use App\Area;
use Illuminate\Http\Request;
use Alert;
use App\Actividad;
use App\Ciclo;
use App\Grado;
use Illuminate\Support\Facades\Storage;

class ActividadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');        
    }
    public function index()
    {
       
        return view('actividades.index');

    }

    public function tabla()
    {
        $id=auth()->user()->id;
        $actividades=Actividad::FindAll( $id)->get();       
        return datatables()->of($actividades)        
         ->addColumn('opciones', 'actividades.partials.opciones')
         ->rawColumns(['opciones'])
         ->addIndexColumn()        
         ->toJson();         
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        $areas=Area::all()->pluck('nombre', 'id');       
        $grados=Grado::orderBy('id', 'ASC')->pluck('descripcion', 'id'); 
        return view('actividades.create', compact('areas', 'grados'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        //obtenemos el campo file definido en el formulario
       $file = $request->file('archivo');
 
       //obtenemos el nombre del archivo
        $nombre = $file->getClientOriginalName();
 
       //indicamos que queremos guardar un nuevo archivo en el disco local
        \Storage::disk('local')->put($nombre,  \File::get($file));
        
       $public_path = public_path();
       $url = $public_path.'/archivos/'.$nombre;
       $actividad = new Actividad();
       $actividad->ciclo_id=$request->ciclo_id;
       $actividad->area_id=$request->area_id;
       $actividad->user_id=auth()->user()->id;
       $actividad->fecha_entrega=$request->fecha_entrega;
       $actividad->ruta=$nombre;
       $actividad->link_video=$request->link_video;
       $actividad->link_opcional=$request->link_opcional;
       $actividad->observaciones=$request->observaciones;
       $actividad->save();
       return response()->json(['success' => 'ACTIVIDAD CREADA CON EXITO!']);

        
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
        $areas=Area::all()->pluck('nombre', 'id');       
        $ciclos=Ciclo::orderBy('id', 'ASC')->pluck('descripcion', 'id'); 
        $actividad=Actividad::find($id);
        return view('actividades.edit', compact('actividad', 'areas', 'ciclos'));
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
        $actividad = Actividad::find($id);
        $actividad->ciclo_id=$request->ciclo_id;
        $actividad->area_id=$request->area_id;
        $actividad->user_id=auth()->user()->id;
        $actividad->fecha_entrega=$request->fecha_entrega;
        $actividad->link_video=$request->link_video;
        $actividad->link_opcional=$request->link_opcional;
        $actividad->observaciones=$request->observaciones;
        $actividad->save();
        return redirect()->route('areas.index')->with('success', 'DATOS ACTUALIZADOS EXITOSAMENTE');   ;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $actividad=Actividad::find($id);
        
         $url=$actividad->ruta;
    
        if (Storage::exists($url))
        {
         Storage::delete($url);
        }
        $actividad->delete();
        return redirect()->route('actividades.index');
    }
}

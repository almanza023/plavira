<?php

namespace App\Http\Controllers;


use App\Grado;
use Illuminate\Http\Request;

class GradoController extends Controller
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
    {$datos=Grado::all();      
        return $datos;  
       
        return view('grados.index');
    }

    public function tabla()
    {
        $datos=Grado::all();      
        return $datos;  
        return datatables()->of($datos)        
         ->addColumn('opciones', 'grados.partials.opciones')
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
        return view('grados.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Grado::create($request->all());
        return response()->json(['success' => 'GRADO CREADO CON EXITO!']);
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
        $ciclo=Grado::find($id);
        return view('grados.edit', compact('ciclo'));

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
        $grado = Grado::find($id);
        $grado->descripcion=$request->descripcion;
        $grado->rango=$request->rango;
        $grado->save();
        return redirect()->route('grados.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Grado $grado)
    {
        $grado->delete();
        return redirect()->route('grados.index');
        
    }
}

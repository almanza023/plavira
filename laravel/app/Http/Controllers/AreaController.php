<?php

namespace App\Http\Controllers;

use App\Area;
use Illuminate\Http\Request;
use Alert;
class AreaController extends Controller
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
        
        return view('areas.index');

    }

    public function tabla()
    {
        $areas=Area::all();        
        return datatables()->of($areas)        
         ->addColumn('opciones', 'areas.partials.opciones')
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
        return view('areas.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Area::create($request->all());
        return redirect()->route('areas.create')->with('success', 'AREA CREADA EXITOSAMENTE');
        
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
        $area=Area::find($id);
        return view('areas.edit', compact('area'));
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
        $area=Area::find($id);
        $area->nombre=$request->nombre;
        $area->acronimo=$request->acronimo;       
        $area->save();
        return redirect()->route('areas.index')->with('success', 'AREA ACTUALIZADA EXITOSAMENTE');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Area $area)
    {
        $area->delete();
        return redirect()->route('areas.index')->with('success', 'AREA ELIMINADA EXITOSAMENTE');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Dependencia;
use App\Cargo;
use App\Http\Requests\UsuarioRequest;
use App\Sede;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsuarioController extends Controller
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
        $usuarios=User::orderBy('id', 'ASC')->paginate();
        return view('usuarios.index', compact('usuarios'));
    }

    public function tabla()
    {
        $users = DB::table('users')
        ->join('cargos', 'cargos.id', '=', 'cargo_id')
        ->join('dependencias', 'dependencias.id', '=', 'dependencia_id')
        ->select('users.*', 'cargos.nombre as cargo', 'dependencias.nombre as dependencia')
        ->get();
    
    return datatables()->of($users)
    ->addColumn('opciones', 'usuarios.partials.opciones')
    ->rawColumns(['opciones'])
    ->toJson();
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
       
        return view('usuarios.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user= new User();
        $user->nombres =  strtoupper($request->nombres);
        $user->apellidos = strtoupper($request->apellidos);
        $user->documento = $request->documento;
        $user->direccion = $request->direccion;
        $user->telefono = $request->telefono;
        $user->escalafon = $request->escalafon;
        $user->especialidad = $request->especialidad;
        $user->email = $request->email;        
        $user->tipo = $request->tipo;              
        $user->password = Hash::make($request->documento);           
        $user->save();
        return redirect()->route('usuarios.index')->with('info', 'Usuario creado Exitosamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
            
        $usuario=User::find($id);
        return view('usuarios.show', compact('usuario'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $usuario=User::find($id);
        return view('usuarios.edit', compact('usuario'));
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
        $user=User::findOrFail($id);
        $user->nombres =  strtoupper($request->nombres);
        $user->apellidos = strtoupper($request->apellidos);
        $user->documento = $request->documento;
        $user->direccion = $request->direccion;
        $user->telefono = $request->telefono;
        $user->escalafon = $request->escalafon;
        $user->especialidad = $request->especialidad;
        $user->email = $request->email;        
        $user->tipo = $request->tipo;              
        $user->password = Hash::make($request->documento);         
        $user->save();
        return redirect()->route('usuarios.index');
        
    }

    public function cambiarCorreo(Request $request, $id)
    {
        $request->validate([
            'email' => 'required',            
        ]);
        $usuario=User::find($id);
        $usuario->email=$request->email;
        $usuario->save();
        return redirect()->route('home')->with('info', 'Cambio de Correo Exito');        
    }

    public function cambiarClave(Request $request, $id)
    {
        $request->validate([
            'password' => 'required|max:15',            
        ]);
        $usuario=User::find($id);
        $usuario->password=bcrypt($request->password);
        $usuario->save();
        return redirect()->route('home')->with('info', 'Cambio de Correo Exito');        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        
        $user->delete();
        return redirect()->route('usuarios.index');
       
    }
}

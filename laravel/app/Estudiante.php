<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Estudiante extends Model
{
    protected $table="estudiantes";

    protected $fillable=['grado_id',  'sede_id', 'nombres', 'apellidos', 'tipo_doc', 'num_doc',
    'fecha_nac', 'lugar_nac', 'estrato', 'direccion', 'eps', 'zona', 'tipo_san', 'genero', 'desplazado',
    'nombre_madre', 'nombre_padre', 'nombre_acu', 'num_acu', 'telefono_acu', 'folio', 'estado' ];


    public function setNombresAttribute($value)
    {
        $this->attributes['nombres'] =strtoupper($value);
    }

    public function setApellidosAttribute($value)
    {
        $this->attributes['apellidos'] =strtoupper($value);
    }

    public function setNombreMadreAttribute($value)
    {
        $this->attributes['nombre_madre'] =strtoupper($value);
    }
    public function setNombrePadreAttribute($value)
    {
        $this->attributes['nombre_padre'] =strtoupper($value);
    }
    public function setNombreAcuAttribute($value)
    {
        $this->attributes['nombre_acu'] =strtoupper($value);
    }   

    public function setFechaNacAttribute($value)
    {
        $this->attributes['fecha_nac'] = Carbon::parse($value)->format('Y-m-d');
    }
    public function grado()
    {
        return $this->belongsTo(Grado::class, 'grado_id');
    }    

    public function sede()
    {
        return $this->belongsTo(Sede::class, 'sede_id');
    }

    public static function ObtenerEstudiantes($sede, $grado, $estado){
        if($grado ==0 && $sede==0 && $estado==0){
        $estudiantes = DB::table('estudiantes as e')
        ->join('grados as g', 'g.id', '=', 'e.grado_id')
        ->join('sedes as s', 's.id', '=', 'e.sede_id')        
        ->select(DB::raw('CONCAT(e.nombres," ",e.apellidos) AS estudiante'), 'e.id', 'e.tipo_doc',
         'e.num_doc', 'e.folio', 'g.descripcion as grado',
        's.descripcion as sede', 'e.estado')->orderBy('e.apellidos', 'asc');
        } else if($sede==0 && $estado==0){
            $estudiantes=Estudiante::where('grado_id', $grado)->orderBy('e.apellidos', 'asc')->get();
        }
        else {

        $estudiantes = DB::table('estudiantes as e')
        ->join('grados as g', 'g.id', '=', 'e.grado_id')
        ->join('sedes as s', 's.id', '=', 'e.sede_id')        
        ->select(DB::raw('CONCAT(e.nombres," ",e.apellidos) AS estudiante'), 'e.id', 'e.tipo_doc',
        'e.num_doc', 'e.folio', 'g.descripcion as grado','s.descripcion as sede', 'e.estado')
        ->where('e.grado_id', '=',$grado)
        ->where('e.sede_id', '=',$sede)
        ->where('e.estado', '=',$estado)
        ->orderBy('e.apellidos', 'asc');    
        }
        return $estudiantes;
    }

    public static function getEstudianteGrado($grado){
        $datos=DB::table('estudiantes as e')      
        ->select('e.id', 'e.apellidos', 'e.nombres')
        ->where('e.grado_id','=', $grado)
        ->orderBy('e.apellidos', 'asc')
        ->get(); 
        return $datos;
    }
}

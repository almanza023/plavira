<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class CargaAcademica extends Model
{
    protected $table="carga_academicas";
    protected $fillable=['user_id', 'grado_id', 'area_id', 'ihs'];

    public function area()
    {
        return $this->belongsTo(Area::class, 'area_id');
    }

    public function ciclo()
    {
        return $this->belongsTo(Ciclo::class, 'ciclo_id');
    }

    public static function obtenerCarga($sede, $grado){
     
        $carga =DB::table('carga_academicas as c')
            ->join('asignaturas as a', 'c.asignatura_id', '=', 'a.id') 
            ->join('grados as g', 'c.grado_id', '=', 'g.id')  
            ->join('sedes as s', 'c.sede_id', '=', 's.id')
            ->join('users as u', 'c.user_id', '=', 'u.id')       
            ->select('a.nombre as asignatura', 'c.id', 'c.ihs', 'g.descripcion as grado', 's.descripcion as sede', 'u.nombres', 'u.apellidos')            
            ->where('c.grado_id','=',$grado)
            ->where('c.sede_id','=',$sede);
            
        return $carga;
        
    }
    public static function obtenerCargaDocente($user_id){
     
        $carga =DB::table('carga_academicas as c')
            ->join('asignaturas as a', 'c.asignatura_id', '=', 'a.id') 
            ->join('grados as g', 'c.grado_id', '=', 'g.id')  
            ->join('sedes as s', 'c.sede_id', '=', 's.id')
            ->join('users as u', 'c.user_id', '=', 'u.id')       
            ->select('a.nombre as asignatura', 'c.id', 'c.ihs', 'g.descripcion as grado', 's.descripcion as sede', 'u.nombres', 'u.apellidos')            
            ->where('c.user_id','=',$user_id);
            
            
        return $carga;
        
    }

    public static function getGradosDocente($id){
        $grados = DB::table('carga_academicas as c')
        ->join('grados as g', 'g.id', '=', 'c.grado_id')        
        ->select('g.id', 'g.descripcion', 'g.numero')
        ->where('c.user_id','=',$id)->distinct()->get(); 
        return $grados;
        
    }
}

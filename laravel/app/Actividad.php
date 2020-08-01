<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Actividad extends Model
{
    protected $table="actividades";
    protected $fillable=['grado_id', 'area_id', 'user_id', 'ruta', 
    'link_video', 'link_opcional', 'observaciones'];


   
   public function areas()
   {
       return $this->hasMany('App\Area');
   }

   public function users()
   {
       return $this->hasMany('App\User');
   }
   

    public function scopeFindAll($query, $id)
    {
        return $query->join('grados as g', 'actividades.grado_id', '=', 'g.id')
            ->join('areas as a', 'actividades.area_id', '=', 'a.id')
            
            ->where('actividades.user_id', $id)
            ->select(
                'actividades.id',                
                'actividades.ruta',
                'actividades.link_video',
                'actividades.link_opcional',
                'actividades.observaciones',
                'actividades.estado',
                'g.descripcion as grado',
                'a.nombre as area'
              
                
            );
    }

    public function scopeFindId($query, $id)
    {
        return $query->join('grados as g', 'actividades.ciclo_id', '=', 'g.id')
            ->join('areas as a', 'actividades.area_id', '=', 'a.id')
            
            ->where('actividades.id', $id)
            ->select(
                'actividades.id',
                'actividades.fecha_entrega',
                'actividades.ruta',
                'actividades.link_video',
                'actividades.link_opcional',
                'actividades.observaciones',
                'actividades.estado',
                'g.descripcion as grado',
                'a.nombre as area'
              
                
            );
    }

    public function scopeFindGradoId($query, $id)
    {
        return $query->join('grados as g', 'actividades.grado_id', '=', 'g.id')
            ->join('areas as a', 'actividades.area_id', '=', 'a.id')
            
            ->where('actividades.ciclo_id', $id)
            ->select(
                'actividades.id',
                'actividades.fecha_entrega',
                'actividades.ruta',
                'actividades.link_video',
                'actividades.link_opcional',
                'actividades.observaciones',
                'actividades.estado',
                'g.descripcion as grado',
                'a.nombre as area'
              
                
            );
    }
    

}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    protected $table="areas";
    protected $fillable=['nombre', 'acronimo'];

    
    public function actividades()
    {
        return $this->belongsTo('App\Actividad');
    }
    

}

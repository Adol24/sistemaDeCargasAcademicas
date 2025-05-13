<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Asignatura extends Model
{

    protected $fillable = [
        'id_licenciatura',
        'nombre',
        'clave',
        'creditos',
        'tipo'
        
    ];

  
    public function licenciatura()
    {
        // indicamos la FK personalizada
        return $this->belongsTo(Licenciatura::class, 'id_licenciatura');
    }
}

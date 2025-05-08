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
        return $this->belongsTo(Licenciatura::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Licenciatura extends Model
{
    protected $fillable = [
        'nombre',
        'sistema'
    ];

    public function asignaturas()
    {
        return $this->hasMany(Asignatura::class);
    }

}

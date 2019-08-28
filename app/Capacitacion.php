<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Capacitacion extends Model
{
    protected  $fillable = [
        'capacitador_id',
        'nombre',
        'tema',
        'lugar',
        'cupos',
        'fecha_inicio',
        'fecha_final',
    ];

    public function empresarios()
    {
        return $this->belongsToMany(Empresario::class);
    }
}

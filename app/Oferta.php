<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Oferta extends Model
{
    protected  $fillable = [
        'nombre',
        'tema',
        'lugar',
        'cupos',
        'fecha_inicio',
        'fecha_final'
    ];


    public function empresarios()
    {
        return $this->belongsToMany(Empresario::class);
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Negocio extends Model
{
     protected  $fillable = [
        'nombre_negocio',
        'tipo_negocio',
        'empresario_cedula'
    ];

    public function dueño()
{
    return $this->belongsTo(Empresario::class,'empresario_cedula','cedula');
}

}

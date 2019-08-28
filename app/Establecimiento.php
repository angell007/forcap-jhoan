<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Establecimiento extends Model
{
    protected  $fillable = [
        'nombre',
        'tipo',
        'empresario_id'
    ];

    public function empresario()
    {
        return $this->belongsTo(Empresario::class);
    }
}

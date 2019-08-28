<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Capacitador extends Model
{
    protected  $fillable = [
        'nombre',
        'documento',
        'numero_documento',
        'contacto',
    ];

    public function capacitacions()
    {
        return $this->hasMany(Capacitacion::class);
    }
}

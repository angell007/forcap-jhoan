<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Empresario extends Model
{
    protected  $fillable = [

        'fundacion',
        'nombre',
        'documento',
        'numero_documento',
        'contacto',
        'direccion',
        'barrio',
        'comuna',
        'email',
    ];



    public function ofertas()
    {
        return $this->hasMany(Oferta::class);
    }

    public function capacitaciones()
    {
        return $this->belongsToMany(Capacitacion::class);
    }

    public function establecimientos()
    {
        return $this->hasMany(Establecimiento::class);
    }
    // public function certificados()
    // {
    //     return $this->hasMany(Certificado::class);
    // }
}

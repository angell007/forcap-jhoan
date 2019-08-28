<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Certificado extends Model
{

    protected $table = 'certificados';

    protected $fillable=
    [
    	'nombre_empresario',
    	'empresario_id',
    	'ruta'
    ];

    public function Empresario(){
    return $this->belongsTo(Empresario::class);
	}
}

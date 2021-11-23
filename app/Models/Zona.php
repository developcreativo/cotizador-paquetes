<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Zona extends Model
{
    protected $guarded = [];

    public function tipoZona()
    {
        return $this->belongsTo(TipoZona::class);
    }
}

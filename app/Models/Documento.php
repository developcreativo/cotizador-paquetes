<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Documento extends Model
{
    protected $guarded = [];

    protected $casts = [
        'peso' => 'double'
    ];
}

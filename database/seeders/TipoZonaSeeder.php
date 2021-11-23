<?php

namespace Database\Seeders;

use App\Models\TipoZona;
use Illuminate\Database\Seeder;

class TipoZonaSeeder extends Seeder
{
    public function run()
    {
        TipoZona::query()->create([
            'zona' => 'Zona uno',
            'tipo' => 'zona_uno'
        ]);

        TipoZona::query()->create([
            'zona' => 'Zona dos',
            'tipo' => 'zona_dos'
        ]);

        TipoZona::query()->create([
            'zona' => 'Zona tres',
            'tipo' => 'zona_tres'
        ]);

        TipoZona::query()->create([
            'zona' => 'Zona cuatro',
            'tipo' => 'zona_cuatro'
        ]);

        TipoZona::query()->create([
            'zona' => 'Zona cinco',
            'tipo' => 'zona_cinco'
        ]);
    }
}

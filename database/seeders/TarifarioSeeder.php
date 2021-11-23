<?php

namespace Database\Seeders;

use App\Models\Tarifario;
use Illuminate\Database\Seeder;

class TarifarioSeeder extends Seeder
{
    public function run()
    {
        Tarifario::query()->create([
            'nombre' => 'Normal'
        ]);

        Tarifario::query()->create([
            'nombre' => 'Express'
        ]);

        Tarifario::query()->create([
            'nombre' => 'Valorado'
        ]);
    }
}

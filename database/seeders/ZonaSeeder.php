<?php

namespace Database\Seeders;

use App\Models\Zona;
use Illuminate\Database\Seeder;

class ZonaSeeder extends Seeder
{
    public function run()
    {
        /*Zona 1*/
        Zona::query()->create([
            'nombre' => 'CALLAO',
            'tipo_zona_id' => 1
        ]);

        Zona::query()->create([
            'nombre' => 'COMAS',
            'tipo_zona_id' => 1
        ]);

        Zona::query()->create([
            'nombre' => 'INDEPENDENCIA',
            'tipo_zona_id' => 1
        ]);

        Zona::query()->create([
            'nombre' => 'LOS OLIVOS',
            'tipo_zona_id' => 1
        ]);

        Zona::query()->create([
            'nombre' => 'SAN MARTIN DE PORRES',
            'tipo_zona_id' => 1
        ]);

        /*Zona 2*/
        Zona::query()->create([
            'nombre' => 'LA VICTORIA',
            'tipo_zona_id' => 2
        ]);

        Zona::query()->create([
            'nombre' => 'LIMA',
            'tipo_zona_id' => 2
        ]);
        /*Zona 3*/
        Zona::query()->create([
            'nombre' => 'SAN LUIS',
            'tipo_zona_id' => 3
        ]);

        Zona::query()->create([
            'nombre' => 'SANTA ANITA',
            'tipo_zona_id' => 3
        ]);

        Zona::query()->create([
            'nombre' => 'RIMAC',
            'tipo_zona_id' => 3
        ]);
        /*Zona 4*/
        Zona::query()->create([
            'nombre' => 'BARRANCO',
            'tipo_zona_id' => 4
        ]);

        Zona::query()->create([
            'nombre' => 'BREÑA',
            'tipo_zona_id' => 4
        ]);

        Zona::query()->create([
            'nombre' => 'JESUS MARIA',
            'tipo_zona_id' => 4
        ]);

        Zona::query()->create([
            'nombre' => 'LA MOLINA',
            'tipo_zona_id' => 4
        ]);

        Zona::query()->create([
            'nombre' => 'LINCE',
            'tipo_zona_id' => 4
        ]);

        Zona::query()->create([
            'nombre' => 'MAGDALENA',
            'tipo_zona_id' => 4
        ]);

        Zona::query()->create([
            'nombre' => 'MIRAFLORES',
            'tipo_zona_id' => 4
        ]);

        Zona::query()->create([
            'nombre' => 'PUEBLO LIBRE',
            'tipo_zona_id' => 4
        ]);

        Zona::query()->create([
            'nombre' => 'SAN BORJA',
            'tipo_zona_id' => 4
        ]);

        Zona::query()->create([
            'nombre' => 'SAN ISIDRO',
            'tipo_zona_id' => 4
        ]);

        Zona::query()->create([
            'nombre' => 'SAN MIGUEL',
            'tipo_zona_id' => 4
        ]);

        Zona::query()->create([
            'nombre' => 'SURCO',
            'tipo_zona_id' => 4
        ]);

        Zona::query()->create([
            'nombre' => 'SURQUILLO',
            'tipo_zona_id' => 4
        ]);
        /*Zona 5*/
        Zona::query()->create([
            'nombre' => 'CHORRILLOS',
            'tipo_zona_id' => 5
        ]);

        Zona::query()->create([
            'nombre' => 'SAN JUAN DE MIRAFLORES',
            'tipo_zona_id' => 5
        ]);

        Zona::query()->create([
            'nombre' => 'LURIGANCHO',
            'tipo_zona_id' => 5
        ]);

        Zona::query()->create([
            'nombre' => 'SAN JUAN DE LURIGANCHO',
            'tipo_zona_id' => 5
        ]);

        Zona::query()->create([
            'nombre' => 'ATE',
            'tipo_zona_id' => 5
        ]);

        Zona::query()->create([
            'nombre' => 'EL AGUSTINO',
            'tipo_zona_id' => 5
        ]);
    }
}

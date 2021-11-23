<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTipoZonasTable extends Migration
{
    public function up()
    {
        Schema::create('tipo_zonas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('zona');
            $table->enum('tipo', ['zona_uno', 'zona_dos', 'zona_tres', 'zona_cuatro', 'zona_cinco']);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('tipo_zonas');
    }
}

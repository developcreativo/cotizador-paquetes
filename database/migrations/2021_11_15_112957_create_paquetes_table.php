<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaquetesTable extends Migration
{
    public function up()
    {
        Schema::create('paquetes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->double('peso', 4, 1);
            $table->double('valor_zona_uno', 4, 1);
            $table->double('valor_zona_dos', 4, 1);
            $table->double('valor_zona_tres', 4, 1);
            $table->double('valor_zona_cuatro', 4, 1);
            $table->double('valor_zona_cinco', 4, 1);
            $table->unsignedInteger('tarifario_id');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('paquetes');
    }
}

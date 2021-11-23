<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateZonasTable extends Migration
{
    public function up()
    {
        Schema::create('zonas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nombre');
            $table->unsignedInteger('tipo_zona_id');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('zonas');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::disableForeignKeyConstraints();

        Schema::create('cortes', function (Blueprint $table) {
            $table->increments('id')->unique()->primary();
            $table->string('programado')->nullable();
            $table->string('turno')->nullable();
            $table->string('finca')->nullable();
            $table->string('ac')->nullable();
            $table->string('contenedor')->nullable();
            $table->string('contenedor2')->nullable();
            $table->string('observaciones')->nullable();
            $table->string('placa');
            $table->string('ubicacion');
            $table->boolean('is_asigned')->default(false);
            $table->string('hora_aproximada_llegada')->nullable();
            $table->string('transporte');
            $table->string('orden_corta');
            $table->timestamps();
        });
        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cortes');
    }
};

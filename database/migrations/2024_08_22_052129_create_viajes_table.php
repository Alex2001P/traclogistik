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

        Schema::create('viajes', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('piloto_id');
            $table->foreign('piloto_id')->references('piloto_id')->on('pilotos');
            $table->unsignedInteger('camion_id');
            $table->foreign('camion_id')->references('camion_id')->on('camiones');
            $table->unsignedInteger('destino_id');
            $table->foreign('destino_id')->references('ubicacion_id')->on('ubicaciones');
            $table->unsignedInteger('origen_id');
            $table->foreign('origen_id')->references('ubicacion_id')->on('ubicaciones');
            $table->string('mercaderia', 200);
            $table->integer('peso');
            $table->unsignedInteger('status_id');
            $table->foreign('status_id')->references('status_id')->on('status_viajes');
            $table->timestamps();
        });

        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('viajes');
    }
};

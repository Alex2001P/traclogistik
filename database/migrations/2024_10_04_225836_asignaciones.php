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

        Schema::create('asignaciones', function (Blueprint $table) {
            $table->increments('asignacion_id')->unique()->primary();
            $table->unsignedInteger('transportista_id')->nullable();;
            $table->foreign('transportista_id')->references('id')->on('transportistas');
            $table->unsignedInteger('contenedor_id')->nullable();
            $table->foreign('contenedor_id')->references('id')->on('contenedores');
            $table->unsignedInteger('camion_id')->nullable();
            $table->foreign('camion_id')->references('camion_id')->on('camiones');
            $table->unsignedInteger('piloto_id')->nullable();
            $table->foreign('piloto_id')->references('piloto_id')->on('pilotos');
            $table->string('ubicacion', 140);
            $table->string('km', 10);
            $table->unsignedInteger('corte_id')->nullable();
            $table->boolean('status')->nullable()->default(false);
            $table->foreign('corte_id')->references('id')->on('cortes');
            $table->timestamps();
        });
        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('asignaciones');
    }
};

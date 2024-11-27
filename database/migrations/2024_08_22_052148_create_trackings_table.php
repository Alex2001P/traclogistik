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

        Schema::create('trackings', function (Blueprint $table) {
            $table->increments('tracking_id');
            $table->unsignedInteger('asignacion_id');
            $table->foreign('asignacion_id')->references('asignacion_id')->on('asignaciones');
            $table->float('latitude');
            $table->float('longitude');
            $table->timestamps();
        });

        Schema::enableForeignKeyConstraints();


    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('trackings');
    }
};

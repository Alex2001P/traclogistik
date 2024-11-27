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

        Schema::create('camiones', function (Blueprint $table) {
            $table->increments('camion_id');
            $table->string('placa', 10)->nullable();
            $table->string('chasis', 60)->nullable();
            $table->unsignedInteger('transportista_id')->nullable();;
            $table->foreign('transportista_id')->references('id')->on('transportistas');
            $table->timestamps();
            $table->unsignedInteger('status_id');
            $table->foreign('status_id')->references('status_id')->on('status_camiones');
            $table->boolean('soft_delete')->default(false);
        });

        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('camiones');
    }
};

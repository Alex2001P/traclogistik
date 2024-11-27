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

        Schema::create('pilotos', function (Blueprint $table) {
            $table->increments('piloto_id');
            $table->string('name', 125)->nullable();
            $table->string('lastname', 125)->nullable();
            $table->integer('telefono');
            $table->unsignedInteger('transportista_id')->nullable();;
            $table->foreign('transportista_id')->references('id')->on('transportistas');
            $table->unsignedInteger('status_id');
            $table->foreign('status_id')->references('status_id')->on('status_pilotos');
            $table->boolean('soft_delete')->default(false);
            $table->timestamps();
        });

        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pilotos');
    }
};

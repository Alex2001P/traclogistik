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

        Schema::create('contenedores', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('size');
            $table->foreign('size')->references('size_contenedor_id')->on('size_contenedores');
            $table->string('identificador', 150);
            $table->timestamps();
        });
        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contenedores');
    }
};

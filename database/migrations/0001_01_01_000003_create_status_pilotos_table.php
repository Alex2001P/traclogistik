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

        Schema::create('status_pilotos', function (Blueprint $table) {
            $table->increments('status_id');
            $table->string('name', 125)->nullable();
            $table->string('description', 200);
        });

        Schema::enableForeignKeyConstraints();


    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('status_pilotos');
    }
};

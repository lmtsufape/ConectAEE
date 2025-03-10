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
        Schema::create('gre_municipio_escola', function (Blueprint $table) {
            $table->id();

            $table->foreignId('gre_id')->constrainded();
            $table->foreignId('municipio_id')->constrained();
            $table->foreignId('escola_id')->constrained();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('gre_municipio_escola');
    }
};

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
        Schema::create('condicao_saudes', function (Blueprint $table) {
            $table->id();
            
            $table->boolean('tem_diagnostico')->default(false);
            $table->date('data_diagnostico')->nullable(); 
            $table->text('resultado_diagnostico')->nullable(); 
            $table->text('situacao_diagnostico')->nullable(); 

            $table->boolean('tem_outras_condicoes')->default(false);
            $table->text('outras_condicoes')->nullable();

            $table->boolean('faz_uso_medicacao')->default(false); 
            $table->string('medicacoes')->nullable();

            $table->boolean('tem_recomendacoes')->default(false);
            $table->text('recomendacoes')->nullable();

            $table->boolean('faz_acompanhamento')->default(false);
            $table->text('acompanhamento')->nullable(); 

            $table->foreignId('pdi_id')->constrained()->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('condicao_saudes');
    }
};

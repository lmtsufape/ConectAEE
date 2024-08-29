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
        Schema::create('desenvolvimento', function (Blueprint $table) {
            $table->id();

            $table->enum('sistema_linguistico', [
                'Comunicação Verbal/Fala',
                'Comunicação Alternativa/Suplementar',
                'Comunicação Alternativa/Voz',
                'Outro'
            ])->default('Comunicação Verbal/Fala');
            $table->string('outro_sistema_linguistico')->nullable();

            $table->string('tecnologia_assistiva_utilizada')->nullable();
            $table->string('recursos_equipamentos_necessarios')->nullable();
            $table->string('implicacoes_especificidade_educacional')->nullable();
            $table->string('outras_informacoes_relevantes')->nullable();

            $table->string('percepcao')->nullable();
            $table->string('atencao')->nullable();
            $table->string('memoria')->nullable();
            $table->string('linguagem')->nullable();
            $table->string('raciocinio_logico')->nullable();
            $table->string('desenvolvimento_capacidade_motora')->nullable();
            $table->string('area_emocional_afetiva_social')->nullable();
            $table->string('atividades_vida_autonoma')->nullable();

            $table->foreignId('pdi_id')->constrained();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('desenvolvimento');
    }
};

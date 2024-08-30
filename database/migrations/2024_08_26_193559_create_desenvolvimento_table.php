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
            $table->text('implicacoes_especificidade_educacional')->nullable();
            $table->text('outras_informacoes_relevantes')->nullable();

            $table->text('percepcao')->nullable();
            $table->text('atencao')->nullable();
            $table->text('memoria')->nullable();
            $table->text('linguagem')->nullable();
            $table->text('raciocinio_logico')->nullable();
            $table->text('desenvolvimento_capacidade_motora')->nullable();
            $table->text('area_emocional_afetiva_social')->nullable();
            $table->text('atividades_vida_autonoma')->nullable();

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
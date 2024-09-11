<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreEspecificidadeEducacionalRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'escola_acoes_existentes' => "required",
            'escola_acoes_desenvolvidas' => "required",
            'escola_responsaveis_acoes' => "required",
            'sala_aula_acoes_existentes' => "required",
            'sala_aula_acoes_desenvolvidas' => "required",
            'sala_aula_responsaveis_acoes' => "required",
            'sala_aee_acoes_existentes' => "required",
            'sala_aee_acoes_desenvolvidas' => "required",
            'sala_aee_responsaveis_acoes' => "required",
            'familia_acoes_existentes' => "required",
            'familia_acoes_desenvolvidas' => "required",
            'familia_responsaveis_acoes' => "required",
            'saude_acoes_existentes' => "required",
            'saude_acoes_desenvolvidas' => "required",
            'saude_responsaveis_acoes' => "required",

            'organizacao_tipo_aee' => 'required',
            'descricao_outro' => 'required_if:organizacao_tipo_aee,Outro',
            'atendimento_sala_recursos_multifuncionais' => 'required',
   
            'frequencia_atendimentos' => 'required',
            'frequencia_outro' => 'required_if:frequencia_atendimentos,Outro',
            'profissionais_educacao_necessarios' => 'required',
            'profissionais_educacao_outro' => 'required_if:profissionais_educacao_necessarios,Outro',



        ];
    }

    public function messages(): array
    {
        return [
            //
        ];
    }
}

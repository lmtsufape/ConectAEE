<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreDesenvolvimentoRequest extends FormRequest
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
            'sistema_linguistico'        => 'required',
            'outro_sistema_linguistico'      => 'required_if:sistema_linguistico,Outro',
            'tecnologia_assistiva_utilizada' => 'required',
            'recursos_equipamentos_necessarios'  => 'required',
            'implicacoes_especificidade_educacional'  => 'required',
            'outras_informacoes_relevantes'      => 'required',
            'percepcao'     => 'required',
            'atencao'            => 'required',
            'memoria'     => 'required',
            'linguagem'         => 'required',
            'raciocinio_logico'    => 'required',
            'desenvolvimento_capacidade_motora'        => 'required',
            'area_emocional_afetiva_social'        => 'required',
            'atividades_vida_autonoma'        => 'required',

        ];
    }

    public function messages(): array
    {
        return [
            //
        ];
    }
}


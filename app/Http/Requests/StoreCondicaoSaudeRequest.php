<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCondicaoSaudeRequest extends FormRequest
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
           'tem_diagnostico'        => 'required',
            'data_diagnostico'      => 'required',
            'resultado_diagnostico' => 'required',
            'situacao_diagnostico'  => 'required',
            'tem_outras_condicoes'  => 'required',
            'outras_condicoes'      => 'required',
            'faz_uso_medicacao'     => 'required',
            'medicacoes'            => 'required',
            'tem_recomendacoes'     => 'required',
            'recomendacoes'         => 'required',
            'faz_acompanhamento'    => 'required',
            'acompanhamento'        => 'required',
        ];
    }

    public function messages()
    {
        return [
            'tem_diagnostico.required'        => 'required',
            'data_diagnostico.required'      => 'required',
            'resultado_diagnostico.required' => 'required',
            'situacao_diagnostico.required'  => 'required',
            'tem_outras_condicoes.required'  => 'required',
            'outras_condicoes.required'      => 'required',
            'faz_uso_medicacao.required'     => 'required',
            'medicacoes.required'            => 'required',
            'tem_recomendacoes.required'     => 'required',
            'recomendacoes.required'         => 'required',
            'faz_acompanhamento.required'    => 'required',
            'acompanhamento.required'        => 'required',
        ];
    }
}

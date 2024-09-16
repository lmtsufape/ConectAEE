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
            'tem_diagnostico'       => 'required',
            'data_diagnostico'      => 'required_if:tem_diagnostico,true',
            'resultado_diagnostico' => 'required_if:tem_diagnostico,true',
            'situacao_diagnostico'  => 'required_if:tem_diagnostico,false',
            'tem_outras_condicoes'  => 'required',
            'outras_condicoes'      => 'required_if:tem_outras_condicoes,true',
            'faz_uso_medicacao'     => 'required',
            'medicacoes'            => 'required_if:faz_uso_medicacao,true',
            'tem_recomendacoes'     => 'required',
            'recomendacoes'         => 'required_if:tem_recomendacoes,true',
            'faz_acompanhamento'    => 'required',
            'acompanhamento'        => 'required_if:faz_acompanhamento,true',
        ];
    }

    public function messages()
    {
        return [
            
        ];
    }
}

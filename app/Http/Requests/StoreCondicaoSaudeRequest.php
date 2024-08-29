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
            
        ];
    }
}

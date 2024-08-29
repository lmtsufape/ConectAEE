<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreRecursosMultifuncionaisRequest extends FormRequest
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
           'trabalho_area_cognitiva' => 'required',
           'objetivo_area_cognitiva' => 'required',
           'trabalho_area_social' => 'required',
           'objetivo_area_social' => 'required',
           'trabalho_area_motora' => 'required',
           'objetivo_area_motora' => 'required',
           'trabalho_altas_habilidade_superdotacao' => 'required',
           'objetivo_altas_habilidade_superdotacao' => 'required',

           'atividades_para_desenvolver_aluno_aee' => 'required',
           'recursos_materias_equipamentos' => 'required',
        ];
    }

    public function messages(): array
    {
        return [
            //
        ];
    }
}

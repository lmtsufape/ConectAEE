<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Objetivo;
use App\Aluno;
use App\Atividade;

class AtividadeController extends Controller
{
  public function cadastrar($id_aluno, $id_objetivo){
      $tipos = ["Educação", "Saúde"];
      $prioridades = ["Alta","Média","Baixa"];
      $aluno = Aluno::find($id_aluno);
      $objetivo = Objetivo::find($id_objetivo);

      return view("atividade.cadastrar", ['aluno' => $aluno,
                                          'objetivo' => $objetivo,
                                          'tipos' => $tipos,
                                          'prioridades' => $prioridades]);
  }

  public function listar($id_aluno, $id_objetivo){

      $atividades = Atividade::all();
      $aluno = Aluno::find($id_aluno);
      $objetivo = Objetivo::find($id_objetivo);

      // dd($aluno);
      dd($objetivo);

      return view("atividade.listar", ['aluno' => $aluno,
                                       'objetivo' => $objetivo,
                                       'atividades' => $atividades]);
  }

}

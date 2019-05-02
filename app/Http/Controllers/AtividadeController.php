<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Objetivo;
use App\Aluno;
use App\Atividade;

class AtividadeController extends Controller
{
  public function listar($id_objetivo, $id_aluno){

      $atividades = Atividade::all();
      $objetivo = Objetivo::find($id_objetivo);
      $aluno = Aluno::find($id_aluno);

      return view("atividade.listar", ['aluno' => $aluno,
                                       'objetivo' => $objetivo,
                                      'atividades' => $atividades]);
  }

}

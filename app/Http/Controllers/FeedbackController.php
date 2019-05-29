<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Sugestao;

class FeedbackController extends Controller
{
    public function listar($id_sugestao){
        $sugestao = Sugestao::find($id_sugestao);
        $feedbacks = $sugestao->feedbacks;

        return view('feedback.listar',[
            'sugestao' => $sugestao,
            'feedbacks' => $feedbacks,
        ]);
    }

    public function cadastrar($id_aluno, $id_objetivo, $id_sugestao){
        $sugestao = Sugestao::find($id_sugestao);
        $objetivo = $sugestao->objetivo;
        $aluno = $objetivo->aluno;

        return view('feedback.cadastrar',[
            'aluno' => $aluno,
            'objetivo' => $objetivo,
            'sugestao' => $sugestao,
        ]);
    }
}

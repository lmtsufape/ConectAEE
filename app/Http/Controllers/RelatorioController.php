<?php

namespace App\Http\Controllers;

use PDF;
use Illuminate\Http\Request;
use App\Aluno;

class RelatorioController extends Controller
{
    public function gerarRelatorio($idAluno){
        $aluno = Aluno::all()->where('id', '=', $idAluno)->first();
        $pdf = PDF::loadView('/relatorio/relatorio', compact('aluno'));
        return $pdf->setPaper('a4')->stream('$nomePDF');
    }
}

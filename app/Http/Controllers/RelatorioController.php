<?php

namespace App\Http\Controllers;

use App\Models\Escola;
use Illuminate\Support\Facades\DB;
use PDF;
use Illuminate\Http\Request;
use App\Models\Aluno;

class RelatorioController extends Controller
{
    public function index()
    {   
        
        $num_escolas = Escola::count();
        $num_alunos = Aluno::count();
        $pdf = PDF::loadView('/relatorio/relatorio', compact('aluno', 'objetivos', 'albuns','imagens'));
        return $pdf->setPaper('a4')->stream('RelatorioAlunoConecta.pdf');
    }
}

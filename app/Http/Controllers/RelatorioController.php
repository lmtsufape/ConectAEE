<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use PDF;
use Illuminate\Http\Request;
use App\Models\Aluno;

class RelatorioController extends Controller
{
    public function gerarRelatorio(Request $request, $idAluno)
    {
        $aluno = Aluno::all()->where('id', '=', $idAluno)->first();
        $objetivos = DB::select("select * from objetivos o where (o.data between '" . $request->dataInicial . "' and '" . $request->dataFinal . "') 
        and o.aluno_id = $idAluno" );
        $albuns = DB::select("select * from albums a where (a.updated_at between '" . date('Y-m-d H:i:s',strtotime($request->dataInicial)) . "' and '" . date('Y-m-d H:i:s',strtotime($request->dataFinal . ' +1 day')) . "') 
        and a.aluno_id = $idAluno" );

        $imagens=$request->img;
        $pdf = PDF::loadView('/relatorio/relatorio', compact('aluno', 'objetivos', 'albuns','imagens'));
        return $pdf->setPaper('a4')->stream('RelatorioAlunoConecta.pdf');
    }
}

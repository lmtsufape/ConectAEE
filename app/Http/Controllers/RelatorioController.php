<?php

namespace App\Http\Controllers;

use App\Models\Escola;
use Illuminate\Support\Facades\DB;
use PDF;
use Illuminate\Http\Request;
use App\Models\Aluno;
use App\Models\Gre;
use App\Models\Municipio;
use App\Models\Pdi;

class RelatorioController extends Controller
{
    public function index()
    {   
        $alunos = Aluno::count();
        $pdis_concluidos = Pdi::where('status', 'Em andamento')->count();
        $pdis_em_andamento = Pdi::where('status', 'Concluido')->count();
        $pdis_criados = Pdi::count();
        $gres = Gre::get(['id', 'nome']);
        $municipios = Municipio::get(['id', 'nome']);
        $escolas = Escola::get(['id', 'nome']);
        

        return view('relatorios.dashboard', compact('alunos', 'pdis_concluidos', 'pdis_em_andamento', 'pdis_criados', 'gres', 'municipios', 'escolas'));
    }
}

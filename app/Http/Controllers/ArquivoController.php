<?php

namespace App\Http\Controllers;

use App\Arquivo;
use App\Atividade;
use FontLib\EOT\File;
use http\Env\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class ArquivoController extends Controller
{
    public static function cadastrar($id_atividade, $is_arquivo)
    {
        $atividade = Atividade::find($id_atividade);
        $objetivo = $atividade->objetivo;
        $aluno = $objetivo->aluno;
        return view('arquivo.cadastrar', [
            'is_arquivo' => $is_arquivo,
            'aluno' => $aluno,
            'objetivo' => $objetivo,
            'atividade' => $atividade,
        ]);
    }

    public static function download($id_arquivo){
        $arquivo = Arquivo::find($id_arquivo);
        return response()->download(public_path('/files/'.$arquivo->filename));
    }

    public static function excluir($id_arquivo){
        $arquivo = Arquivo::find($id_arquivo);
        $arquivo->delete();
        if (file_exists(public_path('/files/'.$arquivo->filename)) and $arquivo->extensao != 'link'){
            unlink(public_path('/files/'.$arquivo->filename));
        }
        return redirect()->back()->with('success','O arquivo foi excluído.');
    }

    public static function listar($id_atividade)
    {
        $atividade = Atividade::find($id_atividade);
        $objetivo = $atividade->objetivo;
        $aluno = $objetivo->aluno;
        $arquivos = Arquivo::all()->where('atividade_id', '=', $atividade->id);
        return view('arquivo.listar', [
            'aluno' => $aluno,
            'objetivo' => $objetivo,
            'atividade' => $atividade,
            'arquivos' => $arquivos,
        ]);
    }

    public static function criar(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'filenames' => 'required_without:link|mimes:doc,pdf,docx,xlsm,xlsx,pptx,ppt|max:2000',
            'link' => 'url|required_without:filenames',
            'titulo' => 'required',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator->errors())->withInput();
        }

        $extensao ='';

        if ($request->hasfile('filenames')) {
            $file = $request->file('filenames');
            $name = preg_replace("/[^a-zA-Z0-9]+/", "", $request->titulo) . '-' . time() . '.' . $file->extension();
            $extensao = $file->extension();
            $file->move(public_path() . '/files/', $name);

        }


        $file = new Arquivo();
        $file->titulo = $request->titulo;
        if ($request->link == null) {
            $file->filename = $name;
            $file->extensao = $extensao;
        } else {
            $file->link = $request->link;
            $file->extensao = 'link';
        }
        $file->atividade_id = $request->atividade_id;
        $file->save();

        return back()->with('success', 'Seu arquivo foi adicionado com sucesso!');
    }
}

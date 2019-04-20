<?php

namespace App\Http\Controllers;

use App\Aluno;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AlunoController extends Controller
{
  public function getCadastrar()
  {
      return view("aluno.cadastrar");
  }

  public function postCadastrar(Request $request){
      $validator = Validator::make($request->all(), [
          'nome' => ['required','min:2','max:191']
      ]);

      if($validator->fails()){
          return redirect()->back()->withErrors($validator->errors())->withInput();
      }

      $aluno = new Aluno();
      $aluno->nome = $request->nome;
      $aluno->save();

      return view("home");
  }
}

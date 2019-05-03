<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\MensagemForumAluno;
use Illuminate\Support\Facades\Validator;
use App\Aluno;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\URL;


class ForumController extends Controller
{
    public function enviarMensagemForumAluno(Request $request){
        //dd($request->all());

        $rules = array(
            'mensagem' => 'required',
        );
        $messages = array(
            'mensagem.required' => 'O campo de mensagem não pode estar vazio.',
        );
        $validator = Validator::make($request->all(),$rules,$messages);

        if($validator->fails()){
            return redirect()->back()->withErrors($validator->errors())->withInput();
        }
        
        $mensagem = new MensagemForumAluno();
        $mensagem->texto = $request->mensagem;
        $mensagem->user_id = \Auth::user()->id;
        $mensagem->forum_aluno_id = $request->forum_id;
        $mensagem->save();
        
        return Redirect::to(URL::previous() . "#forum");
    }

    public function abrirForumAluno($id_aluno){
        $aluno = Aluno::find($id_aluno);

        $mensagens = MensagemForumAluno::where('forum_aluno_id','=',$aluno->forum->id)->orderBy('created_at','desc')->get();

        return view("aluno.forum.mensagens",[
            'aluno' => $aluno,
            'mensagens' => $mensagens,
        ]);
    }
}

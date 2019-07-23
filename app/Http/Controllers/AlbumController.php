<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Aluno;
use App\Album;
use App\Foto;
use DateTime;

class AlbumController extends Controller
{
  public static function listar($id_aluno){
    $aluno = Aluno::find($id_aluno);
    $albuns = $aluno->albuns;

    return view("album.listar",[
      'aluno' => $aluno,
      'albuns' => $albuns,
    ]);
  }

  public static function ver($id_aluno, $id_album){
    $aluno = Aluno::find($id_aluno);
    $album = Album::find($id_album);
    $fotos = $album->fotos;

    return view("album.ver",[
      'aluno' => $aluno,
      'album' => $album,
      'fotos' => $fotos,
    ]);
  }

  public static function cadastrar($id_aluno){
    $aluno = Aluno::find($id_aluno);

    return view("album.cadastrar",[
      'aluno' => $aluno,
    ]);
  }

  public function criar(Request $request){

    $validator = Validator::make($request->all(), [
      'nome' => ['required','min:2','max:191'],
      'descricao' => ['nullable','max:500'],
      'imagens' => ['required'],
      'imagens.*' => ['image','mimes:jpeg,png,jpg,jpe,gif','max:3000'],
    ]);

    if($validator->fails()){
        return redirect()->back()->withErrors($validator->errors())->withInput();
    }

    $album = new Album();
    $album->nome = $request->nome;
    $album->descricao = $request->descricao;
    $album->aluno_id = $request->id_aluno;
    $album->save();

    foreach ($request->imagens as $imagem) {
      $nome = uniqid(date('HisYmd'));
      $extensao = $imagem->extension();

      $path = "albuns/".$request->id_aluno;
      $nomeArquivo = "{$nome}.{$extensao}";
      $imagem->move(public_path($path), $nomeArquivo);

      $foto = new Foto();
      $foto->imagem = "/".$path."/".$nomeArquivo;
      $foto->data = date('d/m/Y');
      $foto->album_id = $album->id;
      $foto->save();
    }

    return redirect()->route("album.listar", ["id_aluno"=>$request->id_aluno])->with('success','O álbum '.$album->nome.' foi criado.');

  }

}

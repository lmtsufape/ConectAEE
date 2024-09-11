<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Aluno;
use App\Models\Album;
use App\Models\Foto;
use DateTime;
use Illuminate\Support\Facades\Auth;

class AlbumController extends Controller
{
  public static function listar($aluno_id){
    $aluno = Aluno::find($aluno_id);
    // $albuns = $aluno->albuns;

    $albuns = Album::where('aluno_id', $aluno->id)->paginate(18);

    return view("album.listar",[
      'aluno' => $aluno,
      'albuns' => $albuns,
    ]);
  }

  public static function ver($id_album){
    $album = Album::find($id_album);
    $aluno = $album->aluno;
    $fotos = $album->fotos;

    return view("album.ver",[
      'aluno' => $aluno,
      'album' => $album,
      'fotos' => $fotos,
    ]);
  }

  public static function editar($id_album){
    $album = Album::find($id_album);
    $aluno = $album->aluno;
    $fotos = $album->fotos;

    return view("album.editar",[
      'aluno' => $aluno,
      'album' => $album,
      'fotos' => $fotos,
    ]);
  }

  public static function excluirAlbum($id_album){
    $album = Album::find($id_album);
    $aluno = $album->aluno;

    // foreach ($album->fotos as $foto) {
    //   unlink(substr($foto->imagem, 1));
    // }

    $album->delete();

    return redirect()->route("album.listar", ["aluno"=>$aluno])->with('success','O álbum '.$album->nome.' foi excluído.');
  }

  public static function excluirFotos(Request $request){

    foreach ($request->fotos as $id_foto) {
      $foto = Foto::find($id_foto);
      $album = $foto->album;
      $aluno = $album->aluno;

      // unlink(substr($foto->imagem, 1));

      $foto->delete();
    }

    if (count($album->fotos) == 0) {
      $album->delete();
      return redirect()->route("album.listar", ["aluno"=>$aluno])->with('success','O álbum '.$album->nome.' foi excluído.');
    }else{
      return redirect()->route("album.editar", ['id_album' => $album->id])->with('success','A imagem foi excluída.');
    }
  }

  public static function cadastrar($aluno_id){
    $aluno = Aluno::find($aluno_id);

    return view("album.cadastrar",[
      'aluno' => $aluno,
    ]);
  }

  public static function criar(Request $request){

    $validator = Validator::make($request->all(), [
      'nome' => ['required','min:2','max:191'],
      'descricao' => ['nullable','max:500'],
      'imagens' => ['required'],
      'imagens.*' => ['mimes:jpeg,png,jpg,jpe,gif','max:3000'],
    ]);

    if($validator->fails()){
      return redirect()->back()->withErrors($validator->errors())->withInput();
    }

    $album = new Album();
    $album->nome = $request->nome;
    $album->descricao = $request->descricao;
    $album->aluno_id = $request->aluno_id;
    $album->user_id = Auth::user()->id;
    $album->save();

    foreach ($request->imagens as $imagem) {
      $nome = uniqid(date('HisYmd'));
      $extensao = $imagem->extension();

      $path = "public/albuns/".$request->aluno_id;
      $nomeArquivo = "{$nome}.{$extensao}";
      $imagem->storeAs($path, $nomeArquivo);

      $foto = new Foto();
      $foto->imagem = $nomeArquivo;
      $foto->data = date('d/m/Y');
      $foto->album_id = $album->id;
      $foto->save();
    }

    return redirect()->route("album.listar", [
      "aluno_id"=>$request->aluno_id
    ])->with('success','O álbum '.$album->nome.' foi criado.');

  }

  public static function atualizar(Request $request){

    $validator = Validator::make($request->all(), [
      'nome' => ['required','min:2','max:191'],
      'descricao' => ['nullable','max:500'],
      'imagens.*' => ['mimes:jpeg,png,jpg,jpe,gif','max:3000'],
    ]);

    if($validator->fails()){
      return redirect()->back()->withErrors($validator->errors())->withInput();
    }

    $album = Album::find($request->id_album);
    $album->nome = $request->nome;
    $album->descricao = $request->descricao;
    $album->update();

    if ($request->imagens != null) {
      foreach ($request->imagens as $imagem) {
        $nome = uniqid(date('HisYmd'));
        $extensao = $imagem->extension();

        $path = "public/albuns/".$request->aluno_id;
        $nomeArquivo = "{$nome}.{$extensao}";
        $imagem->storeAs($path, $nomeArquivo);

        $foto = new Foto();
        $foto->imagem = $nomeArquivo;
        $foto->data = date('d/m/Y');
        $foto->album_id = $album->id;
        $foto->save();
      }
    }

    return redirect()->route("album.ver", ["id_album"=>$request->id_album])->with('success','O álbum '.$album->nome.' foi atualizado.');

  }

}

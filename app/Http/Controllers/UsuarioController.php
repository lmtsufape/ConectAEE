<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use App\User;

class UsuarioController extends Controller
{
  public function completarCadastro(){
    $usuario = \Auth::user();

    return view("usuario.completarCadastro", ['usuario' => $usuario]);
  }

  public function completar(Request $request){
    $user = User::find($request->id_usuario);

    $validator = Validator::make($request->all(), [
        'name' => ['required', 'string', 'max:255'],
        'email' => ['nullable', 'email', 'unique:users'],
        'username' => ['required', 'string', 'max:255'],
        'telefone' => ['required','numeric'],
        'password' => ['required', 'string', 'min:6', 'confirmed'],
    ]);

    $validator->sometimes('username', 'unique:users', function ($request) use ($user){
      return $request->username != $user->username;
    });

    if($validator->fails()){
        return redirect()->back()->withErrors($validator->errors())->withInput();
    }

    $user->name = $request->name;
    $user->email = $request->email;
    $user->username = $request->username;
    $user->telefone = $request->telefone;
    $user->password = Hash::make($request->password);
    $user->cadastrado = true;

    $user->update();

    return redirect()->route("aluno.listar")->with('success','Seu cadastro está completo!.');

  }
}

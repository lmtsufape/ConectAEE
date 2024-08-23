<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use App\Models\User;

class UserController extends Controller
{

    public function index(): View
    {
        $users = User::all();

        return view('users.index', compact('users'));
    }

    public function create(): View
    {
        return view('auth.register');
    }

    public function store(StoreUserRequest $request): Void
    {
        dd($request);
        User::create([$request]);
    }

    public function edit($id): View
    {
        $usuario = Auth::user();

        return view("users.edit", ['usuario' => $usuario]);
    }

    public function update(Request $request, $id)
    {
        $usuario = User::find($id);
        

        $usuario->name = $request->name;
        $usuario->username = $request->username;
        $usuario->email = $request->email;
        $usuario->cpf = $request->cpf;
        $usuario->telefone = $request->telefone;

        $usuario->update();

        return redirect()->route("aluno.index")->with('success', 'Seus dados foram atualizados!');
    }


    public function editarSenha()
    {
        return view('users.editarSenha');
    }


    public static function atualizarSenha(Request $request)
    {
        $usuario = Auth::user();

        if (!(Hash::check($request->senha_atual, $usuario->password))) {
            return redirect()->back()->with('fail', 'Senha atual incorreta.');
        }

        if ($request->nova_senha != $request->nova_senha_confirm) {
            return redirect()->back()->with('fail', 'Nova senha e confirmação são diferentes.');
        }

        $validator = Validator::make($request->all(), [
            'nova_senha' => 'min:6|max:16'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator->errors())->withInput();
        }

        $usuario->password = bcrypt($request->nova_senha);
        $usuario->update();

        return redirect()->route("aluno.index")->with('success', 'Sua senha foi atualizada!');
    }
}

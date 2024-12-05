<?php

namespace App\Http\Controllers;

use App\Http\Requests\users\StoreUserRequest;
use App\Models\Escola;
use App\Models\Especialidade;
use App\Models\Gre;
use App\Models\Municipio;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

class UserController extends Controller
{

    public function index(Request $request): View
    {
        $users = QueryBuilder::for(User::class)
        ->allowedFilters([
            AllowedFilter::exact('escola_id', 'escolas.id'),
            AllowedFilter::exact('gre_id', 'municipio.gre_id'),
            AllowedFilter::exact('municipio_id'), 
        ])
        ->defaultSort('nome')
        ->paginate(10);

        $gres = Gre::all();
        $municipios = Municipio::all();
        $escolas = Escola::all();
        $especialidades = Especialidade::all();

        return view('users.index', compact('users', 'gres', 'municipios', 'especialidades', 'escolas'));
    }

    public function create(): View
    {
        $especialidades = Especialidade::all();

        return view('auth.register', compact( 'especialidades'));
    }

    public function store(StoreUserRequest $request)
    {
        DB::transaction(function () use ($request) {
            $user = User::create(array_merge($request->except('password'), ['password' => Hash::make($request->password)]));
            $user->roles()->attach(2);
            $user->especialidades()->attach($request->especialidade);
            
            Auth::login($user);
        });

        return redirect()->route('home');
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

        return redirect()->route("alunos.index")->with('success', 'Seus dados foram atualizados!');
    }

    public function destroy($user_id){
        $user = User::findOrFail($user_id);
        $user->roles()->detach();
        $user->escolas()->detach();
        $user->especialidades()->detach();
        $user->delete();

        return redirect()->route('users.index')->with('success', 'Usuário deletado com sucesso!');

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

        return redirect()->route("alunos.index")->with('success', 'Sua senha foi atualizada!');
    }
}

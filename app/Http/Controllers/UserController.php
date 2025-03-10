<?php

namespace App\Http\Controllers;

use App\Http\Requests\users\UpdateUserRequest;
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
            AllowedFilter::exact('gre_id', 'escolas.municipio.gres.id'),
            AllowedFilter::exact('municipio_id', 'escolas.municipio.id'), 
        ])
        ->defaultSort('nome')
        ->paginate(10)->appends(request()->query());

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
            
            if(Auth::check()){
                Auth::login($user);
        
                return redirect()->route('home');
            }else{// Quando for o adm criando o user
                return redirect()->back()->with('success', 'Usuário Criado com Sucesso!');
            }
        });
    }

    public function edit($user_id): View
    {
        $user = Auth::user();

        return view("users.edit", ['user' => $user]);
    }

    public function update(UpdateUserRequest $request, $user_id)
    {
        $user = User::findOrFail($user_id);
        
        $user->update($request->all());

        return redirect()->back()->with('success', 'Dados atualizados com sucesso!');
    }

    public function destroy($user_id){
        $user = User::findOrFail($user_id);
        $user->roles()->detach();
        $user->escolas()->detach();
        $user->especialidades()->detach();
        $user->delete();

        return redirect()->route('users.index')->with('success', 'Usuário deletado com sucesso!');

    }

    public function autorizacao($user_id){
        $user = User::findOrFail($user_id);

        if($user->flag_ativo){
            $user->update(['flag_ativo' => false]);
        }else{
            $user->update(['flag_ativo' => true]);
        }

        return redirect()->back()->with('success', 'Autorização do usuário atualizada com sucesso');
    }

    public function redefinir_senha(){

    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Escola;
use Illuminate\Http\Request;

class EscolaController extends Controller
{
    public function index(){
        $escolas = Escola::paginate(10);

        return view('escolas.index', compact('escolas'));
    }

    public function show($escola_id){
        $escola = Escola::find($escola_id);

        return view('escolas.show', compact('escola'));
    }

    public function create(){
        $escolas = Escola::all();

        return view('escolas.create', compact('escolas'));
    }

    public function store(Request $request){
        $escolas = Escola::all();

        return view('escolas.index', compact('escolas'));
    }

    public function edit($escola_id){
        $escolas = Escola::find($escola_id);

        return view('escolas.edit', compact('escolas'));
    }

    public function update(Request $request, $escola_id){
        $escolas = Escola::find($escola_id);

        return view('escolas.index', compact('escolas'));
    }

    public function destroy($escola_id){
        Escola::find($escola_id)->delete();

        return view('escolas.index', compact('escolas'));
    }
}

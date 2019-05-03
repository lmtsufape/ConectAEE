<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('layouts.principal');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home')->middleware('auth');
Route::get('/', 'HomeController@index')->name('home')->middleware('auth');

//Rotas para alunos
Route::get('/aluno/cadastrar', 'AlunoController@cadastrar')->name('aluno.cadastrar');
Route::post('/aluno/criar', 'AlunoController@criar')->name('aluno.criar');
Route::get('/aluno/listar', 'AlunoController@listar')->name('aluno.listar');
Route::get('/aluno/{id}/gerenciar/', 'AlunoController@gerenciar')->name('aluno.gerenciar');
Route::get('/aluno/{id}/gerenciar/permissoes','AlunoController@gerenciarPermissoes')->name('aluno.permissoes');

Route::get('/aluno/{id}/gerenciar/permissoes/cadastrar','AlunoController@cadastrarPermissao')->name('aluno.permissoes.cadastrar');
Route::post('/aluno/gerenciar/permissoes/criar','AlunoController@criarPermissao')->name('aluno.permissoes.criar');

//Rotas para objetivos
Route::get('/aluno/{id_aluno}/objetivos/cadastrar','ObjetivoController@cadastrar')->name('objetivo.cadastrar');
Route::post('/aluno/objetivos/criar', 'ObjetivoController@criar')->name('objetivo.criar');
Route::get('/aluno/{id_aluno}/objetivos/listar','ObjetivoController@listar')->name('objetivo.listar');

//Rotas para atividade
Route::get('/aluno/{id_aluno}/objetivos/{id_objetivo}/atividades/listar','AtividadeController@listar')->name('objetivo.atividades.listar');
Route::get('/aluno/{id_aluno}/objetivos/{id_objetivo}/atividades/cadastrar','AtividadeController@cadastrar')->name('objetivo.atividades.cadastrar');

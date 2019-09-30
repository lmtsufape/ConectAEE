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

Route::middleware('autorizacao')->group(function() {

  Route::get('/home', 'HomeController@index')->name('home')->middleware('auth');
  Route::get('/', 'HomeController@index')->name('home')->middleware('auth');

  //Rotas para notificacao
  Route::get('/usuario/notificacao/listar', 'NotificacaoController@listar')->name('notificacao.listar');
  Route::get('/usuario/notificacao/{id_notificacao}/ler', 'NotificacaoController@ler')->name('notificacao.ler');

  //Rotas para usuario
  Route::get('/usuario/completarCadastro', 'UsuarioController@completarCadastro')->name('usuario.completarCadastro');
  Route::post('/usuario/completar', 'UsuarioController@completar')->name('usuario.completar');
  //novas
  Route::get('/usuario/editar', 'UsuarioController@editar')->name('usuario.editar');
  Route::post('/usuario/atualizar', 'UsuarioController@atualizar')->name('usuario.atualizar');
  Route::get('/usuario/editarSenha', 'UsuarioController@editarSenha')->name('usuario.editarSenha');
  Route::post('/usuario/atualizarSenha', 'UsuarioController@atualizarSenha')->name('usuario.atualizarSenha');

  //Rotas para alunos
  Route::get('/aluno/cadastrar', 'AlunoController@cadastrar')->name('aluno.cadastrar');
  Route::post('/aluno/criar', 'AlunoController@criar')->name('aluno.criar');
  Route::get('/aluno/listar', 'AlunoController@listar')->name('aluno.listar');
  Route::get('/aluno/buscar', 'AlunoController@buscar')->name('aluno.buscar');
  Route::post('/aluno/buscarMatricula', 'AlunoController@buscarMatricula')->name('aluno.buscarMatricula');
  Route::post('/aluno/buscarAluno', 'AlunoController@buscarAluno')->name('aluno.buscarAluno');
  Route::get('/aluno/{id_aluno}/gerenciar', 'AlunoController@gerenciar')->name('aluno.gerenciar');
  //novaa
  Route::get('/aluno/{id_aluno}/editar', 'AlunoController@editar')->name('aluno.editar');
  Route::get('/aluno/{id_aluno}/excluir', 'AlunoController@excluir')->name('aluno.excluir');
  Route::post('/aluno/atualizar', 'AlunoController@atualizar')->name('aluno.atualizar');

  //Permissões
  Route::get('/aluno/{id_aluno}/gerenciar/permissoes','AlunoController@gerenciarPermissoes')->name('aluno.permissoes');
  Route::get('/aluno/{id_aluno}/gerenciar/permissoes/cadastrar','AlunoController@cadastrarPermissao')->name('aluno.permissoes.cadastrar');
  Route::post('/aluno/gerenciar/permissoes/criar','AlunoController@criarPermissao')->name('aluno.permissoes.criar');
  Route::get('/aluno/{id_aluno}/gerenciar/permissoes/{id_permissao}/remover','AlunoController@removerPermissao')->name('aluno.permissoes.remover');
  Route::get('/aluno/{matricula}/gerenciar/permissoes/requisitar', 'AlunoController@requisitarPermissao')->name('aluno.permissoes.requisitar');
  Route::get('/aluno/{id_aluno}/gerenciar/permissoes/notificacao/{id_notificacao}/conceder', 'AlunoController@concederPermissao')->name('aluno.permissoes.conceder');
  Route::post('/aluno/gerenciar/permissoes/notificar','AlunoController@notificarPermissao')->name('aluno.permissoes.notificar');

  //Rotas para objetivos
  Route::get('/aluno/{id_aluno}/objetivos/cadastrar','ObjetivoController@cadastrar')->name('objetivo.cadastrar');
  Route::post('/aluno/objetivos/criar', 'ObjetivoController@criar')->name('objetivo.criar');
  Route::get('/aluno/{id_aluno}/objetivos/listar','ObjetivoController@listar')->name('objetivo.listar');
  Route::get('/aluno/objetivo/{id_objetivo}/gerenciar','ObjetivoController@gerenciar')->name('objetivo.gerenciar');
  Route::get('/aluno/objetivo/{id_objetivo}/gerenciar/concluir','ObjetivoController@concluir')->name('objetivo.concluir');
  Route::get('/aluno/objetivo/{id_objetivo}/gerenciar/desconcluir','ObjetivoController@desconcluir')->name('objetivo.desconcluir');
  //novas
  Route::get('/aluno/objetivo/{id_objetivo}/gerenciar/editar','ObjetivoController@editar')->name('objetivo.editar');
  Route::get('/aluno/objetivo/{id_objetivo}/gerenciar/excluir','ObjetivoController@excluir')->name('objetivo.excluir');
  Route::post('/aluno/objetivo/atualizar', 'ObjetivoController@atualizar')->name('objetivo.atualizar');

  //Rotas para atividade
  Route::get('/aluno/objetivo/{id_objetivo}/gerenciar/atividades/listar','AtividadeController@listar')->name('atividades.listar');
  Route::post('/aluno/objetivos/gerenciar/atividades/criar', 'AtividadeController@criar')->name('atividades.criar');
  Route::get('/aluno/objetivo/{id_objetivo}/gerenciar/atividades/cadastrar','AtividadeController@cadastrar')->name('atividades.cadastrar');
  Route::get('/aluno/objetivo/gerenciar/atividade/{id_atividade}/concluir','AtividadeController@concluir')->name('atividade.concluir');
  Route::get('/aluno/objetivo/gerenciar/atividade/{id_atividade}/desconcluir','AtividadeController@desconcluir')->name('atividade.desconcluir');
  //novas
  Route::get('/aluno/objetivo/gerenciar/atividade/{id_atividade}/ver','AtividadeController@ver')->name('atividade.ver');
  Route::get('/aluno/objetivo/gerenciar/atividade/{id_atividade}/editar','AtividadeController@editar')->name('atividade.editar');
  Route::get('/aluno/objetivo/gerenciar/atividade/{id_atividade}/excluir','AtividadeController@excluir')->name('atividade.excluir');
  Route::post('/aluno/atividade/atualizar', 'AtividadeController@atualizar')->name('atividade.atualizar');

  //Rotas para sugestão
  Route::get('/aluno/objetivo/{id_objetivo}/gerenciar/sugestoes/listar','SugestaoController@listar')->name('sugestoes.listar');
  Route::post('/aluno/objetivo/gerenciar/sugestoes/criar', 'SugestaoController@criar')->name('sugestoes.criar');
  Route::get('/aluno/objetivo/{id_objetivo}/gerenciar/sugestoes/cadastrar','SugestaoController@cadastrar')->name('sugestoes.cadastrar');
  //novas
  Route::get('/aluno/objetivo/gerenciar/sugestao/{id_sugestao}/ver','SugestaoController@ver')->name('sugestao.ver');
  Route::get('/aluno/objetivo/gerenciar/sugestao/{id_sugestao}/editar','SugestaoController@editar')->name('sugestao.editar');
  Route::get('/aluno/objetivo/gerenciar/sugestao/{id_sugestao}/excluir','SugestaoController@excluir')->name('sugestao.excluir');
  Route::post('/aluno/sugestao/atualizar', 'SugestaoController@atualizar')->name('objetivo.sugestao.atualizar');

  //Rotas para feedback
  Route::post('/aluno/objetivo/gerenciar/sugestao/feedbacks/criar','FeedbackController@criar')->name('feedbacks.criar');
  //novas
  Route::get('/aluno/objetivo/gerenciar/sugestao/feedback/{id_feedback}/excluir','FeedbackController@excluir')->name('feedback.excluir');
  Route::post('/aluno/feedbacks/atualizar', 'FeedbackController@atualizar')->name('feedback.atualizar');

  //Rotas para foruns
  Route::post('/aluno/forum/mensagem/enviar','ForumController@enviarMensagemForumAluno')->name('aluno.forum.mensagem.enviar');
  Route::get('/aluno/{id_aluno}/forum','ForumController@abrirForumAluno')->name('aluno.forum');
  Route::post('/aluno/objetivo/forum/mensagem/enviar','ForumController@enviarMensagemForumObjetivo')->name('objetivo.forum.mensagem.enviar');
  Route::get('/aluno/objetivo/{id_objetivo}/forum','ForumController@abrirForumObjetivo')->name('objetivo.forum');

  //rotas para statuses
  Route::get('/aluno/objetivos/{id_objetivo}/gerenciar/status/cadastrar','StatusController@cadastrar')->name('objetivo.status.cadastrar');
  Route::post('/aluno/objetivos/status/criar', 'StatusController@criar')->name('objetivo.status.criar');

  //Rotas para albuns //novas
  Route::get('/aluno/{id_aluno}/albuns/listar', 'AlbumController@listar')->name('album.listar');
  Route::get('/aluno/albuns/{id_album}/ver', 'AlbumController@ver')->name('album.ver');
  Route::get('/aluno/albuns/{id_album}/editar', 'AlbumController@editar')->name('album.editar');
  Route::get('/aluno/albuns/{id_album}/excluir', 'AlbumController@excluirAlbum')->name('album.excluir');
  Route::get('/aluno/albuns/foto/{id_foto}/excluir', 'AlbumController@excluirFoto')->name('album.foto.excluir');
  Route::get('/aluno/{id_aluno}/albuns/cadastrar', 'AlbumController@cadastrar')->name('album.cadastrar');
  Route::post('/aluno/albuns/criar', 'AlbumController@criar')->name('album.criar');
  Route::post('/aluno/albuns/atualizar', 'AlbumController@atualizar')->name('album.atualizar');

  //Instituição
  Route::get('/instituicao/cadastrar', 'InstituicaoController@cadastrar')->name('instituicao.cadastrar');
  Route::post('/instituicao/criar', 'InstituicaoController@criar')->name('instituicao.criar');
  //novas
  Route::get('/instituicao/listar', 'InstituicaoController@listar')->name('instituicao.listar');
  Route::get('/instituicao/{id_instituicao}/ver', 'InstituicaoController@ver')->name('instituicao.ver');
  Route::get('/instituicao/{id_instituicao}/editar', 'InstituicaoController@editar')->name('instituicao.editar');
  Route::get('/instituicao/{id_instituicao}/excluir', 'InstituicaoController@excluir')->name('instituicao.excluir');
  Route::post('/instituicao/atualizar', 'InstituicaoController@atualizar')->name('instituicao.atualizar');

});

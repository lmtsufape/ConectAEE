<?php

use App\Http\Controllers\AlbumController;
use App\Http\Controllers\AlunoController;
use App\Http\Controllers\ArquivoController;
use App\Http\Controllers\AtividadeController;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\ForumController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InstituicaoController;
use App\Http\Controllers\NotificacaoController;
use App\Http\Controllers\ObjetivoController;
use App\Http\Controllers\PdiController;
use App\Http\Controllers\SugestaoController;
use App\Http\Controllers\UsuarioController;
use App\Models\Feedback;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
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


Auth::routes();

Route::controller(HomeController::class)->group(function(){
    Route::get('video', 'video')->name('video');
    
    Route::middleware('auth')->group(function() {
        Route::get('home', 'index')->name('home');
        Route::get('', 'index');
    });
});

Route::prefix('usuarios/notificacoes')->controller(NotificacaoController::class)->group(function(){
    Route::get('listar', 'listar')->name('notificacao.listar')->middleware('checkCadastrado');
    Route::get('{id_notificacao}/ler', 'ler')->name('notificacao.ler')->middleware('checkNotificacao');
    Route::get('lerTodas', 'lerTodas')->name('notificacao.lerTodas');

});

Route::prefix('users')->controller(UsuarioController::class)->group(function(){
    Route::get('/completarCadastro', 'completarCadastro')->name('usuario.completarCadastro')->middleware('checkNaoCadastrado');
    Route::post('/completar', 'completar')->name('usuario.completar');
    Route::get('/editar', 'editar')->name('usuario.editar')->middleware('checkCadastrado');
    Route::post('/atualizar', 'atualizar')->name('usuario.atualizar');
    Route::get('/editarSenha', 'editarSenha')->name('usuario.editarSenha')->middleware('checkCadastrado');
    Route::post('/atualizarSenha', 'atualizarSenha')->name('usuario.atualizarSenha');

});

Route::prefix('aluno')->controller(AlunoController::class)->group(function(){
    Route::get('/cadastrar', 'cadastrar')->name('aluno.cadastrar')->middleware('checkCadastrado');
    Route::get('/listar', 'listar')->name('aluno.listar')->middleware('checkCadastrado');
    Route::get('/buscar', 'buscar')->name('aluno.buscar')->middleware('checkCadastrado');
    Route::get('/buscarCPF', 'buscarCPF')->name('aluno.buscarCPF')->middleware('checkCadastrado');
    Route::get('/buscarAluno', 'buscarAluno')->name('aluno.buscarAluno')->middleware('checkCadastrado');
    Route::get('/{id_aluno}/gerenciar', 'gerenciar')->name('aluno.gerenciar')->middleware('checkGerenciaAluno');
    Route::get('/{id_aluno}/editar', 'editar')->name('aluno.editar')->middleware('checkGerenciaAlunoAdministrador');
    Route::get('/{id_aluno}/excluir', 'excluir')->name('aluno.excluir')->middleware('checkGerenciaAlunoAdministrador');
    Route::post('/criar', 'criar')->name('aluno.criar');
    Route::post('/atualizar', 'atualizar')->name('aluno.atualizar');
    
    //Rotas para permissões
    Route::get('/{id_aluno}/gerenciar/permissoes/listar','gerenciarPermissoes')->name('aluno.permissoes')->middleware('checkGerenciaAlunoAdministrador');
    Route::get('/{id_aluno}/gerenciar/permissoes/cadastrar','cadastrarPermissao')->name('aluno.permissoes.cadastrar')->middleware('checkGerenciaAlunoAdministrador');
    Route::get('/{cpf}/gerenciar/permissoes/requisitar', 'requisitarPermissao')->name('aluno.permissoes.requisitar')->middleware('checkCadastrado');
    Route::get('/gerenciar/permissoes/{id_permissao}/editar','editarPermissao')->name('aluno.permissoes.editar')->middleware('checkGerenciaAdministrador');
    Route::get('/gerenciar/permissoes/{id_permissao}/remover','removerPermissao')->name('aluno.permissoes.remover')->middleware('checkGerenciaAdministrador');
    Route::get('/gerenciar/permissoes/notificacao/{id_notificacao}/conceder', 'concederPermissao')->name('aluno.permissoes.conceder')->middleware('checkNotificacao');
    Route::post('/gerenciar/permissoes/criar','criarPermissao')->name('aluno.permissoes.criar');
    Route::post('/gerenciar/permissoes/notificar','notificarPermissao')->name('aluno.permissoes.notificar');
    Route::post('/gerenciar/permissoes/atualizar','atualizarPermissao')->name('aluno.permissoes.atualizar');
});

Route::prefix('aluno/objetivos')->controller(ObjetivoController::class)->group(function(){
    Route::get('/{id_aluno}/cadastrar','cadastrar')->name('objetivo.cadastrar')->middleware('checkNaoResponsavel');
    Route::get('/{id_aluno}/listar','listar')->name('objetivo.listar')->middleware('checkGerenciaAluno');
    Route::get('/{id_objetivo}/gerenciar','gerenciar')->name('objetivo.gerenciar')->middleware('checkObjetivo');
    Route::get('/{id_objetivo}/gerenciar/finalizar','concluir')->name('objetivo.concluir')->middleware('checkObjetivoCriador');
    Route::get('/{id_objetivo}/gerenciar/reabrir','desconcluir')->name('objetivo.desconcluir')->middleware('checkObjetivoCriador');
    Route::get('/{id_objetivo}/gerenciar/editar','editar')->name('objetivo.editar')->middleware('checkObjetivoCriador');
    Route::get('/{id_objetivo}/gerenciar/excluir','excluir')->name('objetivo.excluir')->middleware('checkObjetivoCriador');
    Route::get('/{id_aluno}/buscar', 'buscar')->name('objetivo.buscar')->middleware('checkGerenciaAluno');
    Route::post('/atualizar', 'atualizar')->name('objetivo.atualizar');
    Route::post('/criar', 'criar')->name('objetivo.criar');

});

Route::prefix('aluno/objetivo/gerenciar/atividade')->controller(AtividadeController::class)->group(function(){
    Route::get('{id_objetivo}/cadastrar','cadastrar')->name('atividades.cadastrar')->middleware('checkObjetivoCriador');
    Route::get('gerenciar/atividade/{id_atividade}/finalizar','concluir')->name('atividade.concluir')->middleware('checkAtividadeCriador');
    Route::get('gerenciar/atividade/{id_atividade}/reabrir','desconcluir')->name('atividade.desconcluir')->middleware('checkAtividadeCriador');
    Route::get('gerenciar/atividade/{id_atividade}/editar','editar')->name('atividade.editar')->middleware('checkAtividadeCriador');
    Route::get('gerenciar/atividade/{id_atividade}/excluir','excluir')->name('atividade.excluir')->middleware('checkAtividadeCriador');
    Route::post('objetivos/criar', 'criar')->name('atividades.criar');
    Route::post('atividade/atualizar', 'atualizar')->name('atividade.atualizar');

});

Route::prefix('aluno/gerenciar/sugestoes')->controller(SugestaoController::class)->group(function(){
    Route::get('objetivo/{id_objetivo}/cadastrar','cadastrar')->name('sugestoes.cadastrar')->middleware('checkObjetivoNaoCriador');
    Route::get('/objetivo/{id_sugestao}/ver','ver')->name('sugestao.ver')->middleware('checkSugestao');
    Route::get('/objetivo/{id_sugestao}/editar','editar')->name('sugestao.editar')->middleware('checkSugestaoCriador');
    Route::get('/objetivo/{id_sugestao}/excluir','excluir')->name('sugestao.excluir')->middleware('checkSugestaoCriador');
    Route::post('/objetivo/criar', 'criar')->name('sugestoes.criar');
    Route::post('/sugestao/atualizar', 'atualizar')->name('objetivo.sugestao.atualizar');

});

Route::prefix('alunos/objetivos/gerenciar/sugestoes/feedbacks')->controller(FeedbackController::class)->group(function(){
    Route::get('/{id_feedback}/excluir','excluir')->name('feedback.excluir')->middleware('checkFeedbackCriador');
    Route::post('/criar','criar')->name('feedbacks.criar');
    Route::post('/atualizar', 'atualizar')->name('feedback.atualizar');
});

Route::prefix('alunos/forum')->controller(ForumController::class)->group(function(){
    Route::get('/{id_aluno}','abrirForumAluno')->name('aluno.forum')->middleware('checkGerenciaAluno');
    Route::post('/mensagem/enviar','enviarMensagemForumAluno')->name('aluno.forum.mensagem.enviar');
    Route::post('/objetivo/mensagem/enviar','enviarMensagemForumObjetivo')->name('objetivo.forum.mensagem.enviar');

});

Route::prefix('alunos/albuns')->controller(AlbumController::class)->group(function(){
    Route::get('/{id_aluno}/listar', 'listar')->name('album.listar')->middleware('checkGerenciaAluno');
    Route::get('/{id_aluno}/cadastrar', 'cadastrar')->name('album.cadastrar')->middleware('checkGerenciaAluno');
    Route::get('/{id_album}/ver', 'ver')->name('album.ver')->middleware('checkAlbum');
    Route::get('/{id_album}/editar', 'editar')->name('album.editar')->middleware('checkAlbumCriador');
    Route::get('/{id_album}/excluir', 'excluirAlbum')->name('album.excluir')->middleware('checkAlbumCriador');
    Route::post('/fotos/excluir', 'excluirFotos')->name('album.fotos.excluir');
    Route::post('/criar', 'criar')->name('album.criar');
    Route::post('/atualizar', 'atualizar')->name('album.atualizar');
});

Route::prefix('intituicoes')->controller(InstituicaoController::class)->group(function(){
    Route::get('/cadastrar', 'cadastrar')->name('instituicao.cadastrar')->middleware('checkCadastrado');
    Route::get('/listar', 'listar')->name('instituicao.listar')->middleware('checkCadastrado');
    Route::get('/buscar', 'buscar')->name('instituicao.buscar')->middleware('checkCadastrado');
    Route::get('/{id_instituicao}/ver', 'ver')->name('instituicao.ver')->middleware('checkCadastrado');
    Route::get('/{id_instituicao}/editar', 'editar')->name('instituicao.editar')->middleware('checkInstituicaoCriador');
    Route::get('/{id_instituicao}/excluir', 'excluir')->name('instituicao.excluir')->middleware('checkInstituicaoCriador');
    Route::post('/criar', 'criar')->name('instituicao.criar');
    Route::post('/atualizar', 'atualizar')->name('instituicao.atualizar');

});

Route::prefix('aluno/pdi')->controller(PdiController::class)->group(function(){
    Route::get('/{id_aluno}/cadastrar', 'cadastrar')->name('pdi.cadastrar')->middleware('checkPdi');
    Route::get('/{id_aluno}/cadastrarArquivo', 'cadastrarArquivo')->name('pdi.cadastrarArquivo')->middleware('checkPdi');
    Route::post('/criar', 'criar')->name('pdi.criar');
    Route::post('/criarArquivo', 'criarArquivo')->name('pdi.criarArquivo');
    Route::get('/{id_aluno}/listar', 'listar')->name('pdi.listar')->middleware('checkPdi');
    Route::get('/{id_pdi}/ver', 'ver')->name('pdi.ver');
    Route::get('/{id_pdi}/excluir', 'excluir')->name('pdi.excluir')->middleware('checkPdiCriador');
    Route::get('/{id_pdi}/editar', 'editar')->name('pdi.editar')->middleware('checkPdiCriador');
    Route::post('/atualizar', 'atualizar')->name('pdi.atualizar');
    Route::get('/arquivo/{id_pdiArquivo}/download','download')->name('pdi.download');
    Route::get('/arquivo/{id_pdiArquivo}/excluirArquivo','excluirArquivo')->name('pdi.excluirArquivo')->middleware('checkPdiArquivoCriador');
    Route::get('/{id_pdi}/pdf', 'gerarPdf')->name('pdi.pdf');
});

Route::prefix('arquivos')->controller(ArquivoController::class)->group(function(){
    Route::get('/{id_arquivo}/download','download')->name('arquivo.download')->middleware('checkAtividadeCriador');
    Route::get('/{id_arquivo}/excluir','excluir')->name('arquivo.excluir')->middleware('checkAtividadeCriador');
    Route::get('/aluno/objetivo/gerenciar/atividade/{id_atividade}/listar','listar')->name('arquivo.listar')->middleware('checkAtividadeCriador');
    Route::get('/aluno/objetivo/gerenciar/atividade/{id_atividade}/{is_arquivo}/cadastrar','cadastrar')->name('arquivo.cadastrar')->middleware('checkAtividadeCriador');
    Route::post('/criar','criar')->name('arquivo.criar');
});

//Rotas para relatorio
Route::get('/aluno/{id_aluno}/relatorio', 'RelatorioController@gerarRelatorio')->name('relatorio.gerar');

Route::post('/aluno/objetivo/status/atualizar', 'StatusController@atualizar')->name('objetivo.status.atualizar');
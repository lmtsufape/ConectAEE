<?php

use App\Http\Controllers\AlbumController;
use App\Http\Controllers\AlunoController;
use App\Http\Controllers\ArquivoController;
use App\Http\Controllers\AtividadeController;
use App\Http\Controllers\CondicaoSaudeController;
use App\Http\Controllers\DesenvolvimentoController;
use App\Http\Controllers\EspecificidadeEducacionalController;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\ForumController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InstituicaoController;
use App\Http\Controllers\NotificacaoController;
use App\Http\Controllers\ObjetivoController;
use App\Http\Controllers\PdiController;
use App\Http\Controllers\RecursosMultifuncionaisController;
use App\Http\Controllers\SugestaoController;
use App\Http\Controllers\UserController;
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
    Route::get('listar', 'listar')->name('notificacao.listar');
    Route::get('{id_notificacao}/ler', 'ler')->name('notificacao.ler')->middleware('checkNotificacao');
    Route::get('lerTodas', 'lerTodas')->name('notificacao.lerTodas');

});

Route::prefix('users')->controller(UserController::class)->group(function(){
    Route::get('/completarCadastro', 'completarCadastro')->name('usuario.completarCadastro');
    Route::post('/completar', 'completar')->name('usuario.completar');
    Route::get('/create', 'create')->name('user.create');
    Route::post('/store', 'store')->name('user.store');
    Route::get('/edit/{id}', 'edit')->name('user.edit');
    Route::put('/', 'update')->name('user.update');

});

Route::prefix('aluno')->controller(AlunoController::class)->group(function(){
    Route::get('/', 'index')->name('aluno.index');
    Route::get('/{aluno_id}/show', 'show')->name('aluno.show');
    Route::post('/criar', 'store')->name('aluno.store');
    Route::get('/cadastrar', 'create')->name('aluno.create');
    Route::get('/{aluno_id}/editar', 'edit')->name('aluno.edit');
    Route::post('/atualizar', 'update')->name('aluno.update');
    Route::get('/buscar', 'buscar')->name('aluno.buscar');
    Route::get('/buscarCPF', 'buscarCPF')->name('aluno.buscarCPF');
    Route::get('/buscarAluno', 'buscarAluno')->name('aluno.buscarAluno');
    Route::get('/{aluno_id}/excluir', 'delete')->name('aluno.delete');
    
    //Rotas para permissões
    Route::get('/{aluno_id}/gerenciar/permissoes/listar','gerenciarPermissoes')->name('aluno.permissoes');
    Route::get('/{aluno_id}/gerenciar/permissoes/cadastrar','cadastrarPermissao')->name('aluno.permissoes.cadastrar');
    Route::get('/{cpf}/gerenciar/permissoes/requisitar', 'requisitarPermissao')->name('aluno.permissoes.requisitar');
    Route::get('/gerenciar/permissoes/{id_permissao}/editar','editarPermissao')->name('aluno.permissoes.editar');
    Route::get('/gerenciar/permissoes/{id_permissao}/remover','removerPermissao')->name('aluno.permissoes.remover');
    Route::get('/gerenciar/permissoes/notificacao/{id_notificacao}/conceder', 'concederPermissao')->name('aluno.permissoes.conceder');
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

Route::prefix('aluno/pdi')->controller(PdiController::class)->group(function(){
    Route::get('/{id_aluno}/listar', 'index')->name('pdi.index');
    Route::get('/{id_pdi}/ver', 'show')->name('pdi.show');
    Route::get('/{id_aluno}/cadastrar', 'create')->name('pdi.create');
    Route::post('/criar', 'store')->name('pdi.store');
    Route::get('/{id_pdi}/editar', 'edit')->name('pdi.edit');
    Route::post('/atualizar', 'update')->name('pdi.update');
    Route::get('/{id_pdi}/excluir', 'delete')->name('pdi.delete');

    Route::get('/{id_aluno}/cadastrarArquivo', 'cadastrarArquivo')->name('pdi.cadastrarArquivo');
    Route::post('/criarArquivo', 'criarArquivo')->name('pdi.criarArquivo');
    Route::get('/arquivo/{id_pdiArquivo}/download','download')->name('pdi.download');
    Route::get('/arquivo/{id_pdiArquivo}/excluirArquivo','excluirArquivo')->name('pdi.excluirArquivo')->middleware('checkPdiArquivoCriador');
    Route::get('/{id_pdi}/pdf', 'gerarPdf')->name('pdi.pdf');

    
    
});
Route::get('/saude/{pdi_id}', [CondicaoSaudeController::class, 'create_condicoes_saude'])->name('pdi.create_condicoes_saude');
Route::get('/desenvolvimento/{pdi_id}', [DesenvolvimentoController::class, 'create_desenvolvimento_estudante'])->name('pdi.create_desenvolvimento_estudante');
Route::get('/especificidade/{pdi_id}', [EspecificidadeEducacionalController::class, 'create_especificidade_educacional'])->name('pdi.create_especificidade_educacional');
Route::get('/recursos/{pdi_id}', [RecursosMultifuncionaisController::class, 'create_recursos_mult_funcionais'])->name('pdi.create_recursos_mult_funcionais');
Route::post('/cond', [CondicaoSaudeController::class, 'store'])->name('pdi.condicoes_saude');
Route::post('/desen', [DesenvolvimentoController::class, 'store'])->name('pdi.desenvolvimento_estudante');
Route::post('/especificidade', [EspecificidadeEducacionalController::class, 'store'])->name('pdi.especificidade_educacional');
Route::post('/recursos', [RecursosMultifuncionaisController::class, 'store'])->name('pdi.recursos_mult_funcionais');
// Route::get('/listar5', 'create_finalizacao')->name('pdi.create_finalizacao');

Route::prefix('arquivos')->controller(ArquivoController::class)->group(function(){
    Route::get('/{id_arquivo}/download','download')->name('arquivo.download')->middleware('checkAtividadeCriador');
    Route::get('/{id_arquivo}/excluir','excluir')->name('arquivo.excluir')->middleware('checkAtividadeCriador');
    Route::get('/aluno/objetivo/gerenciar/atividade/{id_atividade}/listar','listar')->name('arquivo.listar')->middleware('checkAtividadeCriador');
    Route::get('/aluno/objetivo/gerenciar/atividade/{id_atividade}/{is_arquivo}/cadastrar','cada strar')->name('arquivo.cadastrar')->middleware('checkAtividadeCriador');
    Route::post('/criar','criar')->name('arquivo.criar');
});

//Rotas para relatorio
Route::get('/aluno/{id_aluno}/relatorio', 'RelatorioController@gerarRelatorio')->name('relatorio.gerar');

Route::post('/aluno/objetivo/status/atualizar', 'StatusController@atualizar')->name('objetivo.status.atualizar');
<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\FornecedorController;
use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\ProdutoDetalheController;
use App\Models\Fornecedor;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

/*Route::get('/', function () {
    return 'Seja bem vindo';
});

Route::get('/sobre-nos', function () {
    return 'Está é a pagina que fala sobre nossa empresa.';
});

Route::get('/contatos', function () {
    return 'Está é a página com os nossos contatos.';
});*/

Route::get('/',[\App\Http\Controllers\PrincipalController::class,'principal'])->name('site.principal');

Route::get('/sobre-nos',[\App\Http\Controllers\SobreNosController::class,'sobrenos'])->name('site.sobre-nos');

Route::get('/contato',[\App\Http\Controllers\ContatoController::class,'contato'])->name('site.contato');

Route::post('/contato',[\App\Http\Controllers\ContatoController::class,'salvar'])->name('site.contato');

Route::get('/login/{erro?}',[LoginController::class, 'index'])->name('site.login');
Route::post('/login',[LoginController::class, 'autenticar'])->name('site.login');

// rota produto
Route::resource('produto', ProdutoController::class);
// rota produto-detalhe
Route::resource('produto-detalhe', ProdutoDetalheController::class);

Route::middleware('autenticacao:padrao')->prefix('/app')->group(function() {
  
    Route::get('/home', [HomeController::class, 'index'])->name('app.home');
    Route::get('/sair', [LoginController::class, 'sair'])->name('app.sair');
    Route::get('/cliente', [ClienteController::class, 'index'])->name('app.cliente');

    Route::get('/fornecedor', [FornecedorController::class, 'index'])->name('app.fornecedor');
    Route::get('/fornecedor/listar', [FornecedorController::class, 'listar'])->name('app.fornecedor.listar');
    Route::post('/fornecedor/listar', [FornecedorController::class, 'listar'])->name('app.fornecedor.listar');
    Route::get('/fornecedor/adicionar', [FornecedorController::class, 'adicionar'])->name('app.fornecedor.adicionar');
    Route::post('/fornecedor/adicionar', [FornecedorController::class, 'adicionar'])->name('app.fornecedor.adicionar');
    Route::get('/fornecedor/editar/{id}/{msg?}', [FornecedorController::class, 'editar'])->name('app.fornecedor.editar');
    Route::get('/fornecedor/exclui/{id}',[FornecedorController::class, 'excluir'])->name('app.fornecedor.excluir');
    


    Route::get('/produto', [ProdutoController::class, 'index'])->name('app.produto');
});

Route::get('/teste/{p1}/{p2}', [\App\Http\Controllers\TesteController::class,'teste'])->name('site.teste');




// Rota com mensagem padrão, para "substituir" mensagem de erro.

// Route::fallback(function(){
//     echo 'A página indicada não existe. <a href="'.route('site.principal').'">Clique aqui</a> para voltar a página inicial.';
// });


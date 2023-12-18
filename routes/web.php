<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\DevShopController;
use App\Http\Controllers\ProdutoController;

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

Route::get('/', [DevShopController::class, 'index'])->name('index');

// Produtos
Route::get('/produtos', [ProdutoController::class, 'index'])->name('produtos.index');
Route::get('/produto/{id}', [ProdutoController::class, 'detalhesProduto'])->name('produtos.detalhes');
Route::get('/produtos/criar', [ProdutoController::class, 'viewCriarProduto'])->name('produtos.criarProduto')->middleware('auth');
Route::get('/produto/editar/{id}', [ProdutoController::class, 'viewEditarProduto'])->name('produtos.editarProduto')->middleware('auth');
Route::get('/buscar', [ProdutoController::class, 'pesquisarProduto'])->name('produtos.pesquisar');
Route::post('/buscar', [ProdutoController::class, 'pesquisarProduto'])->name('produtos.pesquisar');
Route::post('/produtos', [ProdutoController::class, 'criarProduto'])->name('produtos.criar')->middleware('auth');
Route::put('/produto/editar/{id}', [ProdutoController::class, 'editar'])->name('produtos.editar')->middleware('auth');
Route::delete('/produto/{id}', [ProdutoController::class, 'deletar'])->name('produtos.deletar')->middleware('auth');

// Categorias

Route::get('/categorias', [CategoriaController::class, 'index'])->name('categorias.index');
Route::get('/categorias/criar', [CategoriaController::class, 'viewCriarCategoria'])->name('categorias.criarCategoria');
Route::post('/categorias', [CategoriaController::class, 'criar'])->name('categorias.criar');
Route::delete('/categorias/${id}', [CategoriaController::class, 'deletar'])->name('categorias.deletar');

Route::get('/teste', function() {
    return storage_path();
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

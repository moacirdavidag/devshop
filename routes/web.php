<?php

use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\ProdutoController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('index');
});

// Produtos
Route::get('/produtos', [ProdutoController::class, 'index'])->name('produtos.index');
Route::get('/produto/{id}', [ProdutoController::class, 'detalhesProduto'])->name('produtos.detalhes');
Route::get('/produtos/criar', [ProdutoController::class, 'viewCriarProduto'])->name('produtos.criarProduto');
Route::get('/produto/editar/{id}', [ProdutoController::class, 'viewEditarProduto'])->name('produtos.editarProduto');
Route::post('/produtos', [ProdutoController::class, 'criarProduto'])->name('produtos.criar');
Route::put('/produto/editar/{id}', [ProdutoController::class, 'editar'])->name('produtos.editar');
Route::delete('/produto/{id}', [ProdutoController::class, 'deletar'])->name('produtos.deletar');

// Categorias

Route::get('/categorias', [CategoriaController::class, 'index'])->name('categorias.index');
Route::get('/categorias/criar', [CategoriaController::class, 'viewCriarCategoria'])->name('categorias.criarCategoria');
Route::post('/categorias', [CategoriaController::class, 'criar'])->name('categorias.criar');
Route::delete('/categorias/${id}', [CategoriaController::class, 'deletar'])->name('categorias.deletar');

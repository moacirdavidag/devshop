<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUpdateProduto;
use App\Models\Produto;

class ProdutoController extends Controller
{
    public function index()
    {
        $produtos = Produto::all();
        return view('produtos.index', [
            'produtos' => $produtos
        ]);
    }

    public function detalhesProduto($id)
    {
        if (!$produto = Produto::find($id)) {
            return response('Produto não encontrado', 404);
        }
        return view('produtos.detalhes-produto', [
            'produto' => $produto
        ]);
    }

    public function viewCriarProduto() {
        return view('admin.criar-produto');
    }

    public function criarProduto(StoreUpdateProduto $request)
    {
        Produto::create($request->all());
        return redirect('produtos.index');
    }

    public function viewEditarProduto($id) {
        $produto = Produto::find($id);
        if(!$produto) {
            return response('Produto não encontrado', 404);
        }
        return view('produtos.editar-produto', [
            'produto' => $produto
        ]);
    }
    public function editar(StoreUpdateProduto $update, $id) {
        if(!$produto = Produto::find($id)) {
            return response('Produto não encontrado', 404);
        }
        $produto->update($update->all());
    }

    public function deletar($id) {
        if(!$produto = Produto::find($id)) {
            return response('Produto não encontrado', 404);
        }
        $produto->delete($id);
    }

}

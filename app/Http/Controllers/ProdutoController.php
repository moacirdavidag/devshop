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

    public function criarProduto()
    {
        return view('admin.produtos.criar-produto');
    }

    public function store(StoreUpdateProduto $request)
    {
        Produto::create($request->all());
        return redirect()->route('produtos.index');
    }
}

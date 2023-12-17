<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUpdateProduto;
use App\Models\Categoria;
use App\Models\Produto;
use DB;

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
        $categoria = DB::table('produtos')
        ->join('categorias', 'produtos.categoria_id', '=', 'categorias.id')
        ->get();
        return view('produtos.detalhes-produto', [
            'produto' => $produto,
            'categoria' => $categoria
        ]);
    }

    public function viewCriarProduto()
    {
        $categorias = Categoria::all();
        return view('admin.produtos.criar-produto', [
            'categorias' => $categorias
        ]);
    }

    public function criarProduto(StoreUpdateProduto $request)
    {
        $produto = $request->all();
        if($request->hasFile('imagem') && $request->imagem->isValid()) {
            $imagemProduto = $request->file('imagem');

            $extensaoImagem = $imagemProduto->extension();

            $hashImagem = md5($imagemProduto->getClientOriginalName() . strtotime("now")) . "." . $extensaoImagem;
        
            $imagemProduto->storeAs("/public/produtos", $hashImagem);
            $produto['imagem'] = $hashImagem;
        }
        Produto::create($produto);

        return redirect()->route('produtos.index')->with('Produto criado com sucesso');
    }

    public function viewEditarProduto($id)
    {
        $produto = Produto::find($id);
        $categorias = Categoria::all();
        if (!$produto) {
            return response('Produto não encontrado', 404);
        }
        return view('admin.produtos.editar-produto', [
            'produto' => $produto,
            'categorias' => $categorias
        ]);
    }
    public function editar(StoreUpdateProduto $update, $id)
    {
        if (!$produto = Produto::find($id)) {
            return response('Produto não encontrado', 404);
        }
        if($update->hasFile('imagem') && $update->imagem->isValid()) {
            $imagemProduto = $update->file('imagem');

            $extensaoImagem = $imagemProduto->extension();

            $hashImagem = md5($imagemProduto->getClientOriginalName() . strtotime("now")) . "." . $extensaoImagem;
        
            $imagemProduto->storeAs("/public/produtos", $hashImagem);
            $produto['imagem'] = $hashImagem;
        }
        $produto['categoria_id'] = $update->categoria_id;
        $produto->save();
        return redirect()->route('produtos.index')->with('Produto editado com sucesso');
    }

    public function deletar($id)
    {
        if (!$produto = Produto::find($id)) {
            return response('Produto não encontrado', 404);
        }
        $produto->delete($id);
        return redirect()->route('produtos.index')->with('Produto deletado com sucesso');
    }

}

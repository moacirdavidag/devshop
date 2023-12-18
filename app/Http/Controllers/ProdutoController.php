<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUpdateProduto;
use App\Models\Categoria;
use App\Models\Produto;
use DB;
use \Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class ProdutoController extends Controller
{
    public function index(Request $request)
    {

        $produtosFiltro = Produto::query();

        if($request->has('categoria')) {
            $idCategoria = $request->input('categoria');
            $produtosFiltro->where("categoria_id", "=", $idCategoria);
        }

        if($request->has('preco')) {
            $filtroPreco = $request->input('preco', 'asc');
            $produtosFiltro->orderBy("preco", $filtroPreco);
        }

        $categorias = Categoria::all();

        $produtos = $produtosFiltro->paginate(3);
        return view('produtos.index', [
            'produtos' => $produtos,
            'categorias' => $categorias
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
        if (Gate::allows('isAdmin')) {
            $categorias = Categoria::all();
            return view('admin.produtos.criar-produto', [
                'categorias' => $categorias
            ]);
        } else {
            return redirect('/produtos')->with('Permissão negada');
        }
    }

    public function criarProduto(StoreUpdateProduto $request)
    {
        $produto = $request->all();
        if ($request->hasFile('imagem') && $request->imagem->isValid()) {
            $imagemProduto = $request->file('imagem');

            $extensaoImagem = $imagemProduto->extension();

            $hashImagem = md5($imagemProduto->getClientOriginalName() . strtotime("now")) . "." . $extensaoImagem;

            $imagemProduto->storeAs("/public/produtos", $hashImagem);
            $produto['imagem'] = $hashImagem;
        }
        if (Gate::allows('isAdmin', $produto)) {
            Produto::create($produto);
            return redirect()->route('produtos.index')->with('Produto criado com sucesso');
        } else {
            return redirect('/produtos')->with('Permissão negada');
        }

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
        if ($update->hasFile('imagem') && $update->imagem->isValid()) {
            $imagemProduto = $update->file('imagem');

            $extensaoImagem = $imagemProduto->extension();

            $hashImagem = md5($imagemProduto->getClientOriginalName() . strtotime("now")) . "." . $extensaoImagem;

            $imagemProduto->storeAs("/public/produtos", $hashImagem);
            $produto['imagem'] = $hashImagem;
        }
        $produto['categoria_id'] = $update->categoria_id;
        if (Gate::allows('isAdmin', $produto)) {
            $produto->save();
            return redirect()->route('produtos.index')->with('Produto editado com sucesso');
        } else {
            return redirect('/produtos')->with('Permissão negada');
        }
    }

    public function deletar($id)
    {
        if (!$produto = Produto::find($id)) {
            return response('Produto não encontrado', 404);
        }
        if (Gate::allows('isAdmin', $produto)) {
            $produto->delete($id);
            return redirect()->route('produtos.index')->with('Produto deletado com sucesso');
        } else {
            return redirect()->route('produto/' . $id)->with('Permissão negada');
        }
    }

    public function pesquisarProduto(Request $request)
    {
        $resultados = DB::table("produtos")->where("nome", "LIKE", "%".$request->busca."%")
            ->orWhere("descricao", "LIKE", "%{$request->busca}%")
            ->paginate(3);
        return view('produtos.pesquisa-resultados', [
            'resultados' => $resultados
        ]);
    }

}

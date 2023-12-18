<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUpdateCategoria;
use App\Models\Categoria;
use App\Models\Produto;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class CategoriaController extends Controller
{
    public function index()
    {
        $categorias = Categoria::all();
        return view('categorias.index', [
            'categorias' => $categorias
        ]);
    }

    public function viewCriarCategoria()
    {
        if (Gate::allows('isAdmin')) {
            return view('admin.categorias.criar-categoria');
        } else {
            return redirect('/categorias')->with('Permissão negada');
        }
    }

    public function criar(StoreUpdateCategoria $request)
    {
        if (Gate::allows('isAdmin', $request)) {
            Categoria::create($request->all());
            return redirect()->route('categorias.index')->with('Categoria criada com sucesso');
        } else {
            return redirect('/categorias')->with('Permissão negada');
        }
    }

    public function deletar($id)
    {
        if (!$categoria = Categoria::find($id)) {
            return response('Categoria não encontrada', 404);
        }
        if (Gate::allows('isAdmin', $categoria)) {
            $categoria->delete();
            return redirect()->route('categorias.index')->with('Categoria deletada com sucesso');
        } else {
            return redirect('/categorias')->with('Permissão negada');
        }
    }

    public function categoriasProduto(Request $request, $id)
    {
        $categoria = Categoria::find($id);
        $produtosFiltro = Produto::query();
        if($request->has('preco')) {
            $filtroPreco = $request->input('preco', 'asc');
            $produtosFiltro->orderBy("preco", $filtroPreco);
        }
        $produtos = $produtosFiltro->where('categoria_id', '=', $id)->paginate(3);
        return view('categorias.categorias-produtos', [
            'categoria' => $categoria,
            'produtos' => $produtos]);
    }

    public function viewEditarCategoria($id) {
        if (Gate::allows('isAdmin')) {
            $categoria = Categoria::find($id);
            return view('admin.categorias.editar-categoria', [
                'categoria' => $categoria
            ]);
        } else {
            return redirect('/categorias')->with('Permissão negada');
        }
    }

    public function editar(StoreUpdateCategoria $update, $id) {
        if (Gate::allows('isAdmin')) {
            if($categoria = Categoria::find($id)) {
                $categoria->nome = $update->nome;
                return redirect('/categorias')->with('Categoria atualizada com sucesso');
            } else {
                return redirect('/categorias')->with('Categoria não encontrada');
            }
         } else {
            return redirect('/categorias')->with('Permissão negada');
        }
    }

}

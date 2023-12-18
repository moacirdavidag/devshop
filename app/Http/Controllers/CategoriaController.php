<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUpdateCategoria;
use App\Models\Categoria;
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

}

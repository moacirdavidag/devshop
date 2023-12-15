<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUpdateCategoria;
use App\Models\Categoria;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{
    public function index() {
        $categorias = Categoria::all();
        return view('categorias.index', [
            'categorias' => $categorias
        ]);
    }

    public function viewCriarCategoria() {
        return view('admin.categorias.criar-categoria');
    }

    public function criar(StoreUpdateCategoria $request) {
        Categoria::create($request->all());
        return redirect()->route('categorias.index')->with('Categoria criada com sucesso');
    }

    public function deletar($id) {
        if(!$categoria = Categoria::find($id)) {
            return response('Categoria não encontrada', 404);
        }
        $categoria->delete();
        return redirect()->route('categorias.index')->with('Categoria deletada com sucesso');
    }

}

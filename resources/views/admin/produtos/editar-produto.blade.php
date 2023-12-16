@extends('layout.template')
@section('titulo', 'Editar ' . $produto->nome)

@section('conteudo')
    <form action="{{ route('produtos.editar', $produto->id) }}" class="mx-auto mt-5 w-25 text-start" method="post">
        <h1>Editar produto</h1>
        @csrf
        <input type="hidden" name="_method" value="put">
        <div class="mb-3">
            <label class="form-label" for="nome">Nome do produto:</label>
            <input class="form-control" type="text" name="nome" id="nome" value={{$produto->nome}}>
        </div>
        <div class="mb-3">
            <label class="form-label" for="descricao">Descrição do produto:</label>
            <input class="form-control" type="text" name="descricao" id="nome" value={{$produto->descricao}}>
        </div class="mb-3">
        <div class="mb-3">
            <label class="form-label" for="categoria_id">Categoria:</label>
            <select class="form-select" name="categoria_id" id="categoria_id">
                @foreach ($categorias as $categoria)
                    <option value="{{ $categoria->id }}">{{ $categoria->nome }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label class="form-label" for="quantidadeEstoque">Quantidade em estoque:</label>
            <input class="form-control" type="number" name="quantidadeEstoque" id="quantidadeEstoque" value={{$produto->quantidadeEstoque}}>
        </div>
        <div class="mb-3">
            <label class="form-label" for="preco">Preço (R$):</label>
            <input class="form-control" type="number" name="preco" id="preco" value={{$produto->preco}}>
        </div>
        <div class="mb-3">
            <input class="form-control btn btn-success" type="submit" value="Editar produto">
        </div>
    </form>
    @if ($errors->any())
        <div class="bg-danger text-light mx-auto text-start my-3 p-2 w-25">
            <ul>
                @foreach ($errors->all() as $erro)
                    <li>{{ $erro }}</li>
                @endforeach
                <ul>
        </div>
    @endif
@endsection

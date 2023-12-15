@extends('layout.template')
@section('titulo', 'Criar produto')

@section('conteudo')
    <h1>Criar produto</h1>
    <form action="{{route('produtos.criar')}}" method="post">
        @csrf
        <div>
            <label for="nome">Nome do produto:</label>
            <input type="text" name="nome" id="nome">
        </div>
        <div>
            <label for="descricao">Descrição do produto:</label>
            <input type="text" name="descricao" id="nome">
        </div>
        <div>
            <label for="categoria_id">Categoria:</label>
            <select name="categoria_id" id="categoria_id">
                @foreach($categorias as $categoria)
                    <option value="{{$categoria->id}}">{{$categoria->nome}}</option>
                @endforeach
            </select>
        </div>
        <div>
            <label for="quantidadeEstoque">Quantidade em estoque:</label>
            <input type="number" name="quantidadeEstoque" id="quantidadeEstoque" value="0">
        </div>
        <div>
            <label for="preco">Preço (R$):</label>
            <input type="number" name="preco" id="preco" value="0">
        </div>
        <div>
            <input type="submit" value="Criar produto">
        </div>
    </form>
    @if ($errors -> any()) 
        <div class="text-danger border border-danger">
            <ul>
                @foreach ($errors->all() as $erro)
                    <li>{{$erro}}</li>
                @endforeach
            <ul>
        </div>
    @endif
@endsection 

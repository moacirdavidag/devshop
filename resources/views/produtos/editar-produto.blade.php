@extends('layout.template')
@section('titulo', 'Editar '.$produto->nome)

@section('conteudo')
    <form action="{{route('produtos.editar', $produto->id)}}" method="POST">
        @csrf
        <input type="hidden" name="_method" value="PUT">
        <div>
            <label for="nome">Nome do produto:</label>
            <input type="text" name="nome" id="nome" value="{{$produto->nome}}">
        </div>
        <div>
            <label for="descricao">Descrição do produto:</label>
            <input type="text" name="descricao" id="descricao" value="{{$produto->descricao}}">
        </div>
        <div>
            <input type="submit" value="Editar produto">
        </div>
    </form>
@endsection